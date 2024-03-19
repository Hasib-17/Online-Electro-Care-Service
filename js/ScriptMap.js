"use strict";

const form = document.querySelector(".form");
const containerWorkouts = document.querySelector(".workouts");
const btnReset = document.querySelector(".btn--clear-all");

let messageShown = false;
class Workout {
    constructor(latLng, distance, duration, date, id) {
        this.latLng = latLng; // [lat, lng]
        this.distance = distance;
        this.duration = duration;
        this.date = date ? new Date(date) : new Date();
        this.id = id || Date.now().toString();
    }
}

class App {
    #map;
    #mapEvent;
    #mapZoomLevel = 16;
    #workouts = [];
    #markers = [];
    curLoc;
    constructor() {
        // get user's position
        this._getPosition();

        // get data from localstorage
        this._getLocalStorage();

        // Attach event handlers
        form.addEventListener("submit", this._newWorkout.bind(this));
        containerWorkouts.addEventListener("click", (e) => {
            const trashBin = e.target.closest(".workout__delete");
            if (!trashBin) this._moveToPopup(e);
            else {
                const workoutEl = e.target.closest(".workout");
                if (!workoutEl) return;
                this.deleteWorkout(workoutEl.dataset.id);
            }
        });
    }

    _getPosition() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                this._loadMap.bind(this),
                () => {
                    errorMessage(
                        "I couldn't get your current location.\r\nDefault location: Phnom Penh, Cambodia."
                    );
                    const phnomPenh = {
                        coords: {
                            latitude: 11.55,
                            longitude: 104.91667,
                        },
                    };
                    this._loadMap(phnomPenh);
                }
            );
        }
    }

    _loadMap(position) {
        this.curLoc = position;

        const { longitude, latitude } = position.coords;
        const latLong = [latitude, longitude];
        this.#map = L.map("map").setView(latLong, this.#mapZoomLevel);

        L.tileLayer("https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(this.#map);

        this.#map.on("click", this._showForm.bind(this));
        this.#map.on("zoomend", this._getZoom.bind(this));
        this.#workouts.forEach((wOut) => {
            this._renderWorkout(wOut);
            this._renderWorkoutMarker(wOut);
        });
        toastMessage("app loaded");
        this._renderCurrentLocationMarker(this.curLoc);
    }

    showWorkout() {
        return this.#workouts;
    }

    _getZoom() {
        this.#mapZoomLevel = this.#map.getZoom();
    }

    _showForm(mapE) {
        this.#mapEvent = mapE;
        form.classList.remove("hidden");
    }

    _newWorkout(e) {
        e.preventDefault();

        // get data from form
        const { latlng } = this.#mapEvent;

        // Render form with confirm button
        const confirmButton = document.createElement("button");
        confirmButton.textContent = "Confirm Location";
        confirmButton.classList.add("btn-confirm");
        confirmButton.addEventListener("click", () => {
            // Create workout object with only location data
            const workout = new Workout(latlng);

            // Add new object to workout array
            this.#workouts.push(workout);

            // Render workout on map as marker
            this._renderWorkoutMarker(workout);

            // Render workout on list
            this._renderWorkout(workout);

            // Hide the form
            this._hideForm();

            // Set workout to local storage
            this._setLocalStorage();

            // Show toast message
            toastMessage("Location confirmed");
        });

        form.innerHTML = ''; // Clear existing form content
        form.appendChild(confirmButton); // Add confirm button to form
    }

    _hideForm() {
        form.classList.add("hidden");
    }

    _renderWorkoutMarker(workout) {
        const marker = L.marker(workout.latLng);
        this.#markers.push(marker);
        marker
            .addTo(this.#map)
            .bindPopup(
                L.popup({
                    maxWidth: 250,
                    minWidth: 100,
                    autoClose: false,
                    closeOnClick: false,
                    className: `${workout.type}-popup`,
                })
            )
            .setPopupContent(
                `${workout.type === "running" ? "📍" : "📍"} Location`
            )
            .openPopup();
    }

    _renderWorkout(workout) {
        let html = `
    <li class="workout workout--${workout.type}" data-id="${workout.id}">
        <h2 class="workout__title">
          <span>${workout.date}</span>
          <span class="workout__delete">🗑</span>
        </h2>
        <div class="workout__details">
          <span class="workout__icon">Location</span>
        </div>
    </li>`;

        containerWorkouts.insertAdjacentHTML("beforeend", html);
    }

    _moveToPopup = (e) => {
        const workoutEl = e.target.closest(".workout");
        if (!workoutEl) return;
        const workout = this.#workouts.find(
            (work) => work.id === workoutEl.dataset.id
        );

        this.#map.setView(workout.latLng, this.#mapZoomLevel, {
            animate: true,
            pan: {
                duration: 1,
            },
        });
        this._setLocalStorage();
    };

    deleteWorkout(id) {
        const domEL = document.querySelector(`[data-id="${id}"]`);
        this.#workouts.forEach((wk, i) => {
            if (wk.id === id) {
                this.#workouts.splice(i, 1);

                this.#markers[i].remove();
                this.#markers.splice(i, 1);
            }
        });
        this._setLocalStorage();
        domEL.remove();
    }

    _setLocalStorage() {
        localStorage.setItem("workouts", JSON.stringify(this.#workouts));
    }

    _getLocalStorage() {
        const data = localStorage.getItem("workouts");
        const workouts = JSON.parse(data);

        if (!workouts) return;
        workouts.forEach((wo) => {
            let workout = new Workout(
                wo.latLng,
                wo.distance,
                wo.duration,
                wo.date,
                wo.id
            );
            this.#workouts.push(workout);
        });
    }

    reset() {
        this.#workouts = []; // Clear only the workouts array
        this._setLocalStorage(); // Update local storage to clear workouts data
        containerWorkouts.innerHTML = ''; // Clear the displayed workouts
    }

}

const app = new App();

btnReset.addEventListener("click", app.reset);

function errorMessage(msg) {
    const msgOverlay = document.createElement("div");
    msgOverlay.classList.add("msg-overlay");
    const msgContainer = document.createElement("div");
    msgContainer.classList.add("msg-container");
    const msgBtnClose = document.createElement("button");
    msgBtnClose.classList.add("msg-btnClose");
    msgBtnClose.textContent = "X";

    const msgHeading = document.createElement("h2");
    msgHeading.classList.add("msg-heading");
    msgHeading.textContent = "Error";
    const msgText = document.createElement("p");
    msgText.classList.add("msg-text");
    msgText.textContent = msg;

    msgContainer.append(msgBtnClose, msgHeading, msgText);
    msgOverlay.append(msgContainer);

    //prevent multiple messges
    if (messageShown === true) {
        msgOverlay.remove();
    } else {
        messageShown = true;
        document.querySelector("body").append(msgOverlay);
    }

    const btnClose = document.querySelectorAll(".msg-btnClose");
    btnClose.forEach((btnCls) => {
        btnCls.addEventListener("click", () => {
            msgOverlay.remove();
            messageShown = false;
        });
    });
}

function toastMessage(msg) {
    const toastContainer = document.createElement("div");
    toastContainer.classList.add("toast-container");
    const toastText = document.createElement("p");
    toastText.classList.add("toast-text");
    toastText.textContent = `${msg}`;
    toastContainer.append(toastText);
    document.querySelector("body").append(toastContainer);
    setTimeout(() => {
        toastContainer.remove();
    }, 1500);
}

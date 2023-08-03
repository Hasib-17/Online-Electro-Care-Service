<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>OECS</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">

    <a href="index.php" class="navbar-brand">OECS</a>
    <span class="navbar-text">.....Customer's Happiness is our Aim ..... </span>
    <!-- for mobile version -->
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
  <header class="jumbotron back-image" style="background-image: url(images/man9.jpg);">
    <!-- <header class="jumbotron back-image" style="background-image: url(images/man9.jpg); background-size: cover; background-position: center;"> -->

    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OECS</h1>
      <p class="font-italic text-success"><b>Online Electro Care Service</b></p>
      <p class="font-italic">Customer's Happiness is our Aim</p>
      <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
      <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header> <!-- End Header Jumbotron -->

  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">OECS(Online Electro Care) Services</h3>
      <p>
        Online ElectroCare Services is Bangladesh’s leading chain of multi-brand Electronics and Electrical service
        workshops offering
        wide array of services. We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service centres and fully trained mechanics, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book
        your service online by doing Registration.
      </p>

    </div>
  </div>
  <!--Introduction Section End-->
  <!-- Start Services -->
  <div class="container text-center border-bottom" id="Services">
    <h2>Our Services</h2>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-tv fa-8x text-danger"></i></a>
        <h4 class="mt-4">Electronic Appliances</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <!-- <a href="#"><i class="fas fa-sliders-h fa-8x" style="color: purple !important;"></i></a> -->
        <a href="#"><i class="fas fa-sliders-h fa-8x text-success"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-primary"></i></a>
        <h4 class="mt-4">Fault Repair</h4>
      </div>
    </div>
  </div> <!-- End Services -->

  <!-- Start Registration  -->
  <?php include('userRegistration.php') ?>
  <!-- End Registration  -->

  <!-- Start Happy Customer  -->
  <div class="jumbotron bg-danger" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white">Happy Customers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/hasan.jpg" class="img-fluid" style="border-radius: 100px; height: 100px; width: 100px;">
              <h4 class="card-title">Hasanur Rahman</h4>
              <p class="card-text">And so I will explain to him the pleasures, often free of things, to lead us to pleasures they never know they owe.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/apu.JPG" class="img-fluid" style="border-radius: 100px; height:100px;width:100px;">
              <h4 class="card-title">Sumi</h4>
              <p class="card-text">They can give me more better services that i can hope.You also perchase or service your goods.</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/sh.jpg" class="img-fluid " style="border-radius: 90px; height:100px;width:100px;">
              <h4 class="card-title">Shuvro Hasib</h4>
              <p class="card-text">Their behaviour so much pretty.You can take service from there.They will delevered your goods as time to time.</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/ss.jpeg" class="img-fluid" style="border-radius: 100px; height:100px; width:100px;">
              <h4 class="card-title">Arpita</h4>
              <p class="card-text">All services are so good.i take service from there many times.You can service your goods like blindly.</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->

  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong>Headquarter:</strong> <br>
        OECS Center Ltd, <br>
        Gulsan, Dhaka <br>
        Email : hasib17@cse.pstu.ac.bd <br>
        Phone: +8801571136779 <br>
        <a href="#" target="_blank">www.oecs.com</a> <br>

        <br><br>
        <strong>Barisal Branch:</strong> <br>
        OECS Center Ltd, <br>
        Patuakhali, Barisal <br>
        Email : rakib17@gmail.com <br>
        Phone: +8801567894367 <br>
        <a href="#" target="_blank">www.oecs.com</a> <br>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="https://www.facebook.com/shuvro.hasib.56" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/HasibShuvro" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="https://www.google.com/" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Designed by Hasibur &copy; 2023.
          </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/design.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>
<?php
define('TITLE', 'Success');
// include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
  $rEmail = $_SESSION['rEmail'];
} else {
  echo "<script> location.href='RequesterLogin.php' </script>";
}
$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  //   echo "<div class='ml-5 mt-5'  >
  //  <table class='table '   >
  //   <tbody>
  //    <tr>
  //      <th>Request ID</th>
  //      <td>" . $row['request_id'] . "</td>
  //    </tr>
  //    <tr>
  //      <th>Name</th>
  //      <td>" . $row['requester_name'] . "</td>
  //    </tr>
  //    <tr>
  //    <th>Email ID</th>
  //    <td>" . $row['requester_email'] . "</td>
  //   </tr>
  //    <tr>
  //     <th>Request Info</th>
  //     <td>" . $row['request_info'] . "</td>
  //    </tr>
  //    <tr>
  //     <th>Request Description</th>
  //     <td>" . $row['request_desc'] . "</td>
  //    </tr>

  //    <tr>
  //     <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  //   </tr>
  //   </tbody>
  //  </table> </div>
  //  ";

  echo "
<style>
  .modern-table {
    width: 800px; /* Increased table width */
    height: 600px; /* Increased table height */
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 20px; /* Increased gap between table and buttons */
  }

  .modern-table th,
  .modern-table td {
    padding: 15px; /* Increased padding for gaps between columns and rows */
    text-align: left;
    border-bottom: 1px solid #ccc;
  }

  .modern-table th {
    background-color: #f2f2f2;
  }

  .modern-table tr:last-child td {
    border-bottom: none;
  }

  /* Optional: Centering the table on the page */
  .table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  /* Hide the print button during printing */
  @media print {
    .d-print-none {
      display: none !important;
    }
  }
</style>
<div class='table-container'>
  <div class='ml-5 mt-5'>
    <table class='modern-table'>
      <tbody>
        <tr>
          <th>Request ID</th>
          <td>" . $row['request_id'] . "</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>" . $row['requester_name'] . "</td>
        </tr>
        <tr>
          <th>Email ID</th>
          <td>" . $row['requester_email'] . "</td>
        </tr>
        <tr>
          <th>Request Info</th>
          <td>" . $row['request_info'] . "</td>
        </tr>
        <tr>
          <th>Request Description</th>
          <td>" . $row['request_desc'] . "</td>
        </tr>
        <tr>
          <td colspan='2' class='text-center'>
            <form class='d-print-none' style='text-align:center;' >
              <input class='btn-print btn btn-danger' type='button' value='PRINT' onClick='window.print()' style='padding: 20px 30px; font-size: 20px; background-color: #dc3545; color: #fff;'>
              <a class='btn btn-success' href='SubmitRequest.php' style='padding:20px 30px; font-size: 20px;  background-color: #28a745;color: #fff; border:2px solid black; text-decoration:none;margin-left:3rem;'>BACK</a>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
";
} else {
  echo "Failed";
}
?>


<?php
include('includes/footer.php');
$conn->close();
?>
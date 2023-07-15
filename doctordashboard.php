<?php
require_once("mainconnection.php");

// Assuming the doctor's details are stored in the session variables
$SSN = $_REQUEST['SSN'];
$Name = $_REQUEST['Name'];

// Query to fetch the records of the logged-in doctor only
$sql = "SELECT * FROM doctors WHERE SSN = '$SSN' AND Name = '$Name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Fetch the record of the logged-in doctor
    $doctorData = mysqli_fetch_assoc($result);
    // Display the doctor's information
    echo "<h2>My Records</h2>";
    echo "SSN: " . $doctorData['SSN'] . "<br>";
    echo "Name: " . $doctorData['Name'] . "<br>";
    echo "Specialty: " . $doctorData['Specialty'] . "<br>";
    // Additional information about the logged-in doctor can be displayed here
} else {
    // No record found for the logged-in doctor
    echo "No records found.";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="doctordetails.php">My records</a>
  <a href="prescription.php">Prescription of a Drug</a>
  <a href="#contact">Contact</a>

  <i class="fa fa-caret-down"></i>
  
 
  <a href="#contact">Search</a>
</div>

<div class="main">
  <h2>Welcome</h2>
</div>

</body>
</html>

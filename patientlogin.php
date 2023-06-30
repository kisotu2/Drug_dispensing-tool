<?php
require_once("mainconnection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username and password sent from form
    echo "Hi";
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $sql = "SELECT SSN,Name,Password FROM patientsrecords WHERE Password = '$Password'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    print_r($result);
    if ($count < 1)
    {
      echo "User not Found";
      header("Location: patientloginform.php");
      exit;
    }
    // If result matched $Name and $Password, table row must be 1 row
    if ($count == 1) {
        $_SESSION['Name'] = $Name;
        $_SESSION['Password'] = $Password;

        header("Location: patientdashboard.html");
        exit;
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>


<?php
require_once("mainconnection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username and password sent from form
    echo "Hi";
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);

    $sql = "SELECT SSN,Name,Specialty FROM doctors";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    print_r($result);
    if ($count < 1)
    {
      echo "User not Found";
      header("Location: doctortloginform.php");
      exit;
    }
    // If result matched $Name and $Password, table row must be 1 row
    if ($count == 1) {
        $_SESSION['SSN'] = $SSN;
        $_SESSION['Name'] = $Name;

        header("Location: doctordashboard.html");
        exit;
    } else {
        $error = "Your SSN  or Name is invalid";
    }
}
?>

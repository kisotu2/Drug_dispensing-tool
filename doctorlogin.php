<?php
require_once("mainconnection.php");
session_start();

$conn = mysqli_connect("localhost", "root", "", "drug_dispensing");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username and password sent from form
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);

    $sql = "SELECT SSN, Name, Specialty FROM doctors WHERE SSN = '$SSN' AND Name = '$Name'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // User found, retrieve their details
        $row = mysqli_fetch_assoc($result);

        // Store the user details in the session
        $_SESSION['SSN'] = $row['SSN'];
        $_SESSION['Name'] = $row['Name'];
        $_SESSION['Specialty'] = $row['Specialty'];

        header("Location: doctordashboard.php");
        exit;
    } else {
        // User not found or invalid credentials
        $error = "Your SSN or Name is invalid";
        header("Location: doctorloginform.php?error=$error");
        exit;
    }
}
?>

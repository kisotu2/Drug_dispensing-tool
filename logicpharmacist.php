<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM pharmacists WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pharmacist Details Deleted Successfully";
        header("Location: adminviewpharmacist.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pharmacist Not Deleted";
        header("Location: adminviewpharmacist.php");
        exit(0);
    }
}

if(isset($_POST['updatepharmacist']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    
    

    $query = "UPDATE pharmacists SET SSN='$SSN', Name='$Name', Password='$Password', PhoneNumber='$PhoneNumber' WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);
}
    if($query_run)
    {
        $_SESSION['message'] = "Pharmacist Updated Successfully";
        header("Location: adminviewpharmacist.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Updated";
        header("Location: adminviewpharmacist.php");
        exit(0);
    }
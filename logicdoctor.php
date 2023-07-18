<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM doctors WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: adminviewdoctor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Deleted";
        header("Location: adminviewdoctor.php");
        exit(0);
    }
}

if(isset($_POST['updatedoctor']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Specialty = mysqli_real_escape_string($conn, $_POST['Specialty']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    

    

    $query = "UPDATE doctors SET SSN='$SSN', Name='$Name', Password='$Password', Specialty='$Specialty'";
    $query_run = mysqli_query($conn, $query);
}
    if($query_run)
    {
        $_SESSION['message'] = "Doctor Updated Successfully";
        header("Location: adminviewdoctor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Doctor Not Updated";
        header("Location: adminviewdoctor.php");
        exit(0);
    }
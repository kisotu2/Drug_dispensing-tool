<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM admin WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin Details Deleted Successfully";
        header("Location: admintable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin Not Deleted";
        header("Location: admintable.php");
        exit(0);
    }
}

if(isset($_POST['updateadmin']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $Position = mysqli_real_escape_string($conn, $_POST['Position']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    
    

    $query = "UPDATE admin SET SSN='$SSN', Name='$Name', Password='$Password',  Email='$Email', Position='$Position' WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);
}
    if($query_run)
    {
        $_SESSION['message'] = "Admin Updated Successfully";
        header("Location: admintable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pharmacist Not Updated";
        header("Location: admintable.php");
        exit(0);
    }
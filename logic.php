<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM patientsrecords WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: adminview.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Deleted";
        header("Location: adminview.php");
        exit(0);
    }
}

if(isset($_POST['updatepatient']))
{
    $SSN = mysqli_real_escape_string($conn, $_POST['SSN']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Passowrd = mysqli_real_escape_string($conn, $_POST['Password']);
    $Physician = mysqli_real_escape_string($conn, $_POST['Physician']);
    $Illness = mysqli_real_escape_string($conn, $_POST['Illness']);
    $EmailAddress = mysqli_real_escape_string($conn, $_POST['EmailAddress']);
    $Age = mysqli_real_escape_string($conn, $_POST['Age']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $BloodGroup = mysqli_real_escape_string($conn, $_POST['BloodGroup']);

    

    $query = "UPDATE patientsrecords SET SSN='$SSN', Name='$Name', Password='$Password', Physician='$Physician', Illness='$Illness', EmailAddress='$EmailAddress', Age='$Age',Gender='$Gender', BloodGroup='$BloodGroup' WHERE SSN='$SSN' ";
    $query_run = mysqli_query($conn, $query);
}
    if($query_run)
    {
        $_SESSION['message'] = "Patient Updated Successfully";
        header("Location: adminview.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Updated";
        header("Location: adminview.php");
        exit(0);
    }
<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $CompanyID = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM contracts WHERE CompanyID='$CompanyID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: contractors.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: contractors.php");
        exit(0);
    }
}

if(isset($_POST['updatepatient']))
{
    $CompanyID = mysqli_real_escape_string($conn, $_POST['CompanyID']);
    $CompanyName = mysqli_real_escape_string($conn, $_POST['CompanyName']);
    $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $Contractors = mysqli_real_escape_string($conn, $_POST['Contractors']);
   
    

    $query = "UPDATE contracts SET CompanyID='$CompanyID', CompanyName='$CompanyName', PhoneNumber='$PhoneNumber', Contracts='$Contractors'  WHERE CompanyID='$CompanyID' ";
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

    
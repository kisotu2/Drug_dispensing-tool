<?php
session_start();
require 'mainconnection.php';

if(isset($_POST['delete_prescription']))
{
    $ReceiptNo = mysqli_real_escape_string($conn, $_POST['delete_prescription']);

    $query = "DELETE FROM prescriptions WHERE ReceiptNo='$ReceiptNo' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Drug Deleted Successfully";
        header("Location: prescriptiontable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Drug Not Deleted";
        header("Location: prescriptiontable.php");
        exit(0);
    }
}

if(isset($_POST['updateprescription']))
{
    $ReceiptNo = mysqli_real_escape_string($conn, $_POST['ReceiptNo']);
    $Drug = mysqli_real_escape_string($conn, $_POST['Drug']);
    $ID = mysqli_real_escape_string($conn, $_POST['ID']);
    $Dosage = mysqli_real_escape_string($conn, $_POST['Dosage']);
    $DocSSN = mysqli_real_escape_string($conn, $_POST['DocSSN']);
    $PatientSSN = mysqli_real_escape_string($conn, $_POST['PatientSSN']);
    $PharmacistSSN = mysqli_real_escape_string($conn, $_POST['PharmacistSSN']);
    $Status = mysqli_real_escape_string($conn, $_POST['Status']);
    

    $query = "UPDATE prescriptions SET ReceiptNo='$ReceiptNo', Drug='$Drug', ID='$ID', Dosage='$Dosage',PatientSSN='$PatientSSN', DocSSN='$DocSSN', PharmacistSSN='$PharmacistSSN', Status='$Status'  WHERE ReceiptNo='$ReceiptNo' ";
    $query_run = mysqli_query($conn, $query);
}
    if($query_run)
    {
        $_SESSION['message'] = "prescription dispensed";
        header("Location:prescriptiontable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Doctor Not dispensed";
        header("Location: prescriptiontable.php");
        exit(0);
     }

    
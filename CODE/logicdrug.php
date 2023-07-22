<?php

session_start();
require 'mainconnection.php';

if(isset($_POST['delete_user']))
{
    $ID = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM drugs WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Drug Details Deleted Successfully";
        header("Location: drugtable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Drug Not Deleted";
        header("Location: drugtable.php");
        exit(0);
    }
}

if(isset($_POST['updatedrug']))
{
    $ID = mysqli_real_escape_string($conn, $_POST['ID']);
    $DrugName = mysqli_real_escape_string($conn, $_POST['DrugName']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $Formula = mysqli_real_escape_string($conn, $_POST['Formula']);
    $Quantity = mysqli_real_escape_string($conn, $_POST['Quantity']);

    $query = "UPDATE drugs SET  DrugName='$DrugName', Price='$Price',  Formula='$Formula', Quantity='$Quantity' WHERE ID='$ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Drug Updated Successfully";
        header("Location: drugtable.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Drug Not Updated";
        header("Location: drugtable.php");
        exit(0);
    }
}
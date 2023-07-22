<?php
session_start();
require 'mainconnection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Prescription Edit</title>
  </head>
 <body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Edit 
                            <a href="prescriptiontable.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $ReceiptNo = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM prescriptions WHERE ReceiptNo='$ReceiptNo' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="logicprescription.php" method="POST">
                                    <input type="hidden" name="ReceiptNo" value="<?= $user['ReceiptNo']; ?>">

                                    <div class="mb-3">
                                        <label>Drug:</label>
                                        <input type="text" name="Drug" value="<?=$user['Drug'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>ID</label>
                                        <input type="hidden" name="ID" value="<?=$user['ID'];?>" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Dosage</label>
                                        <input type="text" name="Dosage" value="<?=$user['Dosage'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DocSSN</label>
                                        <input type="hidden" name="DocSSN" value="<?=$user['DocSSN'];?>" >
                                    </div>
                                    <div class="mb-3">
                                        <label>PatientSSN</label>
                                        <input type="hidden" name="PatientSSN" value="<?=$user['PatientSSN'];?>" >
                                    </div>
                                    <div class="mb-3">
                                        <label>PharmacistSSN</label>
                                        <input type="number" name="PharmacistSSN" value="<?=$user['PharmacistSSN'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label for="Status">PRESCRIBED</label> <br>

                                    <input type="radio"id="Prescribed"name="Status"value="PRESCRIBED"><br> 



                                    <label for="Status">DISPENSED</label> 

                                    <input type="radio"id="dispensed"name="Status"value="DISPENSED"><br> 
   
                                    </div>
                                   
                                    <div class="mb-3">
                                        <button type="submit" name="updateprescription" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }   
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 </body>
</html>
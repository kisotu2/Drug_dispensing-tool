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

    <title>Pharmacist Edit</title>
  </head>
 <body>
  
    <div class="container mt-4">

        <?php include('messagepharmacist.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Edit 
                            <a href="adminviewpharmacist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $SSN = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM pharmacists WHERE SSN='$SSN' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="logicpharmacist.php" method="POST">
                                    <input type="hidden" name="SSN" value="<?= $user['SSN']; ?>">

                                    <div class="mb-3">
                                        <label>Name:</label>
                                        <input type="text" name="Name" value="<?=$user['Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="Password" name="Password" value="<?=$user['Password'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>PhoneNumber</label>
                                        <input type="number" name="PhoneNumber" value="<?=$user['PhoneNumber'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="updatepharmacist" class="btn btn-primary">
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
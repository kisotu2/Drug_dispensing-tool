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

    <title>Drug Edit</title>
  </head>
 <body>
  
    <div class="container mt-4">

        <?php include('messageadmin.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Drug Edit 
                            <a href="drugtable.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $ID = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM drugs WHERE ID= '$ID' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="logicdrug.php" method="POST">
                                    <input type="hidden" name="ID" value="<?= $user['ID']; ?>">

                                    <div class="mb-3">
                                        <label>Drug Name:</label>
                                        <input type="text" name="DrugName" value="<?=$user['DrugName'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <input type="number" name="Price" value="<?=$user['Price'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Formula</label>
                                        <input type="text" name="Formula" value="<?=$user['Formula'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="Quantity" value="<?=$user['Quantity'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="updatedrug" class="btn btn-primary">
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
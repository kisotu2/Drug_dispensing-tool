<!DOCTYPE html>
<html lang="en">

<<?php
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

    <title>Welcome Page(Drug)</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Details
                            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SSN</th>
                                    <th>Name</th>
                                    <th>Password</th>
                                    <th>Physician</th>
                                    <th>Illness</th>
                                    <th>EmailAddress</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>BloodGroup</th>

                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM patientsrecords";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['SSN']; ?></td>
                                                <td><?= $user['Name']; ?></td>
                                                <td><?= $user['Password']; ?></td>
                                                <td><?= $user['Physician']; ?></td>
                                                <td><?= $user['Illness']; ?></td>
                                                <td><?= $user['EmailAddress']; ?></td>
                                                <td><?= $user['Age']; ?></td>
                                                <td><?= $user['Gender']; ?></td>
                                                <td><?= $user['BloodGroup']; ?></td>
                                                
                                               
                                                <td>
                                              
                                                    <a href="editpage.php?id=<?= $user['SSN']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="logic.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_user" value="<?=$user['SSN'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
    
</body>
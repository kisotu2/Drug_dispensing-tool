<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    require 'mainconnection.php';
    if (isset($_POST['submit'])) {
        $whatToSearch = $_POST['search'];
        $sql = "SELECT * FROM doctors WHERE SSN = ? ORDER BY SSN DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $whatToSearch);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    } else {
        // SQL query to select data from the database
        $sql = "SELECT * FROM doctors ORDER BY SSN DESC ";
        $result = $conn->query($sql);
    }
    
    if (isset($_GET['reset'])) {
        // Redirect to reset the search
        header("Location: adminviewdoctor.php");
        exit();
    }
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
    <style>
         body{
            margin: 0;
        }
        .containertable {
    background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
    
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    z-index: 1;
    min-height: 100vh;
    padding: 60px;
}
    </style>
</head>
<body>
<div class="containertable">
    <form action="" method="POST">

        <div class="form-group">
            <input type="search" name="search" required>
            <span></span>
            <label>Search</label>
        </div>

        <input type="submit" name="submit" value="Search">

    </form>
    <button>
        <a href="?reset=1">Reset</a>
    </button>
    <div class="container mt-4">

        <?php include('messageadmin.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Details</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SSN</th>
                                    <th>Full Names</th>
                                    <th>Password</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM admin";
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
                                                <td><?= $user['Position']; ?></td>
                                                <td><?= $user['Email']; ?></td>
                                                <td>
                                                    <a href="updateadmin.php?id=<?= $user['SSN']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="logicadmin.php" method="POST" class="d-inline">
                                                        
                                                        <button type="submit" name="delete_user" value = "<?= $user['SSN']; ?>"class="btn btn-danger btn-sm">Delete</button>
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
                        <td><a href="insertadmin.php"  class="btn btn-success btn-sm">Add</a></td>
               
               <td><a href="admindashboard.php" class="btn btn-danger btn-sm">Back</a></td>

                    </div>
                </div>
            </div>
        </div>
    </div>
                                </div>
</body>

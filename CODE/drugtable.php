<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    require 'mainconnection.php';

    // Check if the search form is submitted
    if (isset($_POST['submit'])) {
        $whatToSearch = $_POST['search'];
        $sql = "SELECT * FROM drugs WHERE ID = ? ORDER BY ID DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $whatToSearch);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // SQL query to select all data from the database
        $sql = "SELECT * FROM drugs ORDER BY ID DESC";
        $result = $conn->query($sql);
    }
    
    if (isset($_GET['reset'])) {
        // Redirect to reset the search
        header("Location: drugtable.php");
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
</head>
<style>
    body {
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
<body>
<div class="containertable">
    <form action="" method="POST">

        <div class="form-group">
            <input type="search" name="search" required>
            <span></span>
            <label class=>Search</label>
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
                        <h4>Drug Details</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Drug Name</th>
                                    <th>Price</th>
                                    <th>Formula</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if any records are found
                                if ($result->num_rows > 0) {
                                    while ($user = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?= $user['ID']; ?></td>
                                            <td><?= $user['DrugName']; ?></td>
                                            <td><?= $user['Price']; ?></td>
                                            <td><?= $user['Formula']; ?></td>
                                            <td><?= $user['Quantity']; ?></td>
                                            <td>
                                                <a href="updatedrug.php?id=<?= $user['ID']; ?>"
                                                   class="btn btn-success btn-sm">Edit</a>
                                                <form action="logicdrug.php" method="POST" class="d-inline">

                                                    <button type="submit" name="delete_user"
                                                            value="<?= $user['ID']; ?>"
                                                            class="btn btn-danger btn-sm">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>
                        <td><a href="insertdrug.php" class="btn btn-success btn-sm">Add</a></td>

                        <td><a href="admindashboard.php" class="btn btn-danger btn-sm">Back</a></td>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

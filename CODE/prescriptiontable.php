<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require 'mainconnection.php';

if (isset($_POST['submit'])) {
    $whatToSearch = $_POST['search'];
    $sql = "SELECT * FROM prescriptions WHERE PatientSSN = ? ORDER BY ReceiptNo DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $whatToSearch);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    // SQL query to select data from the database
    $sql = "SELECT * FROM prescriptions ORDER BY ReceiptNo DESC ";
    $result = $conn->query($sql);
}

if (isset($_GET['reset'])) {
    // Redirect to reset the search
    header("Location: prescriptiontable.php");
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
            <label class=>Search</label>
        </div>

        <input type="submit" name="submit" value="Search">

    </form>
    <button>
        <a href="?reset=1" >Reset</a>
    </button>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Prescription Details</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>RECEIPTNO</th>
                                    <th>DRUG</th>
                                    <th>ID</th>
                                    <th>DOSAGE</th>
                                    <th>PATIENTSSN</th>
                                    <th>DOCSSN</th>
                                    <th>PHARMACISTSSN</th>
                                    <th>STATUS</th>
                                   
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($user = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?= $user['ReceiptNo']; ?></td>
                                            <td><?= $user['Drug']; ?></td>
                                            <td><?= $user['ID']; ?></td>
                                            <td><?= $user['Dosage']; ?></td>
                                            <td><?= $user['PatientSSN']; ?></td>
                                            <td><?= $user['DocSSN']; ?></td>
                                            <td><?= $user['PharmacistSSN']; ?></td>
                                            <td><?= $user['Status']; ?></td>
                                           
                                            <td>
                                                <a href="updateprescription.php?id=<?= $user['ReceiptNo']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="logicprescription.php" method="POST" class="d-inline">

                                                    <button type="submit" name="delete_prescription" value="<?= $user['ReceiptNo']; ?>" class="btn btn-danger btn-sm">Delete</button>
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
                        <td><a href="insertprescription.php"  class="btn btn-success btn-sm">Add</a></td>
               
                                                <td><a href="prescriptiontable.php" class="btn btn-danger btn-sm">Back</a></td>

                    </div>
                </div>
            </div>
        </div>
    </div>
                            </div>
</body>

</html>

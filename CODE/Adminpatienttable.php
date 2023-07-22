<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispenser";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully ";

if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteSql = "DELETE FROM patientsrecords WHERE id = $userId";

    if ($conn->query($deleteSql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
    }
}

// SQL query to select data from database
$sql = "SELECT * FROM patientsrecords ORDER BY SSN DESC ";
$result = $conn->query($sql); // Corrected variable name

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>Patient Details</h1>
        <table>
            <tr>
                <th>SOCIAL SECURITY NUMBER(SSN)</th>
                <th>NAMES</th>
                <th>PASSWORD</th>
                <th>AGE</th>
                <th>BLOOD GROUP</th>
                <th>ILLNESS</th>
                <th>PHYSICIAN</th>
                <th>GENDER</th>
                <th>EMAIL ADDRESS</th>
                <h1><a href="insertpaatient.php">Add</a></h1>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $rows['SSN']; ?></td>
                    <td><?php echo $rows['Name']; ?></td>
                    <td><?php echo $rows['Password']; ?></td>
                    <td><?php echo $rows['Age']; ?></td>
                    <td><?php echo $rows['BloodGroup']; ?></td>
                    <td><?php echo $rows['Illness']; ?></td>
                    <td><?php echo $rows['Physician']; ?></td>
                    <td><?php echo $rows['Gender']; ?></td>
                    <td><?php echo $rows['EmailAddress']; ?></td>
                    <td><a href="?delete=<?php echo $rows['SSN']; ?>">Delete</a></td>
                    <td><a href="editpatient.php?id=<?php echo $rows['SSN']; ?>">Edit</a></td>
       
                </tr>
                <td><a href="insertpaatient.php">Add</a></td>
                <td><a href="admindashboard.php">Back</a></td>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>

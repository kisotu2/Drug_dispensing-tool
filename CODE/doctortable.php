<!-- PHP code to establish connection with the local server -->
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

$result;

if (isset($_POST['submit'])) {
    $whatToSearch = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM patientsrecords WHERE SSN = '$whatToSearch' ORDER BY SSN DESC";
    $result = $conn->query($sql);
    $conn->close();
} else {
    // SQL query to select data from the database
    $sql = "SELECT * FROM patientsrecords ORDER BY SSN DESC ";
    $result = $conn->query($sql);
    $conn->close();
}
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        .container {
            margin: 600px auto;
            max-width: 600px;
            padding: 20px;
        }

        table {
            width: 100%;
            font-size: medium;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: medium;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
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
        <!-- TABLE CONSTRUCTION -->

        <form action="" method="POST">

            <div class="form-group">
                <input type="search" name="search" required>
                <span></span>
                <label>Search</label>
            </div>

            <input type="submit" name="submit" value="Search">

        </form>

        <button>
        <a href="?reset=1">Reset</a></button>

        <table>
            <tr>
            <th>SOCIAL SECURITY NUMBER(SSN)</th>
                <th>FULL NAMES</th>
                <th>PASSWORD</th>
                <th>AGE</th>
                <th>BLOOD GROUP</th>
                <th>ILLNESS</th>
                <th>PHYSICIAN</th>
                <th>GENDER</th>
                <th>EMAIL ADDRESS</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['SSN'];?></td>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['Password'];?></td>
                <td><?php echo $rows['Age'];?></td>
                <td><?php echo $rows['BloodGroup'];?></td>
                <td><?php echo $rows['Illness'];?></td>
                <td><?php echo $rows['Physician'];?></td>
                <td><?php echo $rows['Gender'];?></td>
                <td><?php echo $rows['EmailAddress'];?></td
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>
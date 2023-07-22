<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispenser";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Patient's SSN stored in the $_SESSION variable
$SSN = $_SESSION['SSN'];

// SQL query to select data from database
$sql = "SELECT * FROM pharmacists WHERE SSN = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $SSN);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$conn->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        /* Your CSS styles here */
    </style>
     <link href="table1.css" rel="stylesheet">
</head>

<body>
    <div class="container-table">
<div class="container">
    <section>
        <h1>My  Details</h1>
        <!-- TABLE CONSTRUCTION -->
        <?php
        if ($result->num_rows > 0) {
            // Display table only if records are found
        ?>
            <table>
                <tr>
                    <th>SOCIAL SECURITY NUMBER(SSN)</th>
                    <th>FULL NAMES</th>
                    <th>PASSWORD</th>
                    <th>PhoneNumber</th>
                    <th>EMAIL ADDRESS</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['SSN']; ?></td>
                        <td><?php echo $rows['Name']; ?></td>
                        <td><?php echo $rows['Password']; ?></td>
                        <td><?php echo $rows['PhoneNumber']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        } else {
            // Display "Record not found" message if no records are found
            echo "<p><em>Record not found</em></p>";
        }
        ?>
    </section>
    </div>
    </div>
</body>

</html>

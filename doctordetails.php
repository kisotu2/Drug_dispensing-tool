<!-- PHP code to establish connection with the localserver -->
<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "drug_dispensing";
    
    $conn = new mysqli ($servername,$username,$password,$database);
    
    if ($conn->connect_error){
       die ("Connection failed: ".$conn->connect_error);
    }
    echo "Connected succesfuly ";
 
// SQL query to select data from database
$sql = " SELECT * FROM doctors ORDER BY SSN DESC ";
$result = $conn->query($sql);
$conn->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Doctor Details</title>
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
        <h1>Doctor Details</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>SOCIAL SECURITY NUMBER(SSN)</th>
                <th>FULL NAMES</th>
                <th>SPECIALTY</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['SSN'];?></td>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['Specialty'];?></td>
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html
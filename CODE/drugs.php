<!DOCTYPE html>
<!-- This code takes inventory details from database and disolays it-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inventory</title>

    <style>
        body {
            background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
  
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  position: relative;
  z-index: 1;
  min-height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid white;
        }

        th {
            background-color: #354649;
        }

        button{
            border: none;
            background: green;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            }

        button:hover{
                cursor: pointer;
                background-color : red ;
            }
    </style>
</head>
<body>
    <h1>Medicine Inventory</h1>

    <?php
    require_once('mainconnection.php');

    $sql = "SELECT * FROM drugs";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        echo '<table>
            <tr>
                <th>DrugName</th>
                <th>Price</th>
                <th>Formula</th>
                <th>Quantity</th>
                
            </tr>';

        while ($row = $results->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['tradename']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['formula']."</td>
                    <td>".$row['qty']."</td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "No records found.";
    }
    ?>

    <br>
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
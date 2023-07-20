<!DOCTYPE html>
<html>
<link href="styledropdown.css" rel="stylesheet">
<head>
    <title>Drug Picker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select {
            padding: 5px;
            font-size: 16px;
        }
        #color-display {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Drug Picker</h1>
    <form action="index.php" method="post">
        <label for="drug">Select a drug:</label>
        <select name="drug" id="drug">
            <?php
            // Replace 'your_host', 'your_username', 'your_password', and 'drug_dispensing' with your actual database credentials
            $conn = new mysqli('localhost', 'root', '', 'drug_dispensing');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve drugs from the 'drugs' table and populate the dropdown list
            $sql = "SELECT tradename FROM drugs";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["tradename"] . '">' . $row["tradename"] . '</option>';
            }

            $conn->close();
            ?>
        </select>
        <input type="submit" value="Withdraw Drug">
    </form>

    <form action="index.php" method="post">
        <input type="radio" name="status" value="prescribed" id="prescribed" <?php if(isset($_POST['status']) && $_POST['status'] === 'prescribed') echo 'checked'; ?>>
        <label for="prescribed">Show Prescribed</label>
        <input type="radio" name="status" value="dispensed" id="dispensed" <?php if(isset($_POST['status']) && $_POST['status'] === 'dispensed') echo 'checked'; ?>>
        <label for="dispensed">Show Dispensed</label>
        <input type="submit" value="Show">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the "status" radio button is selected
        if (isset($_POST["status"])) {
            $selectedStatus = $_POST["status"];

            // Update the 'prescription' table with the selected status
            // Assuming the 'prescription' table has columns: 'id' (auto-increment), 'drug_name', 'withdrawn_date', and 'status'
            $conn = new mysqli('localhost', 'root', '', 'drug_dispensing');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert the selected status into the 'prescription' table
            $insertStatus = "INSERT INTO prescription (status) VALUES ('$selectedStatus')";
            if ($conn->query($insertStatus) === TRUE) {
                echo '<div id="color-display">Status Selected: ' . ucfirst($selectedStatus) . '</div>';
            } else {
                echo "Error: " . $insertStatus . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
    ?>
    <p><a href="dispensed.php">View Dispensed Drugs</a></p>
</body>
</html>
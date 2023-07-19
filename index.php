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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["drug"])) {
            $selectedDrug = $_POST["drug"];

            // Update the 'prescription' table with the withdrawn drug
            // Assuming the 'prescription' table has columns: 'id' (auto-increment), 'drug_name', and 'withdrawn_date'
            $conn = new mysqli('localhost', 'root', '', 'drug_dispensing');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the selected drug exists in the 'drugs' table
            $checkDrug = "SELECT * FROM drugs WHERE tradename = '$selectedDrug'";
            $result = $conn->query($checkDrug);

            if ($result->num_rows > 0) {
                // Insert the withdrawn drug into the 'prescription' table
                $insertPrescription = "INSERT INTO prescription (drug_name, withdrawn_date) VALUES ('$selectedDrug', NOW())";
                if ($conn->query($insertPrescription) === TRUE) {
                    echo '<div id="color-display">Drug Withdrawn: ' . ucfirst($selectedDrug) . '</div>';

                    // Update the 'drugs' table to reduce the drug count by 1
                    $updateDrugs = "UPDATE drugs SET count = count - 1 WHERE tradename = '$selectedDrug'";
                    $conn->query($updateDrugs);
                } else {
                    echo "Error: " . $insertPrescription . "<br>" . $conn->error;
                }
            } else {
                echo '<div id="color-display">Drug Not Available: ' . ucfirst($selectedDrug) . '</div>';
            }

            $conn->close();
        }
    }
    ?>
</body>
</html>

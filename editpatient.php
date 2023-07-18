<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispenser";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Retrieve user data based on the provided SSN
    $sql = "SELECT * FROM patientsrecords WHERE SSN = '$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $password = $row['Password'];
        $age = $row['Age'];
        $bloodGroup = $row['BloodGroup'];
        $illness = $row['Illness'];
        $physician = $row['Physician'];
        $gender = $row['Gender'];
        $emailAddress = $row['EmailAddress'];

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $bloodGroup = $_POST['bloodGroup'];
            $illness = $_POST['illness'];
            $physician = $_POST['physician'];
            $gender = $_POST['gender'];
            $emailAddress = $_POST['emailAddress'];

            // Update the user's record in the database
            $updateSql = "UPDATE patientsrecords SET Name = '$name', Password = '$password', Age = '$age', BloodGroup = '$bloodGroup',
                          Illness = '$illness', Physician = '$physician', Gender = '$gender', EmailAddress = '$emailAddress' WHERE SSN = '$userId'";

            if ($conn->query($updateSql) === TRUE) {
                echo "User updated successfully.";
                // Redirect to the main page or display a success message
                header("Location: index.php");
                exit();
            } else {
                echo "Error updating user: " . $conn->error;
            }
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid user ID.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        /* CSS styling code here */
    </style>
</head>

<body>
    <section>
        <h1>Edit Patient</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $userId; ?>">
            <label for="Name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $Name; ?>"><br>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" value="<?php echo $Password; ?>"><br>

            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" value="<?php echo $Age; ?>"><br>

            <label for="BloodGroup">Blood Group:</label>
             <input type="text" id="bloodGroup" name="bloodGroup" value="<?php echo $bloodGroup; ?>"><br>

 <label for="illness">Illness:</label>
            <input type="text" id="illness" name="illness" value="<?php echo $illness; ?>"><br>

            <label for="physician">Physician:</label>
            <input type="text" id="physician" name="physician" value="<?php echo $physician; ?>"><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
                <option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
                <option value="Other" <?php if ($gender == "Other") echo "selected"; ?>>Other</option>
            </select><br>

            <label for="emailAddress">Email Address:</label>
            <input type="email" id="emailAddress" name="emailAddress" value="<?php echo $emailAddress; ?>"><br>

            <input type="submit" value="Update">
        </form>
    </section>
</body>

</html>
<?php
// Check if the SupplierID is provided in the URL
if (isset($_GET['id'])) {
    $SSN = $_GET['id'];
    
    require_once 'mainconnection.php';
    print_r($_POST);
    
    // Retrieve the supplier information based on the provided SupplierID
    $query = "SELECT * FROM patientsrecords WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the form to edit the supplier information
        
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
<?php
    } else {
        echo "User not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid SupplierID.";
}
?>




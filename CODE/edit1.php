<?php
// Check if the SupplierID is provided in the URL
if (isset($_GET['id'])) {
    $SSN = $_GET['id'];
    
    require_once 'mainconnection.php';
    print_r($_POST);
    
    // Retrieve the supplier information based on the provided SupplierID
    $sql = "SELECT * FROM patientsrecords WHERE SSN = '$SSN";
    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the form to edit the supplier information
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Supplier</title>
            
        </head>
        <body>
            <h2>Edit Supplier</h2>
            <form action="update.php" method="POST">
                <input type="hidden" name="supplierID" value="<?php echo $row['SupplierID']; ?>">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" id="supplierName" name="supplierName" value="<?php echo $row['SupplierName']; ?>" required><br><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>" required><br><br>
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $row['PhoneNo']; ?>" required><br><br>
                <label for="medicineCode">Medicine Code:</label>
                <input type="text" id="medicineCode" name="medicineCode" value="<?php echo $row['MedCode']; ?>" required><br><br>
                <input type="submit" value="Update">
            </form>
        </body>
        </html>

        <?php
    } else {
        echo "Supplier not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid SupplierID.";
}
?>


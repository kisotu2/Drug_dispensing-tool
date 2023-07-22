<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .success-message {
            text-align: center;
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error-message {
            text-align: center;
            background-color: red;
            color: whitesmoke;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>

        <?php
        require_once("mainconnection.php");
        print_r($_POST);
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $SSN = $_POST['SSN'];
                $Name = $_POST['Name'];
                $PhoneNumber = $_POST['PhoneNumber'];
                $Email = $_POST['Email'];
                $Password=$_POST['Password'];

        $checkQuery = "SELECT * FROM pharmacists WHERE SSN = '$SSN' LIMIT 1";
        $checkResult = $conn->query($checkQuery);
        
        if ($checkResult->num_rows > 0) {
            echo "<div class='error-message'>Sorry, $Name is already registered in the system.</div>";
        } else {
            $sql = "INSERT INTO pharmacists (SSN, Name, PhoneNumber,Password, Email) VALUES ('$SSN', '$Name', '$PhoneNumber', '$Password','$Email')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='success-message'>Congratulations! $Name has been successfully registered to the system.</div>";
                header("Location: adminviewpharmacist.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                //$db->closeConnection();
            }
        }
    
 }
        } catch (Exception $ex) {
            echo "<script>alert('No connection')</script>";
        }
        ?>
        
        <!-- Rest of your HTML content -->
        
    </div>
</body>
</html>
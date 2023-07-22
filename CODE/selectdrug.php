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
        
        form {
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
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
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Drug Registration Form</h2>

        <?php
        require_once("mainconnection.php");
        print_r($_POST);
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ID = $_POST['ID'];
                $DrugName = $_POST['DrugName'];
                $Price = $_POST['Price'];
                $Formula = $_POST['Formula'];
                $Quantity = $_POST['Quantity'];

                //$db>establishConnection();
                $sql = "INSERT INTO drugs (ID,DrugName, Price, Formula, Quantity) VALUES ('$ID','$DrugName', '$Price', '$Formula', '$Quantity')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='success-message'>Congratulations! Data inserted successfully.</div>";
                    header("Location: drugtable.php");
                } else {
                    echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    //$db->closeConnection();
                }
            }
        } catch (Exception $ex) {
            echo "<script>alert('No connection')</script>";
        }
        ?>
        
       
    </div>
</body>
</html>

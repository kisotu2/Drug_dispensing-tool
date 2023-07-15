<!DOCTYPE html>
<html>
<head>
    <title>Doctor Information Page</title>
    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }
        
        .form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: beige;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="int"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        
        input[type="reset"],
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="reset"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="selectdoctor.php" method="POST">
            <label for="SSN">SSN:</label><br>
            <input type="int" id="SSN" name="SSN"><br>

            <label for="Name">Name:</label><br>
            <input type="text" id="Name" name="Name"><br>

            <label for="Specialty">Specialty:</label><br>
            <input type="text" id="Specialty" name="Specialty"><br>
            
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

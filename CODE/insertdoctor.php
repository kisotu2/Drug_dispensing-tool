<!DOCTYPE html>
<html>
<head>
    <title>Doctor Information Page</title>
    <style>
        body{
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="formsheet.css">
</head>
<body>
    <div class="form">
        <form action="selectdoctor.php" method="POST">
        <div class = "container">
            <label for="SSN">SSN:</label><br>
            <input type="int" id="SSN" name="SSN"><br>

            <label for="Name">Name:</label><br>
            <input type="text" id="Name" name="Name"><br>

            <label for="Specialty">Specialty:</label><br>
            <input type="text" id="Specialty" name="Specialty"><br>

            <label for="Password">Password:</label><br>
            <input type="Password" id="Password" name="Password"><br><br>
            
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
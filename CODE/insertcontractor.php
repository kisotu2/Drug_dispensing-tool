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
        <form action="selectcontractor.php" method="POST">
        <div class = "container">
            <label for="CompanyID">CompanyID:</label><br>
            <input type="int" id="CompanyID" name="CompanyID"><br>

            <label for="CompanyName">CompanyName:</label><br>
            <input type="text" id="CompanyName" name="CompanyName"><br>

            <label for="Contractors">Contractors:</label><br>
            <input type="text" id="Contractors" name="Contractors"><br>

            <label for="PhoneNumber">PhoneNumber:</label><br>
            <input type="int" id="PhoneNumber" name="PhoneNumber"><br><br>
            
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
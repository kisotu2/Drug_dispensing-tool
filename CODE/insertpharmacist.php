<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Information Page</title>
    <link rel="stylesheet" href="formsheet.css">
    <style>
        body {
           margin: 0;
        }
    </style>

</head>
<body>
    <div class="form">
        <form action="selectpharmacist.php" method="POST">
            <div class="container">
            <label for="SSN">SSN:</label><br>
            <input type="int" id="SSN" name="SSN"><br>

            <label for="Name">Name:</label><br>
            <input type="text" id="Name" name="Name"><br>
            <label for="Password">Password:</label><br>
			<input type="Password"id="Password"name="Password"><br>


            <label for="PhoneNumber">Phone Number:</label><br>
            <input type="text" id="PhoneNumber" name="PhoneNumber"><br>


            <label for="Email">Email Address:</label><br>
            <input type="text" id="Email" name="Email"><br>
            
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>DRUG ADDITION PAGE</title>
    <style>
        body{
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="formsheet.css">
    
</head>
<body>
    <div class= "container">
    <div class="form">
        <form action="selectdrug.php" method="POST">
        <label for="ID">Drug ID:</label><br>
            <input type="int" id="ID" name="ID"><br>

            <label for="DrugName">Drug Name:</label><br>
            <input type="text" id="DrugName" name="DrugName"><br>
o
            <label for="Price">Price:</label><br>
            <input type="number" id="Price" name="Price"><br>

            <label for="Formula">Formula :</label><br>
            <input type="varchar" id="Formula" name="Formula"><br>

            <label for="Quantity">Quantity :</label><br>
            <input type="varchar" id="Quantity" name="Quantity"><br><br>
            
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </form>
    </div>
    </div>
</body>
</html>

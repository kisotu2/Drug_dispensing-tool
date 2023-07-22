<!DOCTYPE html>
<html>
	<head>
		<title>Patient Information Page</title>
		<link rel="stylesheet" href="formsheet.css">
		<style></style>
	</head>
	<style>
		body{
			margin: 0;
		}
	</style>
	<body>
	
	<div class="form">
		<form action="selectPrescription.php"method="POST">
		<div class = "container">
       
        <label for="ReceiptNo">ReceiptNo:</label><br>
			<input type="number"id="ReceiptNo"name="ReceiptNo"><br>

        <label for="ID">Drug ID:</label><br>
			<input type="number"id="ID"name="ID"><br>
			
            <label for="Drug">Drug Name:</label><br>
			<input type="text"id="Drug"name="Drug"><br>
           
           
			<label for="PatientSSN">Patient SSN</label><br>
			<input type="number"id="PatientSSN"name="PatientSSN"><br>

            <label for="Dosage">Dosage:</label><br>
			<input type="text"id="Dosage"name="Dosage"><br>


			<label for="DocSSN">DocSSN:</label><br>
			<input type="number"id="DocSSN"name="DocSSN"><br>

			

			<label for="PharmacistSSN"> PharmacistSSN:</label><br>
			<input type="number"id="PharmacistSSN"name="PharmacistSSN"><br>
			
			
			<label for="Status">Status:<br>PRESCRIBED</label> 

			<input type="radio"id="Prescribed"name="Status"value="PRESCRIBED"><br> 

  

			<label for="Status">DISPENSED</label> 

			<input type="radio"id="prescribed"name="Status"value="PRESCRIBED"><br> 

			<input type="reset">
			<input type="submit">
			</div>
		</form>

	</body>
</html>
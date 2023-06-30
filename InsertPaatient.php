<!DOCTYPE html>
<html>
	<head>
		<title>Patient Information Page</title>
		
	</head>
	<body>
	<div class="form">
		<form action="selectPatient.php"method="POST">
			<label for="Name">Name:</label><br>
			<input type="text"id="Name"name="Name"><br>
            <label for="Password">Password:</label><br>
			<input type="Password"id="Password"name="Password"><br>

			<label for="Age">Age:</label><br>
			<input type="number"id="Age"name="Age"><br>

            <label for="BloodGroup">BloodGroup:</label><br>
			<input type="text"id="BloodGroup"name="BloodGroup"><br>


			<label for="Illness">Illness:</label><br>
			<input type="text"id="Illness"name="Illness"><br>

			<label for="SSN">Social Security Number(SSN):</label><br>
			<input type="number"id="SSN"name="SSN"><br>

			<label for="Physician"> Physician:</label><br>
			<input type="text"id="Physician"name="Physician"><br>
			
			
			<label for="Gender">Gender:<br>Male</label> 

			<input type="radio"id="male"name="Gender"value="MALE"><br> 

  

			<label for="Gender">Female</label> 

			<input type="radio"id="female"name="Gender"value="FEMALE"><br> 

  

			<label for="Gender">Prefer not to say</label> 

			<input type="radio"id="prefernottosay"name="Gender"value="PREFERNOTTOSAY"><br> 
			<input type="radio"id="prefernottosay"name="Gender"value="PREFERNOTTOSAY"><br> 
			
			<label for="EmailAddress">Email Address:</label><br>
			<input type="text"id=" EmailAddress"name="EmailAddress"><br>
			
			<input type="reset">
			<input type="submit">
		</form>
	</body>
</html>
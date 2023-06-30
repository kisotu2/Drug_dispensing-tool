<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */


/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
<style>
.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}

.info {background-color: #2196F3;} /* Blue */

.other {background-color: #e7e7e7; color: black;} /* Gray */ 
.vertical-menu {
  width: 200px;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #04AA6D;
  color: white;
}
</style>

</head>
<body>
<h1>Home</h1>


<span class="label info">Info</span>
<span class="label other">Other</span>






<div class="vertical-menu">
    
  <a href="#" class="active">Users</a>
  <a href="Doctorloginform.php">Doctors</a>
  <a href="patientloginform.php">Patients</a>
  <a href="#">Pharmacist</a>
  <a href="Adminloginform.php">Admin</a>
</div>

  
</div>


</body>
</html>

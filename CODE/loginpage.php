<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box; 
}
body{
  margin: 0%;
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
  padding: 24px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #04AA6D;
  color: white;
}
.container {
  background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
  
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  position: relative;
  z-index: 1;
  min-height: 100vh;
}
header{
color:rgb(22, 21, 21);
background-color:rgb(146, 186, 199) ;
background-size: 10cm;
text-indent: 35%;
font-size: x-large;
font-family: Georgia, 'Times New Roman', Times, serif;

}

</style>

</head>
<body>
  <div class="container">
<header>Home</header>
<div class="vertical-menu">
    
  <a href="#" class="active">Users</a>
  <a href="Doctorloginform.php">Doctors</a>
  <a href="patientloginform.php">Patients</a>
  <a href="pharmacistloginform.php">Pharmacist</a>
  <a href="Adminloginform.php">Admin</a>
</div>
<a href="maindashboard.php" class="btn btn-danger btn-sm">Back</a>
  
</div>

</div>
</body>
</html>

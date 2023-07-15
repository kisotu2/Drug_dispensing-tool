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

body {
    /* The image used */
    background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
    
    /* Add the blur effect */
    filter: blur(8px);
    -webkit-filter: blur();
    
    /* Full height */
    height: auto; 
    
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: repeat;
    background-size: cover;
    overflow: scroll;
  }
</style>

</head>
<body>
<h1>RECORDS</h1>


<span class="label info">Info</span>




<div class="vertical-menu">
    
  <a href="#" class="active">ADMIN</a>
  <a href="doctordetails.php">Doctors</a>
  <a href="patientdetails.php">Patients</a>
  <a href="pharmacistdetails.php">Pharmacist</a>
</div>

  
</div>



</body>
</html>

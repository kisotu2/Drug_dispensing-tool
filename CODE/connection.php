<?php
$servername = "localhost";
$username = "root";
$dbname="drug_dispenser";
$password = '';


// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql="INSERT INTO patients(SSN,Name,Address,Ages)VALUES('954767','Precious Ken','NRD 55','32')";

if($conn->query($sql)=== TRUE){
   
  echo "New Record created successfully";}

    else{
        echo"ERROR: " .$sql. "<br>" .mysqli_error($conn);
    }
    $conn->close();
?>
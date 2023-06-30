<?php
var_dump($_POST);
if(isset($_POST['submit'])){
$Name=$_POST['Name'];
$Password=$_POST['Password'];
$Gender=$_POST['Gender'];
$Age=$_POST['Age'];
$Physician=$_POST['Physician'];
$Illness=$_POST['Illness'];
$BloodGroup=$_POST['BloodGroup'];
$SSN=$_POST['SSN'];
$EmailAddress=$_POST['EmailAddress'];
}
if(!empty($Name) && !empty($Password)&&!empty($Gender)&&!empty($EmailAddress)&&!empty($Age)&&!empty($SSN)&&!empty($Illness)&&!empty($BloodGroup)&&!empty($Physician)){
    $servername = "localhost";
$username = "root";
$dbname="drug_dispenser";
$password = '';

//create connection
$conn= new mysqli($servername,$username,$dbname,$password);
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')' .mysqli_connect_error());
}else{
    $sql ="SELECT SSN From patientsrecords Where SSN=? Limit 1";
    $sql="INSERT Into patientsrecords(SSN,Name,Password,Gender,Age,Physician,Illness,BloodGroup,EmailAddress)values(?,?,?,?,?,?,?,?,?) "; 
   $stmt= $conn->prepare($SELECT);
   $stmt->bind_param("i",$SSN) ;
   $stmt->execute();
   $stmt->bind_result($SSN);
   $stmt->store_result();
   $rnum=$stmt->num_rows;
   if($rnum==0){
    $stmt->close();
    $stmt=$conn->prepare( $INSERT);
    $stmt->bind_param("isssissss",$SSN, $Name,$Password,$Gender,$Age,$Physician,$Illness,$BloodGroup,$EmailAddress);
    $stmt->execute();
    echo"New record inserted successfully";
   }else{
    echo"Someone already registered using this SSN";
   }
   $stmt->close();
$conn->close(); 
}
}else{
    echo"All fields are required";
    
}
    ?> 
<?php
require_once("mainconnection.php");
print_r ($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $Name=$_POST['Name'];
        $Password=$_POST['Password'];
        $Gender=$_POST['Gender'];
        $Age=$_POST['Age'];
        $Physician=$_POST['Physician'];
        $Illness=$_POST['Illness'];
        $BloodGroup=$_POST['BloodGroup'];
        $SSN=$_POST['SSN'];
        $EmailAddress=$_POST['EmailAddress'];

//$db>establishConnection();
$sql="INSERT Into patientsrecords(SSN,Name,Password,Gender,Age,Physician,Illness,BloodGroup,EmailAddress)values('$SSN','$Name','$Password','$Gender','$Age','$Physician','$Illness','$BloodGroup','$EmailAddress') "; 

if($conn->query($sql)===TRUE){
echo "<script>alert('Data inserted successfully')</script>";
header("Location: adminview.php");
}
else{
echo "Error:".$sql."<br>".$conn->error;
    //$db->closeConnection();
    }}
 } catch (Exception $ex) {
     echo "<script>alert('no connection')</script>";

}       
?>
<?php
require_once("mainconnection.php");
print_r ($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $Drug=$_POST['Drug'];
        $ReceiptNo=$_POST['ReceiptNo'];
        $PatientSSN=$_POST['PatientSSN'];
        $Dosage=$_POST['Dosage'];
        $ID=$_POST['ID'];
        $Status=$_POST['Status'];
        $DocSSN=$_POST['DocSSN'];
        $PharmacistSSN=$_POST['PharmacistSSN'];
       
//$db>establishConnection();
$sql="INSERT Into prescriptions(ReceiptNo,ID,Drug,Dosage,Status,DocSSN,PatientSSN,PharmacistSSN)values('$ReceiptNo','$ID','$Drug','$Dosage','$Status','$DocSSN','$PatientSSN','$PharmacistSSN') "; 

if($conn->query($sql)===TRUE){
echo "<script>alert('Data inserted successfully')</script>";
header("Location: prescriptiontable.php");
}
else{
echo "Error:".$sql."<br>".$conn->error;
    //$db->closeConnection();
    }}
 } catch (Exception $ex) {
     echo "<script>alert('no connection')</script>";

}       
?>
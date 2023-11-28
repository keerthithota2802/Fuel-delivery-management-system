<?php
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
session_start();
$name=$_SESSION['useruname'];
$sql="select ID from tbluser where UserName='$name'";
$temp=mysqli_query($con,$sql);
$temp=mysqli_fetch_assoc($temp);
$id=$temp['ID'];
$ordernum=mt_rand(100000000,999999999);
$uid=$id;
$stateid=$_POST['state'];
$city=$_POST['city'];
$afs=$_POST['fs'];
$tof=$_POST['tp'];
$fprice=$_POST['fp'];
$qof=$_POST['qfl'];
$fda=$_POST['address'];
$mop=$_POST['pmd'];
$sql="INSERT INTO `tblorderfuel`(`ordernum`, `UserID`, `Stateid`, `Cityid`, `fuelStationid`, `Typeoffuel`, `FuelPrice`, `Quantityoffuel`, `DeliveryAddress`, `ModeofPayment`) VALUES
 ('$ordernum','$uid','$stateid','$city','$afs','$tof','$fprice','$qof','$fda','$mop')";
if(mysqli_query($con,$sql)){
echo '<script>alert("Your order has been sent successfully. Order Number is "+"'.$ordernum.'")</script>';
echo "<script>window.location.href ='orderfuel.php'</script>";
}
else{
	echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
?>

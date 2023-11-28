<?php
$con=mysqli_connect("localhost","root","","fdms");
session_start();
$id=$_SESSION['ownerupdateid'];
unset($_SESSION['ownerupdateid']);
$name=$_REQUEST['name'];
$uname=$_REQUEST['uname'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['mno'];
unset($_SESSION['ownerusername']);
$_SESSION['ownerusername']=$uname;
$sql="UPDATE `tblfuelstationowner` SET `Name`='$name',`UserName`='$uname',`MobileNumber`='$phone',`Email`='$email' WHERE ID='$id'";
if(mysqli_query($con,$sql)){
echo "<script>alert('Profile updated')</script>";
echo "<script>location.href='ownerupdateprofile.php'";
}
else{
echo "something went wrong";
}
?>
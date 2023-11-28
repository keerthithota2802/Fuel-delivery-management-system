<?php
$con=mysqli_connect("localhost","root","","fdms");
session_start();
$id=$_SESSION['adminupdateid'];
unset($_SESSION['adminupdateid']);
$name=$_REQUEST['name'];
$uname=$_REQUEST['uname'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['mno'];
unset($_SESSION['adminusername']);
$_SESSION['adminusername']=$uname;
$sql="UPDATE `tbladmin` SET `AdminName`='$name',`UserName`='$uname',`MobileNumber`='$phone',`Email`='$email' WHERE ID='$id'";
if(mysqli_query($con,$sql)){
echo "<script>alert('Profile updated')</script>";
echo "<script>location.href='adminupdateprofile.php'";
}
else{
echo "something went wrong";
}
?>
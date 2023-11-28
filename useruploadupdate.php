<?php
$con=mysqli_connect("localhost","root","","fdms");
session_start();
$id=$_SESSION['userupdateid'];
unset($_SESSION['userupdateid']);
$name=$_REQUEST['name'];
$uname=$_REQUEST['uname'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['mno'];
unset($_SESSION['useruname']);
$_SESSION['useruname']=$uname;
$sql="UPDATE `tbluser` SET `Name`='$name',`UserName`='$uname',`MobileNumber`='$phone',`Email`='$email' WHERE ID='$id'";
if(mysqli_query($con,$sql)){
echo "<script>alert('Profile updated')</script>";
echo "<script>location.href='userupdateprofile.php'</script>";
}
else{
echo "something went wrong";
}
?>
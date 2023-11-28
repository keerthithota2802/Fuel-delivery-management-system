<?php
session_start();
$rid=$_SESSION['editcityid'];
unset($_SESSION['editcityid']);
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$city=$_GET['city'];
$sql="update tblcity set City='$city' where ID='$rid'";
if(mysqli_query($con,$sql)){
  echo "<script>alert('Data Updated Successfully');</script>"; 
  echo "<script>window.location.href = 'managecity.php'</script>";     
}
else{
echo "Something went wrong";
}
?>


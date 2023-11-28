<?php
echo "hello";
echo "hello";
session_start();
$rid=$_SESSION['editstateid'];
unset($_SESSION['editstateid']);
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$state=$_GET['state'];
echo $state;
echo $rid;
$sql="update tblstate set State='$state' where ID='$rid'";
if(mysqli_query($con,$sql)){
  echo "<script>alert('Data Updated Successfully');</script>"; 
  echo "<script>window.location.href = 'managestate.php'</script>";     
}
else{
echo "Something went wrong";
}
?>


<?php
session_start();
$rid=$_SESSION['editfpid'];
unset($_SESSION['editfpid']);
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$typefp=$_GET['typefp'];
$todayfp=$_GET['todayfp'];
$sql="update tblfuelprice set Typeoffuel='$typefp',TodayFuelprice='$todayfp' where ID='$rid'";
if(mysqli_query($con,$sql)){
  echo "<script>alert('Data Updated Successfully');</script>"; 
  echo "<script>window.location.href = 'managefp.php'</script>";     
}
else{
echo "Something went wrong";
}
?>


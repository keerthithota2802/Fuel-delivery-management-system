<html>
<head>
<title>upload</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$state=$_REQUEST['state'];
$city=$_REQUEST['city'];
$sql="select ID from tblstate where State='$state'";
$result=mysqli_query($con,$sql);
$stateid=mysqli_fetch_assoc($result);
$stateid=$stateid['ID'];
$sql="INSERT INTO `tblcity`(`Stateid`, `City`) VALUES ('$stateid','$city')";
if(mysqli_query($con,$sql)){
echo "<script>alert('data inserted successfully')</script>";
echo "<script>location.href='addcity.php'</script>";
}
else{
echo "error";
echo "<script>location.href='addcity.php'</script>";
}
mysqli_close($con);
?>
</body>
</html>


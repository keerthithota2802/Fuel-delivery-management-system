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
$sql="INSERT INTO `tblstate`(`State`) VALUES ('$state')";
if(mysqli_query($con,$sql)){
echo "data inserted successfully";
echo "<script>location.href='addstate.php'</script>";
}
else{
echo "error";
}
mysqli_close($con);
?>
</body>
</html>


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
$typefp=$_REQUEST['typefp'];
$fp=$_REQUEST['fp'];
$sql="INSERT INTO `tblfuelprice`(`Typeoffuel`, `TodayFuelprice`) VALUES ('$typefp','$fp')";
if(mysqli_query($con,$sql)){
echo "<script>alert('data inserted successfully')</script>";
echo "<script>location.href='addfuelprice.php'</script>";
}
else{
echo "error";
echo "<script>location.href='addfuelprice.php'</script>";
}
mysqli_close($con);
?>
</body>
</html>


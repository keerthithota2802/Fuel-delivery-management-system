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
session_start();
$eid=$_SESSION['deleteid'];
unset($_SESSION['deleteid']);
echo '$eid';
$sql="delete from tblfuelstation where ID='$eid'";
if(mysqli_query($con,$sql)){
echo "<script>alert('Data Deleted')</script>";
unset($_SESSION['deleteid']);
echo "<script>location.href='managefs.php'</script>";
}
mysqli_close($con);
?>
</body>
</html>


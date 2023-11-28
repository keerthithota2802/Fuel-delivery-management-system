<html>
<head>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$uname=$_REQUEST['username'];
$pwd=$_REQUEST['password'];
session_start();
if(isset($_SESSION['ownerusername'])){
echo "h1>Welcome ".$_SESSION['ownerusername']."</h1>";
echo "<script>location.href='owner.php'</script>";
}
else{
$sql = "SELECT * FROM tblfuelstationowner WHERE UserName='".$uname."' and Password='".$pwd."'";
$result = $con->query($sql);
if ($result->num_rows > 0)
{
$_SESSION['ownerusername']=$uname;
echo "<script>location.href='owner.php'</script>";
}
else
{
echo "<script>alert('username or password incorrect!')</script>";
echo "<script>location.href='ownerlogin.php'</script>";
}
}
?>
</body>
</html>
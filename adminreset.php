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
$uname=$_REQUEST['uname'];
$pwd1=$_REQUEST['password1'];
$pwd2=$_REQUEST['password2'];
$sql = "SELECT * FROM tbladmin WHERE UserName = '$uname'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0)
{
    if($pwd1==$pwd2){
		$sql1="update tbladmin set Password='$pwd1' where UserName='$uname'";
		if(mysqli_query($con,$sql1)){
			echo '<script>alert("password updated successfully")</script>';
			echo '<script>location.href="adminlogin.php"</script>';
		}
	}
    else{
	echo "<script>alert('Passwords Not Matched')</script>";
	echo '<script>location.href="adminresetpassword.php"</script>';
	}
}
else
{
    echo "<script>alert('Email does not exists')</script>";
	echo '<script>location.href="adminresetpassword.php"</script>';
}
mysqli_close($con);
?>
</body>
</html>


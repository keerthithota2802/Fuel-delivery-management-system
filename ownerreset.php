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
$sql = "SELECT * FROM tblfuelstationowner WHERE UserName = '$uname'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0)
{
    if($pwd1==$pwd2){
		$sql1="update tblfuelstationowner set Password='$pwd1' where UserName='$uname'";
		if(mysqli_query($con,$sql1)){
			echo '<script>alert("password updated successfully")</script>';
			echo '<script>location.href="ownerlogin.php"</script>';
		}
	}
    else{
	echo "Passwords Not Matched";
	}
}
else
{
    echo "Email does not exists";
}
mysqli_close($con);
?>
</body>
</html>


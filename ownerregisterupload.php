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
$name=$_REQUEST['name'];
$uname=$_REQUEST['uname'];
$pwd=$_REQUEST['pwd'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['mno'];
$id=$_REQUEST['id'];
$sql="INSERT INTO tblfuelstationowner  VALUES('$id','$name','$uname','$phone','$email','$pwd')";
if(mysqli_query($con,$sql)){
echo '<script>alert("data inserted successfully")</script>';
echo '<script>location.href="ownerlogin.php"</script>';
}
mysqli_close($con);
?>
</body>
</html>


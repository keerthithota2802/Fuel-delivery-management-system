<html>
<head>
<title>upload</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","student");
if($con===false){
die("error could not connect");
}
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$sql="INSERT INTO DETAILS VALUES('$name','$phone','$email')";
if(mysqli_query($con,$sql)){
echo "data inserted successfully";
}
mysqli_close($con);
?>
</body>
</html>


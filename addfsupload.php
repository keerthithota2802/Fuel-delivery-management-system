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
$namefs=$_REQUEST['namefs'];
$locationfs=$_REQUEST['locationfs'];
session_start();
$uname=$_SESSION['ownerusername'];
$sql="select ID from tblfuelstationowner where UserName='$uname'";
$result=mysqli_query($con,$sql);
$ownerid=mysqli_fetch_assoc($result);
$ownerid=$ownerid['ID'];
echo $ownerid;
echo $cityid;	
echo $stateid;
$sql="INSERT INTO `tblfuelstation`(`OwnerID`, `Stateid`, `Cityid`, `Nameoffuelstation`, `Locationoffuelstation`) VALUES ('$ownerid','$state','$city','$namefs','$locationfs')";
if(mysqli_query($con,$sql)){
echo "data inserted successfully";
echo "<script>location.href='managefs.php'</script>";
}
mysqli_close($con);
?>
</body>
</html>


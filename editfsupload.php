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
$eid=$_SESSION['editfsid'];
unset($_SESSION['editfsid']);
$state=$_REQUEST['state'];
$city=$_REQUEST['city'];
$namefs=$_REQUEST['namefs'];
$locationfs=$_REQUEST['locationfs'];
$sql="select ID from tblstate where State='$state'";
$result=mysqli_query($con,$sql);
$stateid=mysqli_fetch_assoc($result);
$stateid=$stateid['ID'];
$sql="select ID from tblcity where City='$city'";
$result=mysqli_query($con,$sql);
$cityid=mysqli_fetch_assoc($result);
$cityid=$cityid['ID'];
$uname=$_SESSION['ownerusername'];
$sql="select ID from tblfuelstationowner where UserName='$uname'";
$result=mysqli_query($con,$sql);
$ownerid=mysqli_fetch_assoc($result);
$ownerid=$ownerid['ID'];
echo $ownerid;
echo $cityid;	
echo $stateid;
$sql="update tblfuelstation set Stateid='$stateid',Cityid='$cityid',NameoffuelStation='$namefs', LocationoffuelStation='$locationfs' where ID='$eid'";
if(mysqli_query($con,$sql)){
echo "<script>alert('Data updated sucessfully')</script>";
echo '<script>location.href="managefs.php"</script>';
}
else{
echo 'error';
}
mysqli_close($con);
?>
</body>
</html>


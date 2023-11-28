<?php
if(isset($_GET['delfsid']))
{
$rid=intval($_GET['delfsid']);
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$sql="delete from tblfuelstation where ID='$rid'";
if(mysqli_query($con,$sql)){
  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'managefs.php'</script>";     
}
else{
echo "Something went wrong";
}
}
?>
<?php
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
session_start();
$name=$_SESSION['ownerusername'];
$sql="select ID from tblfuelstationowner where UserName='$name'";
$res=mysqli_query($con,$sql);
$res=mysqli_fetch_assoc($res);
$uid=$res['ID'];
$sql="SELECT tblstate.ID as sid,tblstate.State,tblcity.ID as cid,tblcity.Stateid,tblcity.City,tblfuelstation.ID as fsid,tblfuelstation.OwnerID,tblfuelstation.Stateid as fssid,tblfuelstation.Cityid as fscid,tblfuelstation.Nameoffuelstation,tblfuelstation.Locationoffuelstation from tblfuelstation join tblstate on tblstate.ID=tblfuelstation.Stateid join tblcity on tblcity.ID=tblfuelstation.Cityid where tblfuelstation.OwnerID='$uid'";
$result=mysqli_query($con,$sql);
?>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.edit{
background-color:violet;
border:1px solid violet;
color:white;
border-width:10px;
}
.delete{
background-color:violet;
border:1px solid violet;
color:white;
border-width:10px;
}
.div1{
background-color:violet;
color:white;
height:100%;
width:200px;
}
.maindiv{
position:fixed;
left:207px;
top:45px;
width:100%;
height:100%;
background-color:lightgrey;
}
.settingsicon{
position:fixed;
right:30px;
top:10px;
}
.dropbtn {
  background-color:violet;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: violet;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: violet;}
.subdiv{
background-color:white;
position:relative;
top:20px;
left:15px;
height:85%;
width:84%;
}
</style>
</head>
<body>
<div class="div1">
<center><h1>FDMS</h1>
<div class="dropdown">
<button class="dropbtn">
<span class="icon"><i class='far fa-user-circle' style='font-size:48px'></i></span></button>
<div class="dropdown-content">
<a href="ownerupdateprofile.php">Profile</a>
<a href="ownerchangepassword.php">Change Password</a>
<a href="ownerlogout.php">Log Out</a>
</div>
</div>
</center><br>
<?php
echo "<center>".$name."</center>";
?>
<br>
<br>
<div>
<span class="icon">
&nbsp&nbsp&nbsp&nbsp&nbsp<i class="material-icons" style="font-size:14px">dashboard</i></span>
<a href="owner.php" style="text-decoration:none;color:white;">DashBoard</a><br><br>
</div>
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
&nbsp&nbsp<i class='fas fa-gas-pump' style='font-size:17px'></i></span>
<span class="text">Fuel Station</span></button>
<div class="dropdown-content">
<a href="addfs.php">addfuelstation</a>
<a href="managefs.php">managefuelstaion</a>
</div>
</div>
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
&nbsp&nbsp<i class="fa fa-first-order" style="font-size:18px"></i></span>
<span class="text">orderof fuel</span></button>
<div class="dropdown-content">
<a href="neworder.php">NewFuelOrder</a>
<a href="confirmedorder.php">Confirmed Fuel Order</a>
<a href="onthewayorder.php">Delivery Boy On the Way</a>
<a href="deliveredorder.php">Fuel Delivered</a>
<a href="cancelledorder.php">Order Cancelled</a>
<a href="allorders.php">All Fuel Orders</a>
</div>
</div>
<div class="maindiv">
<div class="subdiv">
<br>
<br><br>
session_start();
<table align="center" border="1px" style="width:850px; line-height:40px;"> 
	<tr> 
		<th colspan="8"><h2>Manage Fuel Station</h2></th> 
		</tr> 
			  <th> ID </th>  
			  <th> State </th> 
			  <th> City </th> 
			  <th>Nameoffuelstation</th>
			  <th>Locationoffuelstation</th>
			  <th>Edit</th>
			  <th>Delete</th>
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['fsid']; ?></td> 
		<td><?php echo $rows['State']; ?></td>
		<td><?php echo $rows['City']; ?></td>
		<td><?php echo $rows['Nameoffuelstation']; ?></td> 
		<td><?php echo $rows['Locationoffuelstation']; ?></td>
		<td style="width:80px"><center><a href="editfs.php?editfsid=<?php echo ($rows['fsid']);?>" class="edit" style="text-decoration:none">Edit</a></center></td>
		<td style="width:80px"><center><a href="managefs.php"?delfsid=<?php echo ($rows['fsid']);?>"
		  onclick="return confirm('Do you really want to Delete ?');" class="delete" style="text-decoration:none">Delete</a></center></td>
		</tr>
<?php
}
?>
</div>
</div>
</body>
</html>
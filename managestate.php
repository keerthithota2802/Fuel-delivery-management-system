<?php
if(isset($_GET['delstateid']))
{
$rid=intval($_GET['delstateid']);
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$sql="delete from tblstate where ID='$rid'";
if(mysqli_query($con,$sql)){
  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'managestate.php'</script>";     
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
$query="select * from tblstate";
$result=mysqli_query($con,$query);
?>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
.subdiv{
position:relative;
background-color:white;
color:black;
width:70%;
height:85%;
left:40px;
top:30px;
}
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
.submit{
background-color:violet;
color:white;
width:60px;
height:40px;
border:none;
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
</style>
</head>
<body>
<div class="div1">
<center><h1>FDMS</h1>
<div class="dropdown">
<button class="dropbtn">
<span class="icon"><i class='far fa-user-circle' style='font-size:48px'></i></span></button>
<div class="dropdown-content">
<a href="adminupdateprofile.php">Profile</a>
<a href="adminchangepassword.php">Change Password</a>
<a href="adminlogout.php">Log Out</a>
</div>
</div>
</center><br>
<?php
session_start();
$name=$_SESSION['adminusername'];
echo "<center>".$name."</center>";
?>
<br>
<br>
<div>
<span class="icon">
&nbsp&nbsp&nbsp&nbsp&nbsp<i class="material-icons" style="font-size:14px">dashboard</i></span>
<a href="admin.php" style="text-decoration:none;color:white;">DashBoard</a><br><br>
</div>
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<span class="text">Fuel Price</span></button>
<div class="dropdown-content">
<a href="addfuelprice.php">Add Fuel Price</a>
<a href="managefp.php">Manage Fuel Price</a>
</div>
</div>
<br>
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<span class="text">State</span></button>
<div class="dropdown-content">
<a href="addstate.php">Add State</a>
<a href="managestate.php">Manage State</a>
</div>
</div>
<br>
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<span class="text">City</span></button>
<div class="dropdown-content">
<a href="addcity.php">Add City</a>
<a href="managecity.php">Manage City</a>
</div>
</div>
<br>
<div>
&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-search" style="font-size:24px"></i></span>
<a href="adminsearch.php" style="text-decoration:none;color:white;">Search</a><br>
</div>
<br>
<div>
&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class='fas fa-user-alt' style='font-size:24px'></i></span>
<a href="reg_users.php" style="text-decoration:none;color:white;">Reg Users</a><br><br>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class='fas fa-user-alt' style='font-size:24px'></i></span>
<a href="regfuelstationowner.php" style="text-decoration:none;color:white;">Reg Owners</a><br><br>
</div>
<div class="maindiv">
<div class="subdiv">
<br>
<br><br>
<table align="center" border="1px" style="width:850px; line-height:40px;"> 
	<tr> 
		<th colspan="8"><h2>Manage State</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> State </th> 
			  <th>Edit</th>
			  <th>Delete</th>
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['ID']; ?></td>  
		<td><?php echo $rows['State']; ?></td>
		<td style="width:80px"><center><a href="editstate.php?editstateid=<?php echo ($rows['ID']);?>" class="edit" style="text-decoration:none">Edit</a></center></td>
		<td style="width:80px"><center><a href="managestate.php?delstateid=<?php echo ($rows['ID']);?>"  onclick="return confirm('Do you really want to Delete ?');"
                      class="delete" style="text-decoration:none">Delete</a></center></td>
		</tr>
<?php
}
?>
</div>
</div>
</body>
</html>
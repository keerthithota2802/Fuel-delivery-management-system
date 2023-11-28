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
.container{
padding:25px;
}
.signup{
background-color:violet;
color:white;
width:20%;
padding:15px;
border:none;
}
input[type=text], input[type=password],input[type=email], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
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
display:inline-block;
}
.totalfuelstation{
background-color:white;
color:black;
position:fixed;
top:75px;
left:260px;
width:210px;
height:135px;
}
.newfuelorder{
background-color:white;
color:black;
position:fixed;
top:75px;
left:550px;
width:210px;
height:135px;
}
.confirmedorder{
background-color:white;
color:black;
position:fixed;
top:75px;
left:840px;
width:210px;
height:135px;
}
.cancelledorder{
background-color:white;
color:black;
position:fixed;
top:75px;
right:165px;
width:210px;
height:135px;
}
.deliveryboyontheway{
background-color:white;
color:black;
position:fixed;
top:230px;
left:260px;
width:210px;
height:135px;
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
<div class="dropdown">
<button class="dropbtn">
<span class="icon">
<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<span class="text">Page</span></button>
<div class="dropdown-content">
<a href="https://www.youtube.com/">About Us</a>
<a href="https://www.youtube.com/">Contact Us</a>
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
<span class="text">Search</span>
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
<?php
$con=mysqli_connect("localhost","root","","fdms");
$name=$_SESSION['adminusername'];
$sql="select * from tbladmin where UserName='$name'";
$result=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($result);
$_SESSION['adminupdateid']=$result['ID'];
?>
<form method="get" action="adminuploadupdate.php">
<div class="container">
Full Name:<input type="text" name="name" value="<?php echo $result['AdminName'] ?>"><br><br>
User Name:<input type="text" name="uname" value="<?php echo $result['UserName'] ?>"><br><br>
Email Address:<input type="email" name="email" value="<?php echo $result['Email'] ?>"><br><br>
Mobile Number:<input type="text" name="mno" value="<?php echo $result['MobileNumber'] ?>"><br><br>
<center><button type="submit" name="submit" class="signup">update</button><br><br></center>
</div>
</form>
</div>
</body>
</html>

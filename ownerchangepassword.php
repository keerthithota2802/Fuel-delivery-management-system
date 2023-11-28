<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.div1{
background-color:violet;
color:white;
height:100%;
width:200px;
}
input[type=text], input[type=password],input[type=email], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
.reset{
background-color:violet;
border:none;
width:80px;
color:white;
height:30px;
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
<a href="ownerupdateprofile.php">Profile</a>
<a href="ownerchangepassword.php">Change Password</a>
<a href="ownerlogout.php">Log Out</a>
</div>
</div>
</center><br>
<?php
session_start();
$name=$_SESSION['ownerusername'];
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
<a href="#">NewFuelOrder</a>
<a href="https://www.youtube.com/">Confirmed Fuel Order</a>
<a href="https://www.youtube.com/">Delivery Boy On the Way</a>
<a href="https://www.youtube.com/">Fuel Delivered</a>
<a href="https://www.youtube.com/">Order Cancelled</a>
<a href="https://www.youtube.com/">All Fuel Orders</a>
</div>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<span class="text">Reports</span>
</div>
<div class="settingsicon">
<i class="material-icons" style="font-size:25px;color:black;" >settings</i></button>
</div>
<div class="maindiv">
<form method="get" action="ownercp.php" >
UserName<br>
<input type="text" name="uname"><br><br>
New Password<br>
<input type="password" name="password1"><br><br>
Confirm Password<br>
<input type="password" name="password2"><br><br>
<center><button type="submit" class="reset">RESET</button><br><br></center>
</form>
</div>
</body>
</html>
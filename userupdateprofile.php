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
<a href="userupdateprofile.php">Profile</a>
<a href="userchangepassword.php">Change Password</a>
<a href="userlogout.php">Log Out</a>
</div>
</div>
<?php
session_start();
$name=$_SESSION['useruname'];
echo "<center>".$name."</center>";
?>
<br>
<br>
<div>
<span class="icon">
&nbsp&nbsp&nbsp&nbsp&nbsp<i class="material-icons" style="font-size:14px">dashboard</i></span>
<a href="userdashboard.php" style="text-decoration:none;color:white;">DashBoard</a><br><br>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<a href="orderfuel.php" style="text-decoration:none;color:white;">Order Your Fuel</a><br><br>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<a href="orderstatus.php" style="text-decoration:none;color:white;">View Status</a><br><br>
</div>
<div>
&nbsp&nbsp<span class="icon"><i class="fa fa-search" style="font-size:24px"></i></span>
<span class="text">Search</span>
</div>
</div>
<div class="maindiv"><br>
<?php
$con=mysqli_connect("localhost","root","","fdms");
$name=$_SESSION['useruname'];
$sql="select * from tbluser where UserName='$name'";
$result=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($result);
$_SESSION['userupdateid']=$result['ID'];
?>
<form method="get" action="useruploadupdate.php">
<div class="container">
Full Name:<input type="text" name="name" value="<?php echo $result['Name'] ?>"><br><br>
User Name:<input type="text" name="uname" value="<?php echo $result['UserName'] ?>"><br><br>
Email Address:<input type="email" name="email" value="<?php echo $result['Email'] ?>"><br><br>
Mobile Number:<input type="text" name="mno" value="<?php echo $result['MobileNumber'] ?>"><br><br>
<center><button type="submit" name="submit" class="signup">update</button><br><br></center>
</div>
</form>
</div>
</body>
</html>
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
table, th {
  border: 1px solid lightsteelblue;
  border-collapse: collapse;
  padding:12px;
background-color:white;
position:relative;
}
 td {
  border: 1px solid lightsteelblue;
  border-collapse: collapse;
  padding:12px;
background-color:white;
position:relative;
background-color:lightblue;
}
.edit{
background-color:violet;
border:1px solid violet;
color:white;
border-width:7px;
text-decoration:none;
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
.subdiv{
background-color:white;
position:relative;
left:20px;
width:83%;
height:88%;
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
<a href="usersearch.php" style="text-decoration:none;color:white;">Search</a><br><br>
</div>
</div>
<div class="maindiv"><br>
<div class="subdiv">
<center><h3>Order Status</h3>
<table  border="1">
                      <thead>
                       <tr>
                                               <th>S.No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                       <th>Name of fuel station</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                        <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr>
                           <?php
$con=mysqli_connect("localhost","root","","fdms");
$sql="select ID from tbluser where UserName='$name'";
$t=mysqli_query($con,$sql);
$t=mysqli_fetch_assoc($t);
$uid=$t['ID'];
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.OrderDate,tblorderfuel.ID as orderid,tblfuelstation.NameoffuelStation,
 tblorderfuel.UserID,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID
join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tbluser.ID='$uid'";
$query=mysqli_query($con,$sql);
$cnt=1;
while($rows=mysqli_fetch_assoc($query))
{               ?>
                         <td ><?php echo $cnt;?></td>
                                        <td><?php  echo $rows['ordernum'];?></td>
                                        <td><?php  echo $rows['Name'];?></td>
                                        <td><?php  echo $rows['MobileNumber'];?></td>
                                        <td><?php  echo $rows['Email'];?></td>
                                        <td><?php  echo $rows['NameoffuelStation'];?></td>
                                             <?php if($rows['Status']==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo $rows['Status'];?>
                  </td>
                  <?php } ?>         
                  <td><?php  echo $rows['OrderDate'];?></td>
                 
                                        <td><a  class="edit" href="uservieworderdetail.php?editid=<?php echo $rows['orderid'];?>&&oid=<?php echo $rows['ordernum'];?>">View</a></td>
                        </tr>
                       
                        <?php $cnt=$cnt+1;} ?>
                      </tbody>
                    </table>
</center>
</div>
</div>
</body>
</html>
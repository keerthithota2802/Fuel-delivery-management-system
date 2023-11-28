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
.edit{
background-color:violet;
border:1px solid violet;
color:white;
border-width:7px;
text-decoration:none;
}

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
.subdiv{
position:relative;
left:25px;
}
.maindiv{
position:fixed;
left:207px;
top:45px;
width:100%;
height:100%;
background-color:lightgrey;
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
$con=mysqli_connect("localhost","root","","fdms");
$sql="select ID from tblfuelstationowner where UserName='$name'";
$result=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($result);
$ownerid=$result['ID'];
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
<a href="neworder">NewFuelOrder</a>
<a href="confirmedorder.php">Confirmed Fuel Order</a>
<a href="onthewayorder.php">Delivery Boy On the Way</a>
<a href="deliveredorder.php">Fuel Delivered</a>
<a href="cancelledorder.php">Order Cancelled</a>
<a href="allorders.php">All Fuel Orders</a>
</div>
</div>
<div class="maindiv">
<div class="subdiv">
<h2>Cancelled orders Order</h2>
<table class="table table-bordered">
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

                                              
                        <tr class="table-info">
                           <?php
                           
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.OrderDate,tblorderfuel.ID as orderid,tblfuelstation.NameoffuelStation, tblorderfuel.UserID,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID
join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status='Cancelled' and tblfuelstation.OwnerID='$ownerid'";
$query =mysqli_query($con,$sql);

$cnt=1;
if($query->num_rows > 0)
{
foreach($query as $row)
{               ?>
                         <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row['ordernum']);?></td>
                                        <td><?php  echo htmlentities($row['Name']);?></td>
                                        <td><?php  echo htmlentities($row['MobileNumber']);?></td>
                                        <td><?php  echo htmlentities($row['Email']);?></td>
                                        <td><?php  echo htmlentities($row['NameoffuelStation']);?></td>
                                             <?php if($row['Status']==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row['Status']);?>
                  </td>
                  <?php } ?>         
                  <td><?php  echo htmlentities($row['OrderDate']);?></td>
                 
                                        <td><a class="edit" href="ownervieworderdetail.php?editid=<?php echo htmlentities ($row['orderid']);?>&&oid=<?php echo htmlentities ($row['ordernum']);?>">View</a></td>
                        </tr>
                       
                         <?php $cnt=$cnt+1;}} else{ ?>
                          <tr>
                            <td colspan="9" style="color:red;">No Records available.</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
</div>
</div>
</body>
</html>
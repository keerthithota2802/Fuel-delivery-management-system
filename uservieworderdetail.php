<?php
$con=mysqli_connect("localhost","root","","fdms");
$eid=$_GET['editid'];
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.ID as orderid,tblstate.ID,tblstate.State,
tblcity.ID,tblcity.City,tblcity.Stateid,tblfuelstation.ID,tblfuelstation.OwnerID,tblfuelstation.Stateid,tblfuelstation.Cityid,
tblfuelstation.NameoffuelStation,tblfuelstation.LocationoffuelStation,tblfuelprice.ID,tblfuelprice.Typeoffuel as type,
tblfuelprice.TodayFuelprice, tblorderfuel.ID,tblorderfuel.ordernum,tblorderfuel.UserID,tblorderfuel.Stateid,tblorderfuel.Cityid,
tblorderfuel.fuelStationid,tblorderfuel.Typeoffuel,tblorderfuel.FuelPrice,
tblorderfuel.Quantityoffuel,tblorderfuel.DeliveryAddress,tblorderfuel.ModeofPayment,tblorderfuel.OrderDate,tblorderfuel.Remark,
tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID join tblstate on tblstate.ID=tblorderfuel.Stateid join tblcity on tblcity.ID=tblorderfuel.Cityid
 join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid join tblfuelprice on tblfuelprice.ID=tblorderfuel.Typeoffuel  where tblorderfuel.ID='$eid'";
$query=mysqli_query($con,$sql);
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
html,body{
overflow:auto;
}
table, th, td {
  border: 1px solid blue;
  border-collapse: collapse;
  padding:5px;
background-color:white;
position:relative;
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
<?php
$cnt=1;
if($query->num_rows>0){
foreach($query as $row)
{               ?>
<table border="1">
       
  <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Customer Details : (Order Number: <?php  echo $orderno=($row['ordernum']);?>)</th>
  </tr>
  <tr>
    <th>Full Name</th>
    <td colspan="6"><?php  echo $row['Name'];?></td></tr>
      <tr>
     <th>Mobile Number</th>
    <td colspan="6"><?php  echo $row['MobileNumber'];?></td></tr>
    <tr>
    <th>Email</th>
    <td colspan="6"><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
<th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Fuel Station Details</th>
  </tr>
   <tr>
    <th>Name of Fuel Station</th>
    <td><?php  echo $row['NameoffuelStation'];?></td>
    <th>State of Fuel Station</th>
    <td colspan="4"><?php  echo $row['State'];?></td>
    
  </tr>
  
  <tr>
    <th>City of Fuel Station</th>
    <td><?php  echo $row['City'];?></td>
    <th >Address of Fuel Station</th>
     <td colspan="4"><?php  echo $row['LocationoffuelStation'];?></td>
    
  </tr>
<tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Order Details</th>
  </tr>
  <tr>
    
    <th>Order Received State</th>
    <td><?php  echo $row['State'];?></td>
    <th>Order Received City</th>
    <td><?php  echo $row['City'];?></td>
    <th>Type of Fuel</th>
    <td><?php  echo $row['type'];?></td>
  </tr>
<tr>
    
    <th>Fuel Price</th>
    <td><?php  echo $row['FuelPrice'];?></td>
  </tr>
  <tr>
    
    <th>Quantity of fuel(in ltr)</th>
    <td><?php  echo $row['Quantityoffuel'];?></td>
    <th>Delivery Address</th>
    <td><?php  echo $row['DeliveryAddress'];?></td>

    <th>Mode of Payment</th>
    <td><?php  echo $row['ModeofPayment'];?></td>
  </tr>
  <tr>
<th>Order Final Status</th>
   <td> <?php  $status=$row['Status'];
    
if($row['Status']=="Confirmed")
{
  echo "Your order has been confirmed";
}
if($row['Status']=="On The Way")
{
  echo "Fuel Delivery Boy is on the way";
}
if($row['Status']=="Delivered")
{
 echo "Fuel order has been delivered";
}
if($row['Status']=="Cancelled")
{
 echo "Fuel order has been cancelled";
}

if($row['Status']=="")
{
  echo "Not Response Yet";
}


     ;?></td>
    <th>Admin Remark</th>
    <?php if($row['Status']==""){ ?>

                     <td  colspan="4"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  
  <td colspan="4"><?php  echo $row['Status'];?>
                  </td>
                  <?php } ?>  

  </tr>
<?php 

if ($status=="Delivered"){
?> 
  <table id="datatable" style="border-collapse: collapse; border-spacing: 0; width: 53%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Invoice History</th> 
  </tr>
  <tr>
    <th>#</th>
    <th>Order Quantity(in ltr)</th>
<th>Fuel Price(per ltr)</th>

<th>Total Price</th>


<tr>
  <td><?php echo $cnt;?></td>
  <td><?php  echo $qf=$row['Quantityoffuel'];
?></td>
 <td>$<?php  echo $fp=$row['FuelPrice'];?></td> 
   
   <td>$<?php  echo $gt= $fp*$qf;?></td> 
</tr>
</tr>
<tr><th>
  Grand Total
</th><td colspan="6" style="text-align: center;color: red">$<?php  echo $gt;?></td></tr>

</table><?php }?>
   
  <?php $cnt=$cnt+1;}} ?>
 

  
    
                                            
                                    </table>
                                     <?php 
$oid=$_GET['oid'];
   if($status!=""){
$ret="select tbltracking.Remark,tbltracking.Status,tbltracking.UpdationDate from tbltracking where tbltracking.OrderNumber ='$oid'";
$results=mysqli_query($con,$ret);
$cnt=1;
 ?>
<table id="datatable"  style="border-collapse: collapse; border-spacing: 0; width: 53%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['Remark'];?></td> 
  <td><?php  echo $row['Status'];
?></td> 
   <td><?php  echo $row['UpdationDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<?php  }  
?>
</div>
</body>
</html>
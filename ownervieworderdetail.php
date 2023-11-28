<?php 
$con=mysqli_connect("localhost","root","","fdms");
session_start();
$name=$_SESSION['ownerusername'];
$con=mysqli_connect("localhost","root","","fdms");
if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $oid=$_GET['oid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
    $sql="insert into tbltracking(OrderNumber,Remark,Status) value('$oid','$remark','$status')";
     $result=mysqli_query($con,$sql);
      $sql= "update tblorderfuel set Status='$status',Remark='$remark' where ID='$eid'";
 if(mysqli_query($con,$sql)){
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='allorders.php'</script>";
}
}
  ?>
<html>
<head>
<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function myEvent() {
var modal = document.getElementById("myModal");
modal.style.display = "block";

}
// When the user clicks on <span> (x), close the modal
 function closeEvent() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
}
</script>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-header {
  padding: 2px 16px;
  background-color:violet;
  color: white;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}

/* Modal Footer */
.modal-footer {
  padding: 5px 16px;
  background-color:violet;
  color: white;
}
/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
<a href="neworder.php">NewFuelOrder</a>
<a href="confirmedorder.php">Confirmed Fuel Order</a>
<a href="onthewayorder.php">Delivery Boy On the Way</a>
<a href="deliveredorder.php">Fuel Delivered</a>
<a href="cancelledorder.php">Order Cancelled</a>
<a href="allorders.php">All Fuel Orders</a>
</div>
</div>
<div class="maindiv">
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 >View Order Details</h3>
               
                  <div class="table-responsive pt-3">

                    <?php
                  $eid=$_GET['editid'];
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.ID as orderid,tblstate.ID,tblstate.State,tblcity.ID,tblcity.City,tblcity.Stateid,tblfuelstation.ID,tblfuelstation.OwnerID,tblfuelstation.Stateid,tblfuelstation.Cityid,tblfuelstation.NameoffuelStation,tblfuelstation.LocationoffuelStation,tblfuelprice.ID,tblfuelprice.Typeoffuel as type,tblfuelprice.TodayFuelprice, tblorderfuel.ID,tblorderfuel.ordernum,tblorderfuel.UserID,tblorderfuel.Stateid,tblorderfuel.Cityid,tblorderfuel.fuelStationid,tblorderfuel.Typeoffuel,tblorderfuel.FuelPrice,tblorderfuel.Quantityoffuel,tblorderfuel.DeliveryAddress,tblorderfuel.ModeofPayment,tblorderfuel.OrderDate,tblorderfuel.Remark,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID join tblstate on tblstate.ID=tblorderfuel.Stateid join tblcity on tblcity.ID=tblorderfuel.Cityid join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid join tblfuelprice on tblfuelprice.ID=tblorderfuel.Typeoffuel  where tblorderfuel.ID='$eid'";
$query = mysqli_query($con,$sql);
$results=mysqli_fetch_assoc($query);

$cnt=1;
if($query->num_rows > 0)
{
foreach($query as $row)
{               ?>
                    <table>
       
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
  <td colspan="4"><?php  echo htmlentities($row['Status']);?>
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
$query=mysqli_query($con,$ret);
$cnt=1;
 ?>
<table id="datatable" style="border-collapse: collapse; border-spacing: 0; width: 53%;">
  <tr align="center">
   <th colspan="4" style="color: orange" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($query as $row)
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
          
          <?php 

if ($status=="" || $status=="Confirmed" || $status=="On The Way"){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button  id="myBtn" onclick="myEvent()">Take Action</button></p>  

<?php } ?>
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" >Take Action</h5>
                                                    <button type="button" class="close" onclick="closeEvent()" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">
                                <form method="post" name="submit">
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
    <?php if($status=="") {?>
     <option value="Confirmed" selected="true">Confirmed</option>
     <option value="Cancelled">Cancelled</option>
   <?php }elseif ($status=='Confirmed') { ?>
     <option value="On The Way">On The Way</option>
      <?php }elseif ($status=='On The Way') { ?>
     <option value="Delivered">Delivered</option><?php } ?>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  </form>
</div>
</div>
</div>
</div>       
 </div>
  </div>
 </div>
 </div>
</div>
 </div>      
</div>
</body>
</html>
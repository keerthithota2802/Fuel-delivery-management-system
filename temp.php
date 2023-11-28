<?php
                  $eid=$_GET['editid'];
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.ID as orderid,tblstate.ID,tblstate.State,tblcity.ID,tblcity.City,tblcity.Stateid,tblfuelstation.ID,tblfuelstation.OwnerID,tblfuelstation.Stateid,tblfuelstation.Cityid,tblfuelstation.NameoffuelStation,tblfuelstation.LocationoffuelStation,tblfuelprice.ID,tblfuelprice.Typeoffuel as type,tblfuelprice.TodayFuelprice, tblorderfuel.ID,tblorderfuel.ordernum,tblorderfuel.UserID,tblorderfuel.Stateid,tblorderfuel.Cityid,tblorderfuel.fuelStationid,tblorderfuel.Typeoffuel,tblorderfuel.FuelPrice,tblorderfuel.Dateoffueldelivery,tblorderfuel.Timeoffueldeliver,tblorderfuel.Quantityoffuel,tblorderfuel.DeliveryAddress,tblorderfuel.ModeofPayment,tblorderfuel.OrderDate,tblorderfuel.Remark,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID join tblstate on tblstate.ID=tblorderfuel.Stateid join tblcity on tblcity.ID=tblorderfuel.Cityid join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid join tblfuelprice on tblfuelprice.ID=tblorderfuel.Typeoffuel  where tblorderfuel.ID='$eid'";
$query=mysqli_query($con,$sql);
$cnt=1;
if($query->num_rows > 0)
{
foreach($results as $row)
{               ?>
                    <table class="table table-bordered">
       
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
  <td colspan="4"><?php  echo $row->Status'];?>
                  </td>
                  <?php } ?>  

  </tr>
<?php 

if ($status=="Delivered"){
?> 
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
  <td><?php  echo $qf=$row['Quantityoffuel'];?></td>
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
$ret="select tbltracking.Remark,tbltracking.Status,tbltracking.UpdationDate from tbltracking where tbltracking.OrderNumber =:oid";
$results=mysqli_query($con,$sql);
$cnt=1;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
while($row=mysqli_fetch_assoc($results))

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
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

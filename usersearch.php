<?php 
$con=mysqli_connect("localhost","root","","fdms");
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
.edit{
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
table, th, td {
  border: 1px solid blue;
  border-collapse: collapse;
  padding:12px;
background-color:white;
}
#submit{
background-color:violet;
border:none;
height:40px;
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
$sql="select ID from tbluser where UserName='$name'";
$res=mysqli_query($con,$sql);
$res=mysqli_fetch_assoc($res);
$uid=$res['ID'];
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
&nbsp&nbsp&nbsp<h4>Search by Order No./Mobile No. </h4><br>
<form  method="post">
                                <div class="form-group">
                                   
                                    &nbsp&nbsp&nbsp<input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Order No./Name/Mobile No."></div><br>
                                
                              
                                &nbsp&nbsp&nbsp<button type="submit"  name="search" id="submit">Search</button>
                            </form>
                  <div >
                      <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                    <table border="1">
                      <thead>
                       <tr>
                                               <th>S.No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                        <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr class="table-info">
                           <?php
$sql="SELECT tbluser.Name,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.OrderDate,tblorderfuel.ID as orderid, tblorderfuel.UserID,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID
join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tbluser.ID='$uid' && tblorderfuel.ordernum like '$sdata%' || tbluser.MobileNumber like '$sdata%' || tbluser.Name like '$sdata%'";
$query =mysqli_query($con,$sql);
$cnt=1;
if($query->num_rows> 0)
{
foreach($query as $row)
{               ?>
                         <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row['ordernum']);?></td>
                                        <td><?php  echo htmlentities($row['Name']);?></td>
                                        <td><?php  echo htmlentities($row['MobileNumber']);?></td>
                                        <td><?php  echo htmlentities($row['Email']);?></td>
                                             <?php if($row['Status']==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row['Status']);?>
                  </td>
                  <?php } ?>         
                  <td><?php  echo htmlentities($row['OrderDate']);?></td>
                 
                                        <td><a class="edit" style="text-decoration:none" href="uservieworderdetail.php?editid=<?php echo htmlentities ($row['orderid']);?>&&oid=<?php echo htmlentities ($row['ordernum']);?>">View</a></td>
                        </tr>
                       <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                      </tbody>
                    </table>
                  </div>
                </div>
</div>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","","fdms");
if($con===false){
die("error could not connect");
}
$sql="select * from tblstate";
$result=mysqli_query($con,$sql);
$query="select City from tblcity";
$res=mysqli_query($con,$query);
session_start();
$name=$_SESSION['useruname'];
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
.subdiv{
position:relative;
left:20px;
width:83%;
height:90%;
background-color:white;
color:black;
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
&nbsp&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<a href="orderfuel.php" style="text-decoration:none;color:white;">Order Your Fuel</a><br><br>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-dot-circle-o" style="font-size:24px"></i></span>
<a href="orderstatus.php" style="text-decoration:none;color:white;">View Status</a><br><br>
</div>
<div>
&nbsp&nbsp&nbsp&nbsp<span class="icon"><i class="fa fa-search" style="font-size:24px"></i></span>
<a href="usersearch.php" style="text-decoration:none;color:white;">Search</a><br><br>
</div>
</div>
<div class="maindiv"><br>
<div class="subdiv">
<form action="fuelorderupload.php" method="post">
<div class="fuelorder">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
          <label for="email">State</label>
          <select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option value="">Select State</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['ID'].'>'.$row['State'].'</option>';
               }
            }
          ?> 
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">City</label>
          <select name="city" id="city" class="form-control" onchange="Fetchfs(this.value)" required>
            <option>Select City</option>
          </select>
        </div>
	 <div class="form-group">
          <label for="pwd">Available FuelStation</label>
          <select name="fs" id="fs" class="form-control">
            <option>Select Fuel Station</option>
          </select>
        </div>
<div class="form-group">
<label for="pwd">Choose Fuel Type</label>
<?php
$sql="select * from tblfuelprice";
$result1=mysqli_query($con,$sql);
?>
<select name="tp" class="form-control" id="tp" onchange="Fetchfp(this.value)" required>
<option value="">Choose fuel type</option>
<?php
if ($result->num_rows > 0 ) {
while ($row = $result1->fetch_assoc()) {
echo '<option value='.$row['ID'].'>'.$row['Typeoffuel'].'</option>';
            }
}
          ?> 
          </select>
 <div class="form-group">
          <label for="pwd">Fuel Price</label>
          <select name="fp" id="fp" class="form-control">
            <option>Select Fuel Station</option>
          </select>
        </div>
<div class="form-group">
<label for="pwd">Quantity of Fuel</label>
<input type="text" name="qfl" class="form-control"><br>
<label for="pwd">Address of Delivery</label>
<input type="text" name="address" class="form-control"><br>
<label for="pwd">Payment Mode</label>
<select name="pmd"  class="form-control">
<option value="COD">COD</option>
</select><br>
<center><button class="submit" name="submit" style="background-color:violet;color:white;border:none;">Order</button></center>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
  function FetchCity(id){ 
    $('#city').html('');
    $('#fs').html('<option>Select Fuel Station</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }
function Fetchfs(id){ 
    $('#fs').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { city_id : id},
      success : function(data){
         $('#fs').html(data);
      }

    })
  }
function Fetchfp(id){ 
    $('#fp').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { tp_id : id},
      success : function(data){
         $('#fp').html(data);
      }

    })
  }

</script>
</div>
</body>
</html>
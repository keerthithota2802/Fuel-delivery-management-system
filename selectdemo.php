<html><body>
<?php 
$con=mysqli_connect("localhost","root","","fdms");
$sql="select * from tblstate";
$result=mysqli_query($con,$sql);
?>
<form method="POST" action="">
<select name="state" onchange="this.form.submit()">
  <option>Select an option</option>
  <?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?>
  <option value="<?php echo $rows['State']; ?>"><?php echo $rows['State']; ?></option>
<?php
}
?>
</select>
<select name="city">
<option value="">select city</option>
</select>
<?php
   if(isset($_POST["state"])){
       $state=$_POST["state"];
	$sql="select ID from tblstate where State='$state'";
	$res=mysqli_query($con,$sql);
	$res=mysqli_fetch_assoc($res);
	$id=$res['ID'];
	$sql="select City from tblcity where Stateid='$id'";
	$r=mysqli_query($con,$sql);
echo "<select name='city'>";
echo "<option value='select city'>select City</option>";
	while($rows=mysqli_fetch_assoc($r)) 
{
 echo " <option value=".$rows['City'].">".$rows['City']."</option>";
}
}
echo "</select>";
?>
</form>
</body>
</html>

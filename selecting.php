<html>
<head>
</head>
<body>
<script>
function getCity(val) { 
    //alert(val);
  $.ajax({
type:"POST",
url:"get-city.php",
data:'cityid='+val,
success:function(data){
$("#city").html(data);
}});
}
</script>
<?php
$con=mysqli_connect("localhost","root","","fdms");
$sql="select * from tblstate";
$result=mysqli_query($con,$sql);
?>
&nbsp&nbsp&nbsp&nbsp&nbspState<br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp<select name="stateid" class="state" onchange="getCity(this.value);">
<option>Choose state</option>
<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
			
?> 
<option value="<?php echo $rows['State'];" ?>><?php echo $rows['State']; ?></option>
<?php
}
?>
</select>
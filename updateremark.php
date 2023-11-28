<?php 
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
 echo "<script>window.location.href ='allfuelorders.php'</script>";
}
}
  ?>
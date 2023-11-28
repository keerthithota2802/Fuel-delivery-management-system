<?php
session_start();
unset($_SESSION['ownerusername']);
echo "<script>alert('Account logged out')</script>";
echo "<script>location.href='ownerlogin.php'</script>";
?>
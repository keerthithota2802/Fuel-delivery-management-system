<?php
session_start();
unset($_SESSION['adminusername']);
echo "<script>alert('Account logged out')</script>";
echo "<script>location.href='adminlogin.php'</script>";
?>
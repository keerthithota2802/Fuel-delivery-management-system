<?php
session_start();
unset($_SESSION['useruname']);
echo "<script>alert('Account logged out')</script>";
echo "<script>location.href='userlogin.php'</script>";
?>
<?php
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['full_name']);
  unset($_SESSION['password']);  
  
  echo "<script>alert('Anda Sudah Logout'); window.location = '../index.php'</script>";
?>
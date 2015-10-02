<?php 
session_start();
unset($_SESSION['user_loged_id']);
header("location:index.php");
?>

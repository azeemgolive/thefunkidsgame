<?php
session_start();
if(isset($_POST['submit']))
{
include("dbconnection.php");
$email=  mysql_real_escape_string($_REQUEST['email']);
registerNewUser($email);
$_SESSION['email']=$email;
header("location:signin-address.php");  
}else
{
  header("location:register-user.php");  
}
?>
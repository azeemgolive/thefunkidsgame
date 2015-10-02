<?php
session_start();
if(isset($_POST['submit']))
{
  include("dbconnection.php");
  $fullname=mysql_real_escape_string($_POST['fullname']);
  $email=  mysql_real_escape_string($_POST['email']);
  $password=mysql_real_escape_string(md5($_POST['password']));
  $secretequestion =mysql_real_escape_string($_POST['secretequestion']);
  $secreteanswer=mysql_real_escape_string($_POST['secreteanswer']);
  $verificationcode=generateCode(8);
  addNewAdminUser($fullname,$email,$password,$secretequestion,$secreteanswer,$verificationcode);       
  header("location:kid-admin-user.php");  
}  else {
  header("location:kid-admin-user.php");    
}
<?php
header("Content-Type: application/json");
include("../dbconnection.php");
$name      = mysql_real_escape_string($_POST['name']);
$email     = mysql_real_escape_string($_POST['email']);
$password  = mysql_real_escape_string(md5($_POST['password']));
$phone_number     = mysql_real_escape_string($_POST['phone']);  
$gender    = mysql_real_escape_string($_POST['gender']);
$location  = mysql_real_escape_string($_POST['location']);
$user_name =mysql_real_escape_string($_POST['user_name']);
$android_app  = "android_app"; 
$user_emails=  getUserByEmail($email);
$user=  mysql_fetch_array($user_emails);
if($email==$user['email'])
{
     $status=array('status'=>0,'error'=>'Email already exits');          
     echo json_encode($status);
}
else
{
  $verificationcode=generateCode(1);
  $activation=md5($email.time());  
  $result=registerNewUser($name,$email,$password,$gender,$location,$phone_number,$activation,$verificationcode,$android_app,$user_name);
  $status=array('status'=>1,'success'=>'User successfully added'); 
  echo json_encode($status);
}




?>
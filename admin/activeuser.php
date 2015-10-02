<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $user_id=  mysql_real_escape_string($_REQUEST['user_id']);
    $user_status=mysql_real_escape_string($_REQUEST['status']);
    updateUserStatus($user_id,$user_status);
    header("location:users.php");
}  else {
   header("location:index.php");  
}
?>
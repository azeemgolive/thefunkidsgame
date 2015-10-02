<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $user_id=  mysql_real_escape_string($_REQUEST['user_id']);
    deleteUser($user_id);
    header("location:users.php?delete");
}  else {
   header("location:index.php");  
}
?>
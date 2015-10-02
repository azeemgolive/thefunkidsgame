<?php
session_start();
if(isset($_POST['submit']))
{
  include("dbconnection.php");  
  $topic_name=  mysql_real_escape_string($_POST['thread_name']);
  $topic_description =mysql_real_escape_string($_POST['thread_message']);
  if(isset($_SESSION['user_id']))
  {
   $user_id=$_SESSION['user_id'];
   addNewSubForm($user_id, $topic_name, $topic_description);
   header("location:mom-forum.php");
  }else
  {
      header("location:mom-forum.php?login");
  }   
}
else
{
   header("location:mom-forum.php?error");
}
?>

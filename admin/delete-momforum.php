<?php
session_start();
if(isset($_REQUEST['id']))
{
  include("dbconnection.php");  
  $mom_forum_id=$_REQUEST['id'];
  deleteMomForum($mom_forum_id);
  header("location:momforum.php");  
}  else {
  header("location:momforum.php");  
}
?>

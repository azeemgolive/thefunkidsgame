<?php
session_start();
if(isset($_REQUEST['id']))
{
  include("dbconnection.php");
  $mom_forum_thread_id=  mysql_real_escape_string($_REQUEST['id']);
  deleteMomForumThread($mom_forum_thread_id);
  header("location:mom-forum-threads.php?delete");   
}else
{
    header("location:mom-forum-threads.php"); 
}
?>

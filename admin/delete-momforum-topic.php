<?php
session_start();
if(isset($_REQUEST['id']))
{
  include("dbconnection.php");
  $mom_forum_topic_id=  mysql_real_escape_string($_REQUEST['id']);
  delteMomForumTopic($mom_forum_topic_id);
  header("location:mom-forum-topics.php?delete");   
}else
{
    header("location:mom-forum-topics.php"); 
}
?>

<?php
session_start();
if(isset($_POST['submit']))
{
  include("dbconnection.php");
  $topic_name=  mysql_real_escape_string($_POST['topic_name']);
  $topic_description =mysql_real_escape_string($_POST['topic_description']);
  $user_id=$_SESSION['userId'];
  addNewTopic($user_id, $topic_name, $topic_description);
  header("location:momforum.php?success");
}else
{
    header("location:momforum.php?error");
}
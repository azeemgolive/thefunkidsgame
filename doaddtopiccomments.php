<?php
session_start();
if(isset($_POST['submit']))
{
  include("dbconnection.php");
  $topic_id=  mysql_real_escape_string($_POST['topic_id']);
  $comments =mysql_real_escape_string($_POST['comments']);
  $user_id=$_SESSION['userId'];
  addNewTopicComment($user_id,$topic_id,$comments);
  header("location:momforum.php?success");
}else
{
    header("location:momforum.php?error");
}
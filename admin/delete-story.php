<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $story_id=  mysql_real_escape_string($_REQUEST['id']);
    deleteStory($story_id);
    header("location:stories.php");
}  else {
   header("location:index.php");  
}
?>
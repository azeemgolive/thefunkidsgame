<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $game_id=  mysql_real_escape_string($_REQUEST['id']);
    $game_status=mysql_real_escape_string($_REQUEST['status']);
    updateGameActive($game_id,$game_status);
    header("location:games.php");
}  else {
   header("location:index.php");  
}
?>
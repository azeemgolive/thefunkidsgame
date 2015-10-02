<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $game_id=  mysql_real_escape_string($_REQUEST['game_id']);
    deleteGame($game_id);
    header("location:games.php?delete");
}  else {
   header("location:index.php");  
}
?>
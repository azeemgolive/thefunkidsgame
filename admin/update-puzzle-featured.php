<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $puzzle_id=  mysql_real_escape_string($_REQUEST['id']);
    $puzzle_status=mysql_real_escape_string($_REQUEST['status']);
    updatePuzzleFeatured($puzzle_id,$puzzle_status);
    header("location:puzzles.php");
}  else {
   header("location:index.php");  
}
?>
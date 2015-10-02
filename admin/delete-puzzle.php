<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $puzzle_id=  mysql_real_escape_string($_REQUEST['puzzle_id']);
    deletePuzzle($puzzle_id);
    header("location:puzzles.php?delete");
}  else {
   header("location:index.php");  
}
?>
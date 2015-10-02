<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $rhyme_id=  mysql_real_escape_string($_REQUEST['id']);
    deleteRhyme($rhyme_id);
    header("location:rhymes.php");
}  else {
   header("location:index.php");  
}
?>
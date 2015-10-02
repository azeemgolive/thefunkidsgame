<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $rhyme_id=  mysql_real_escape_string($_REQUEST['id']);
    $rhyme_status=mysql_real_escape_string($_REQUEST['status']);
    updateRhymeFeatured($rhyme_id,$rhyme_status);
    header("location:rhymes.php");
}  else {
   header("location:index.php");  
}
?>
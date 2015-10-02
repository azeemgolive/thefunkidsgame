<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $mom_forum_id=  mysql_real_escape_string($_REQUEST['mom_forum_id']);
    $mom_forum_title=mysql_real_escape_string($_REQUEST['mom_forum_title']);
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    $mom_forum_seo=  str_replace(" ", "-", strtolower($mom_forum_title));   
    updateMomForum($mom_forum_id, $mom_forum_title,$isStrict,rtrim($mom_forum_seo,"-"));
    header("location:momforum.php");
}else {
header("location:momforum.php");    
}
?>
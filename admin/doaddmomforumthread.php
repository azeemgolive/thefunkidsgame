<?php
session_start();
if(isset($_REQUEST['submit']))
{
    include("dbconnection.php");
    $mom_sub_forum_id  =mysql_real_escape_string($_REQUEST['mom_sub_forum_id']);
    $thread_name=  mysql_real_escape_string($_REQUEST['thread_name']);
    $thread_description=  mysql_real_escape_string($_REQUEST['thread_description']);
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    $thread_seo=  str_replace(" ","-", strtolower($thread_name));
    $email="admin@thefunkids.com";
    $adminuser=  getFrontUserByEmail($email);
    $user=  mysql_fetch_array($adminuser);   
    $user_id=$user['user_id'];
    addNewThread($mom_sub_forum_id,$user_id,$thread_name,$isStrict,$thread_description,rtrim($thread_seo,"-"));
    header("location:mom-forum-threads.php?add");   
}  else {
   header("location:mom-forum-threads.php");    
}
?>
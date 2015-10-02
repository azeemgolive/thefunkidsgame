<?php
session_start();
if(isset($_REQUEST['thread_id']))
{
    include("dbconnection.php");
    $thread_id=$_GET['thread_id'];
    $thread_status=$_GET['thread_status'];
    approveThread($thread_id,$thread_status);    
    header("location:mom-forum-threads.php");
}else{
  header("location:mom-forum-threads.php");  
}
   

?>




<?php
session_start();
if(isset($_REQUEST['post_id']))
{
    include("dbconnection.php");
    $post_id=$_GET['post_id'];
    $reply_type=$_GET['reply_type'];
    if($reply_type=='quote')
    {
        $reply_type= "quick reply";
    }  else {
        $reply_type= "reply";        
    }
    $thread_user_id=$_GET['thread_user_id'];
    $post_status =$_GET['post_status'];
    $thread_post_user=  getUserById($thread_user_id);
    $thread_user=  mysql_fetch_array($thread_post_user);
    $post_user=$_GET['post_user_id'];
    $post_user=  getUserById($post_user);
    $user_post=  mysql_fetch_array($post_user);    
    approveThreadPosts($post_id,$post_status);
    $subject="Quick reply to thread";
    $from = "info@thefunskids.com";
    $to = $thread_user['email'];
    $mail_body="Hi ".$thread_user['name']."<br/><br/>".$user_post['name'].",<br/><br/> has post a".$reply_type." to thread  has been posted on your thread on TheFunKids.com<br /><br /></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:raheelaslam@golive.com.pk,amohsin@golive.com.pk,saher@golive.com.pk'."\r\n";           
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);  
    header("location:mom-forum-posts.php");
}else{
  header("location:mom-forum-posts.php");  
}
   

?>




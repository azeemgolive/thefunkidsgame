<?php
session_start();
include("dbconnection.php");
$thread_id=  mysql_real_escape_string($_REQUEST['thread_id']);
$thread_message=mysql_real_escape_string($_REQUEST['thread_message']);
$mom_sub_forum_id=  mysql_real_escape_string($_REQUEST['mom_sub_forum_id']);
$thread_name =mysql_real_escape_string($_REQUEST['thread_name']);
$thread_name_seo=mysql_real_escape_string($_REQUEST['thread_seo']);
if(isset($_SESSION['user_id']))
{
$user_id=$_SESSION['user_id'];
$smallimage = $_FILES['thread_image'];
$thread_image = $smallimage['name'];
if (!$smallimage['error']) 
{
   if (!@move_uploaded_file($smallimage['tmp_name'],"threadsimages/".$smallimage['name']) ) 
   {
	header("location:mom-forum-post_thread.php?id=$sub_forum_id&err=Unknown Error Occured please try again");
	exit();
   }
  else
  {
     $work = new ImgResizer("threadsimages/". $smallimage['name']);
 }
}
addNewQuickThreadReplys($thread_id,$user_id,$thread_name,$thread_message,$mom_sub_forum_id,$thread_image);
    $subject="Quick reply to thread";
    $from = "info@thefunskids.com";
    $to = "raheelaslam@golive.com.pk";
    $mail_body=$_SESSION['name'].",<br/><br/> has post a qucik reply to thread  has been posted on your thread on TheFunKids.com Kindly moderate it <br /><br /></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:amohsin@golive.com.pk,saher@golive.com.pk' . "\r\n";           
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);  
header("location:mom-forum-thread-$thread_name_seo");
}else if(isset($_SESSION['FBID']))
{
    $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
if($user_facebook_id){
$face_book_user=  mysql_fetch_array($user_facebook_id);
$user_id=$face_book_user['user_id'];
}
 $smallimage = $_FILES['thread_image'];
$thread_image = $smallimage['name'];
if (!$smallimage['error']) 
{
   if (!@move_uploaded_file($smallimage['tmp_name'],"threadsimages/".$smallimage['name']) ) 
   {
	header("location:mom-forum-post_thread.php?id=$sub_forum_id&err=Unknown Error Occured please try again");
	exit();
   }
  else
  {
     $work = new ImgResizer("threadsimages/". $smallimage['name']);
 }
}
addNewQuickThreadReplys($thread_id,$user_id,$thread_name,$thread_message,$mom_sub_forum_id,$thread_image);
    $subject="Quick reply to thread";
    $from = "info@thefunskids.com";
    $to = "raheelaslam@golive.com.pk";
    $mail_body=$_SESSION['FULLNAME'].",<br/><br/> has post a qucik reply to thread  has been posted on your thread on TheFunKids.com Kindly moderate it <br /><br /></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:amohsin@golive.com.pk,saher@golive.com.pk' . "\r\n";           
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);  
header("location:mom-forum-thread-$thread_name_seo");   
}
else {
    header("location:login-kid-mom-forum?login");
}
class ImgResizer {
	var $originalFile = '';
	function ImgResizer($originalFile = '') {
		$this -> originalFile = $originalFile;
	}
	function resize($newWidth, $targetFile) {
		if (empty($newWidth) || empty($targetFile)) {
			return false;
		}
		$src = imagecreatefromjpeg($this -> originalFile);
		list($width, $height) = getimagesize($this -> originalFile);
		$newHeight = ($height / $width) * $newWidth;
		$tmp = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		if (file_exists($targetFile)) {
			unlink($targetFile);
		}
		imagejpeg($tmp, $targetFile, 85);
	}
}
?>
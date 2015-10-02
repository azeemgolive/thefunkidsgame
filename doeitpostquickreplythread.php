<?php
session_start();
include("dbconnection.php");
$thread_reply_id=  mysql_real_escape_string($_REQUEST['thread_reply_id']);
$thread_name  =  mysql_real_escape_string($_REQUEST['thread_name']);
$thread_message=mysql_real_escape_string($_REQUEST['thread_message']);
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
updateThreadReplys($thread_reply_id,$thread_name,$thread_message);
header("location:mom-forum");
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
updateThreadReplys($thread_reply_id,$thread_name,$thread_message);
header("location:mom-forum");
}
else {
    header("location:login-kid-mom-forum");
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
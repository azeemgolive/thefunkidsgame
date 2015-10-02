<?php
session_start();
include("dbconnection.php");
$user_id=$_SESSION['user_id'];
$smallimage = $_FILES['user_image'];
    $user_image = $smallimage['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"userimages/".$smallimage['name']) ) 
			{
				header("location:addrhyme.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("userimages/". $smallimage['name']);
	 		}
		}
updateUserImage($user_id,$user_image);
unset($_SESSION['user_image']);
$users=  getUserById($user_id);
$user=  mysql_fetch_array($users);
$_SESSION['user_image']=$user['userimages'];
header("location:mom-forum-user-profile");

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
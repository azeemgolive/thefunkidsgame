<?php
session_start();
if($_POST['submit'])
{
    include("dbconnection.php");
    $game_name =  mysql_real_escape_string($_POST['game_name']);  
    $game_title  =  mysql_real_escape_string($_POST['game_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $smallimage = $_FILES['game_image'];
    $game_image = $smallimage['name'];
	$smallimagefile = $_FILES['game_file'];
    $game_file = $smallimagefile['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../games/game_images/".$smallimage['name']) ) 
			{
				header("location:addgame.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../games/game_images/". $smallimage['name']);
	 		}
		}
		
	$smallimagefileslider = $_FILES['slider_image'];
    $slider_image = $smallimagefileslider['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimagefileslider['tmp_name'],"../games/game_slider/".$smallimagefileslider['name']) ) 
			{
				header("location:addgame.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../games/game_slider/". $smallimagefileslider['name']);
	 		}
		}

	if (!$smallimagefile['error']) 
		{
			if (!@move_uploaded_file($smallimagefile['tmp_name'],"../games/game_files/".$smallimagefile['name']) ) 
			{
				header("location:addgame.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../games/game_slider/". $smallimagefile['name']);
	 		}
		}	
    addNewGame($game_name,$game_image,$game_file,$slider_image,$game_title,$meta_tag_keyword,$meta_tag_description);            
    header("location:games.php");
}  else {
    header("games.php");
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
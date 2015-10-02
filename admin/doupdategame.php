<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $game_id=  mysql_real_escape_string($_REQUEST['game_id']);
    $game_name=  mysql_real_escape_string($_POST['game_name']);
    $game_title  =  mysql_real_escape_string($_POST['game_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 	
    $smallimage = $_FILES['game_image'];
	if ($smallimage['name'] == "")
	$game_image = $_REQUEST['prev_image'];
else
	$game_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../games/game_images/" . $smallimage['name']) ) 
			{
				header("location:edit-game.php?err=Unknown Error Occured please try again&id=$rhyme_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("teachers/". $smallimage['name']);
	 		}
		} 
		
    $smallimageFile = $_FILES['game_file'];
	if (!$smallimageFile['error']) 
		{
			if (!@move_uploaded_file($smallimageFile['tmp_name'],"../games/game_files/" . $smallimageFile['name']) ) 
			{
				header("location:edit-game.php?err=Unknown Error Occured please try again&id=$rhyme_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("teachers/". $smallimageFile['name']);
	 		}
		} 
		
	$smallimagefileslider = $_FILES['slider_image'];
	if ($smallimagefileslider['name'] == "")
	$slider_image = $_REQUEST['prev_image2'];
else	
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

		
    updateGame($game_id,$game_name,$game_image,$game_file,$slider_image,$game_title,$meta_tag_keyword,$meta_tag_description);            
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
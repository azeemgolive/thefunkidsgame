<?php
session_start();
if($_POST['submit'])
{
    include("dbconnection.php");
    $puzzle_name=  mysql_real_escape_string($_POST['puzzle_name']);  
    $puzzle_title  =  mysql_real_escape_string($_POST['puzzle_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $smallimage = $_FILES['puzzle_image'];
    $puzzle_image = $smallimage['name'];
	$smallimagefile = $_FILES['puzzle_file'];
    $puzzle_file = $smallimagefile['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../puzzles/puzzle_images/".$smallimage['name']) ) 
			{
				header("location:addpuzzle.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../puzzles/puzzle_images/". $smallimage['name']);
	 		}
		}
		
	$smallimagefileslider = $_FILES['slider_image'];
    $slider_image = $smallimagefileslider['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimagefileslider['tmp_name'],"../puzzles/puzzle_slider/".$smallimagefileslider['name']) ) 
			{
				header("location:addpuzzle.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../puzzles/puzzle_slider/". $smallimagefileslider['name']);
	 		}
		}

	if (!$smallimagefile['error']) 
		{
			if (!@move_uploaded_file($smallimagefile['tmp_name'],"../puzzles/puzzle_files/".$smallimagefile['name']) ) 
			{
				header("location:addpuzzle.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../puzzles/puzzle_slider/". $smallimagefile['name']);
	 		}
		}	
    addNewPuzzle($puzzle_name,$puzzle_image,$puzzle_file,$slider_image,$puzzle_title,$meta_tag_keyword,$meta_tag_description);            
    header("location:puzzles.php");
}  else {
    header("puzzles.php");
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
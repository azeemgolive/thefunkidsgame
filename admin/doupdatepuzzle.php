<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $puzzle_id=  mysql_real_escape_string($_REQUEST['puzzle_id']);
    $puzzle_name=  mysql_real_escape_string($_POST['puzzle_name']);
    $puzzle_title  =  mysql_real_escape_string($_POST['puzzle_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    
	
    $smallimage = $_FILES['puzzle_image'];
	if ($smallimage['name'] == "")
	$puzzle_image = $_REQUEST['prev_image'];
else
	$puzzle_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../puzzles/puzzle_images/" . $smallimage['name']) ) 
			{
				header("location:edit-puzzle.php?err=Unknown Error Occured please try again&id=$rhyme_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("teachers/". $smallimage['name']);
	 		}
		} 
		
    $smallimageFile = $_FILES['puzzle_file'];
	if (!$smallimageFile['error']) 
		{
			if (!@move_uploaded_file($smallimageFile['tmp_name'],"../puzzles/puzzle_files/" . $smallimageFile['name']) ) 
			{
				header("location:edit-puzzle.php?err=Unknown Error Occured please try again&id=$rhyme_id");
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

		
    updatePuzzle($puzzle_id,$puzzle_name,$puzzle_image,$puzzle_file,$slider_image,$puzzle_title,$meta_tag_keyword,$meta_tag_description);            
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
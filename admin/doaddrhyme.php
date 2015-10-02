<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $rhyme_name=  mysql_real_escape_string($_POST['rhyme_name']);
    $rhyme_code=  mysql_real_escape_string($_POST['rhyme_code']);
    $rhyme_description=  mysql_real_escape_string($_POST['rhyme_description']); 
    $rhyme_title  =  mysql_real_escape_string($_POST['rhyme_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']);     
    $rhyme_seo=  str_replace(" ","-", strtolower($rhyme_name));
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $smallimage = $_FILES['rhyme_image'];
    $rhyme_image = $smallimage['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../rhymes/".$smallimage['name']) ) 
			{
				header("location:addrhyme.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../rhymes/". $smallimage['name']);
	 		}
		}
    $smallimageslider = $_FILES['slider_image'];
    $slider_image = $smallimageslider['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimageslider['tmp_name'],"../rhymes/rhyme_slider/".$smallimageslider['name']) ) 
			{
				header("location:addrhyme.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../rhymes/rhyme_slider/". $smallimageslider['name']);
	 		}
		}            
    addNewRhyme($rhyme_name,$rhyme_code,$rhyme_description,$rhyme_image,$slider_image,$rhyme_title,$meta_tag_keyword,$meta_tag_description,rtrim($rhyme_seo,"-"));            
    header("location:rhymes.php");
}  else {
    header("rhymes.php");
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
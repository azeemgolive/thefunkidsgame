<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $rhyme_id=  mysql_real_escape_string($_REQUEST['rhyme_id']);
    $rhyme_name=  mysql_real_escape_string($_POST['rhyme_name']);
    $rhyme_code=  mysql_real_escape_string($_POST['rhyme_code']);
    $rhyme_description=  mysql_real_escape_string($_POST['rhyme_description']);
    $rhyme_title  =  mysql_real_escape_string($_POST['rhyme_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $rhyme_seo=  str_replace(" ","-", strtolower($rhyme_name));
    $smallimage = $_FILES['rhyme_image'];
	if ($smallimage['name'] == "")
	$rhyme_image = $_REQUEST['prev_image'];
else
	$rhyme_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../rhymes/" . $smallimage['name']) ) 
			{
				header("location:edit-rhyme.php?err=Unknown Error Occured please try again&id=$rhyme_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("teachers/". $smallimage['name']);
	 		}
		} 
    updateRhyme($rhyme_id,$rhyme_name,$rhyme_code,$rhyme_description,$rhyme_image,$rhyme_title,$meta_tag_keyword,$meta_tag_description,rtrim($rhyme_seo,"-"));            
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
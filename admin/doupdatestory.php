<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $story_id=  mysql_real_escape_string($_REQUEST['story_id']);
    $story_name=  mysql_real_escape_string($_POST['story_name']);
    $story_code=  mysql_real_escape_string($_POST['story_code']);
    $story_description=  mysql_real_escape_string($_POST['story_description']); 
    $story_title  =  mysql_real_escape_string($_POST['story_title']); 
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $story_seo=  str_replace(" ","-", strtolower($story_name));
    $smallimage = $_FILES['story_image'];
	if ($smallimage['name'] == "")
	$story_image = $_REQUEST['prev_image'];
else
	$story_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../stories/story_images/" . $smallimage['name']) ) 
			{
				header("location:edit-story.php?err=Unknown Error Occured please try again&id=$story_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("teachers/". $smallimage['name']);
	 		}
		} 
    updateStory($story_id,$story_name,$story_code,$story_description,$story_image,$story_title,$meta_tag_keyword,$meta_tag_description,rtrim($story_seo,"-"));            
    header("location:stories.php");
}  else {
    header("stories.php");
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
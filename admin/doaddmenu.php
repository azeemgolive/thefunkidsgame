<?php
session_start();
if($_POST['sumbit'])
{
    include("dbconnection.php");
    $menuname=  mysql_real_escape_string($_POST['menuname']);
    $menulink=  mysql_real_escape_string($_POST['menulink']);   
    $smallimage = $_FILES['menuimage'];
    $menuimage = $smallimage['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../headerimages/".$smallimage['name']) ) 
			{
				header("location:addtopmenu.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../headerimages/". $smallimage['name']);
	 		}
		}
    addNewTopMenu($menuname,$rhyme_code,$menulink,$menuimage);            
    header("location:topmenus.php");
}  else {
    header("topmenus.php");
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
<?php
session_start();
 $mom_forum_topic_id=  $_REQUEST['mom_forum_topic_id'];
if(isset($_POST['submit']))
{
    include("dbconnection.php");   
    $mom_forum_id=mysql_real_escape_string($_REQUEST['mom_forum_id']);
    $mom_sub_forum_title=mysql_real_escape_string($_REQUEST['mom_sub_forum_title']);
    $momforum_seo= str_replace(" ","-", strtolower($mom_sub_forum_title));    
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    
    $smallimage = $_FILES['subforum_simlies'];
	if ($smallimage['name'] == "")
	$game_image = $_REQUEST['prev_image'];
else
	$game_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../subforum_smilies/" . $smallimage['name']) ) 
			{
				header("location:mom-forum-topics.php?err=Unknown Error Occured please try again&id=$rhyme_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../subforum_smilies/". $smallimage['name']);
	 		}
		} 
                
    $sub_forum_title="Mom Forum - ".$mom_sub_forum_title." | The Fun Kids";
    updateMomForunTopic($mom_forum_topic_id,$mom_forum_id,$mom_sub_forum_title,$isStrict,rtrim($momforum_seo,"-"),$sub_forum_title,$game_image);   
    header("location:mom-forum-topics.php?update"); 
}  else {
header("location:edit-mom-forum-topic.php?id=$mom_forum_topic_id");    
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
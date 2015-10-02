<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $mom_forum_id = mysql_real_escape_string($_REQUEST['mom_forum_id']);
    $mom_sub_forum_title = mysql_real_escape_string($_REQUEST['mom_sub_forum_title']);
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    $smallimage = $_FILES['subforum_simlies'];
    $game_image = $smallimage['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../subforum_smilies/".$smallimage['name']) ) 
			{
				header("location:mom-forum-topics.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../subforum_smilies/". $smallimage['name']);
	 		}
		}
                
    $mom_forum_seo=  str_replace(" ","-", strtolower($mom_sub_forum_title));
    $sub_forum_title="Mom Forum - ".$mom_sub_forum_title." | The Fun Kids";
    addNewMomForumTopic($mom_forum_id, $mom_sub_forum_title,$isStrict,rtrim($mom_forum_seo,"-"),$sub_forum_title,$game_image);
    header("location:mom-forum-topics.php");
}else
{
   header("location:mom-forum-topics.php");
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
<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $mom_forum_id = mysql_real_escape_string($_REQUEST['mom_forum_id']);
    $mom_sub_forum_title = mysql_real_escape_string($_REQUEST['mom_sub_forum_title']);
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    $smallimage = $_FILES['subforum_simlies'];
    $game_image = $smallimage['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../subforum_smilies/".$smallimage['name']) ) 
			{
				header("location:mom-forum-topics.php?err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../subforum_smilies/". $smallimage['name']);
	 		}
		}
                
    $mom_forum_seo=  str_replace(" ","-", strtolower($mom_sub_forum_title));
    $sub_forum_title="Mom Forum - ".$mom_sub_forum_title." | The Fun Kids";
    addNewMomForumTopic($mom_forum_id, $mom_sub_forum_title,$isStrict,rtrim($mom_forum_seo,"-"),$sub_forum_title,$game_image);
    header("location:mom-forum-topics.php");
}else
{
   header("location:mom-forum-topics.php");
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

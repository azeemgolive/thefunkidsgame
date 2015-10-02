<?php
session_start();
if($_POST['submit'])
{
    include("dbconnection.php");
    $product_id=  mysql_real_escape_string($_REQUEST['product_id']);
    $product_name=  mysql_real_escape_string($_POST['product_name']);
    $product_description=  mysql_real_escape_string($_POST['product_description']);
    $product_meta_tag_title =  mysql_real_escape_string($_POST['product_title']);  
    $meta_tag_keyword  =  mysql_real_escape_string($_POST['meta_tag_keyword']); 
    $meta_tag_description  =  mysql_real_escape_string($_POST['meta_tag_description']); 
    $product_seo=  str_replace(" ","-", strtolower($product_name));
    $smallimage = $_FILES['product_image'];
	if ($smallimage['name'] == "")
	$product_image = $_REQUEST['prev_image'];
else
	$product_image = $smallimage['name'];
	if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../products/product_images/" . $smallimage['name']) ) 
			{
				header("location:edit-product.php?err=Unknown Error Occured please try again&id=$product_id");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../products/product_images/". $smallimage['name']);
	 		}
		} 
    updateProduct($product_id,$product_name,$product_description,$meta_tag_keyword,$product_image,$meta_tag_description,$product_meta_tag_title,rtrim($product_seo,"-"));            
    header("location:products.php");
}  else {
    header("location:edit-product.php?err=Unknown Error Occured please try again&id=$product_id");
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
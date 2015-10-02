<?php
session_start();
include("dbconnection.php");
    $product_id           = mysql_real_escape_string($_REQUEST['product_id']);
    $product_color_name   =  mysql_real_escape_string($_REQUEST['product_color_name']);       
    $product_display      = mysql_real_escape_string($_REQUEST['product_display']);    
    $smallimage           = $_FILES['product_color_image'];
    $product_color_image  = $smallimage['name'];
    $smallimages          = $_FILES['product_color_display_image'];
    $product_color_display_image    = $smallimages['name'];
    if (!$smallimage['error']) 
		{
			if (!@move_uploaded_file($smallimage['tmp_name'],"../products/product_color/".$smallimage['name']) ) 
			{
				header("location:add-new-product-color.php?product_id=$product_id&err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../products/product_color/". $smallimage['name']);
	 		}
		} 
    if (!$smallimages['error']) 
		{
			if (!@move_uploaded_file($smallimages['tmp_name'],"../products/product_color/".$smallimages['name']) ) 
			{
				header("location:add-new-product-color.php?product_id=$product_id&err=Unknown Error Occured please try again");
				exit();
			}
			else
			{
                            $work = new ImgResizer("../products/product_color/". $smallimages['name']);
	 		}
		}
addNewProductColor($product_id,$product_color_name,$product_color_image,$product_color_display_image);                
if($product_display=='yes')    
{    
    updateProductColor($product_id,$product_color_display_image);
}

header("location:view-product-detail.php?id=$product_id");
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
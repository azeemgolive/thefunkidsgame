<?php
  session_start();
  if(isset($_POST['submit']))
  {
    include("dbconnection.php");
    $clothing_type_id     =  mysql_real_escape_string($_REQUEST['clothing_type_id']);
    $size_id              =  mysql_real_escape_string($_REQUEST['size_id']);
    $color_id             =  mysql_real_escape_string($_REQUEST['color_id']);   
    $product_name         =  mysql_real_escape_string($_REQUEST['product_name']);
    $product_description  =  mysql_real_escape_string($_REQUEST['product_description']);
    $product_title        =  mysql_real_escape_string($_REQUEST['product_title']);
    $product_price        =  mysql_real_escape_string($_REQUEST['product_price']);
    $product_gender       =  mysql_real_escape_string($_REQUEST['product_gender']);   
    $meta_tag_keyword     =  mysql_real_escape_string($_REQUEST['meta_tag_keyword']);
    $meta_tag_description =  mysql_real_escape_string($_REQUEST['meta_tag_description']);
    $product_seo          =  str_replace(" ","-", strtolower($product_name));    
    addNewProduct($clothing_type_id,$size_id,$color_id,$product_name,$product_price,$product_gender,$product_description,$product_title,$meta_tag_keyword,$meta_tag_description,rtrim($product_seo,"-"));            
    header("location:products.php?success");         
  }else
  {
    header("location:add-new-product.php");
  } 
  
 
?>
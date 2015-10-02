<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//------------------------Variable for Server name,Database,User name,Password--------------------------------
    $adb ="tfkids_fun";
    $db_server ="localhost";
    $db_user = "tfkids_fungame";
    $db_password = "]#4[ZI1Gipe6";
 $link_db=mysql_connect($db_server,$db_user,$db_password);
 if(!$link_db) {
        die('Failed to connect to server: ' . mysql_error());
    }
 $db=mysql_select_db($adb,$link_db);    
    if(!$db) {
        die('Unable to select database:'.mysql_error());
    }
    
//-------------------------------sql injection and remove space and slashes---------------------------------------
function clean($str){
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
  
//--------------------------------Admin login--------------------------------------------------------------------
function adminLogin($email,$password)
{
    $query="select user_id,email,password,fullname,secretequestion,secreteanswer,verificationcode,createdAt,updateAt,userRole,isactive,description from kidclothes_admin where email='$email' and password='$password'";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}


//-------------------------get All Clothing Type----------------------------------------------------------------
function getAllClothingTypes()
{
    $query="select clothing_type_id,Clothing_type_name,clothing_type_gender,createdAt,updatedAt,isActive,clothing_seo_name,clothing_type_title,meta_keywords,meta_description from funkids_clothingtype";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}

//-------------------------get All Clothing Type----------------------------------------------------------------
function getAllClothingTypeById($clothing_type_id)
{
    $query="select clothing_type_id,Clothing_type_name,clothing_type_gender,createdAt,updatedAt,isActive,clothing_seo_name,clothing_type_title,meta_keywords,meta_description from funkids_clothingtype where clothing_type_id=$clothing_type_id";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}
//----------------------------------add new Clothing Type----------------------------------------------------
function addNewClothingType($Clothing_type_name,$clothing_type_gender,$clothing_seo_name,$clothing_type_title,$meta_keywords,$meta_description)
{
  $createdAt=  date("Y-m-d");
  $updatedAt=  date("Y-m-d");
  $query="insert into funkids_clothingtype(Clothing_type_name,clothing_type_gender,clothing_seo_name,createdAt,updatedAt,isActive,clothing_type_title,meta_keywords,meta_description) values ('$Clothing_type_name','$clothing_type_gender','$clothing_seo_name','$createdAt','$updatedAt','no','$clothing_type_title','$meta_keywords','$meta_description')";
  mysql_query($query) or die(mysql_error());  
}

//----------------------------------add new Clothing Type----------------------------------------------------
function updateClothingType($clothing_type_id,$Clothing_type_name,$clothing_type_gender,$clothing_seo_name,$clothing_type_title,$meta_keywords,$meta_description)
{
  $updatedAt=  date("Y-m-d");
  $query="update funkids_clothingtype set Clothing_type_name='$Clothing_type_name',clothing_type_gender='$clothing_type_gender',updatedAt='$updatedAt',clothing_seo_name='$clothing_seo_name',clothing_type_title='$clothing_type_title',meta_keywords='$meta_keywords',meta_description='$meta_description' where clothing_type_id=$clothing_type_id";
  mysql_query($query) or die(mysql_error());  
}

//--------------------------------delete clothing types----------------------------------------------------
function deleteClothingType($clothing_type_id)
{
  $query="delete from funkids_clothingtype where clothing_type_id=$clothing_type_id";   
   mysql_query($query) or die(mysql_error());
}

//---------------------------------------update clothing type status-----------------------------------------
function updateClothingTypeStatus($clothing_type_id,$clothing_type_stauts)
{
    $updatedAt=  date("Y-m-d");
   if($clothing_type_stauts=='yes')
   {
     $query="update funkids_clothingtype set isActive='no',updatedAt='$updatedAt' where clothing_type_id=$clothing_type_id";  
     mysql_query($query) or die(mysql_error());
   }
   if($clothing_type_stauts=='no')
   {
     $query="update funkids_clothingtype set isActive='yes',updatedAt='$updatedAt' where clothing_type_id=$clothing_type_id";   
     mysql_query($query) or die(mysql_error());
   }
}


//----------------------------get All Products---------------------------------------------------------------
function getAllProducts()
{
    $query="select product_id, product_name,product_image,product_price,product_gender,product_description,createdAt,updatedAt,isActive,isFeatured,isFeatured,product_meta_keywords,product_meta_description,product_meta_tag_title from funkids_products";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}

//-------------------------------add new Product ---------------------------------------------------------
function addNewProduct($product_name,$product_price,$product_description,$product_gender,$product_title,$product_image,$meta_tag_keyword,$meta_tag_description,$product_seo)
{
    $createdAt=  date("Y-m-d");
    $updatedAt=  date("Y-m-d");
    $query="insert into funkids_products (product_name,product_price,product_gender,product_image,product_description,createdAt,updatedAt,isActive,isFeatured,product_seo,product_meta_keywords,product_meta_description,product_meta_tag_title) values('$product_name','$product_price','$product_gender',$product_image','$product_description','$createdAt','$updatedAt','no','no','$product_seo','$meta_tag_keyword','$meta_tag_description','$product_title')";
    mysql_query($query) or die(mysql_error());    
}

//---------------------------update product status-------------------------------------------------------------
function updateProductActive($product_id,$product_status)
{
    $updatedAt=  date("Y-m-d");
   if($product_status=='yes')
   {
     $query="update funkids_products set isActive='no',updatedAt='$updatedAt' where product_id=$product_id";  
     mysql_query($query) or die(mysql_error());
   }
   if($product_status=='no')
   {
     $query="update funkids_products set isActive='yes',updatedAt='$updatedAt' where product_id=$product_id";   
     mysql_query($query) or die(mysql_error());
   }
}

//---------------------------update product is featured-------------------------------------------------------------
function updateProductFeatured($product_id,$product_status)
{
    $updatedAt=  date("Y-m-d");
   if($product_status=='yes')
   {
     $query="update funkids_products set isFeatured='no',updatedAt='$updatedAt' where product_id=$product_id";  
     mysql_query($query) or die(mysql_error());
   }
   if($product_status=='no')
   {
     $query="update funkids_products set isFeatured='yes',updatedAt='$updatedAt' where product_id=$product_id";   
     mysql_query($query) or die(mysql_error());
   }
}

//--------------------------------get Product by Id---------------------------------------------------
function getProductById($product_id)
{
    $query="select product_id, product_name,product_price,product_gender,product_image,product_description,createdAt,updatedAt,isActive,isFeatured,product_seo,product_meta_keywords,product_meta_description,product_meta_tag_title from funkids_products where product_id=$product_id";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}

function updateProduct($product_id,$product_name,$product_price,$product_gender,$product_description,$meta_tag_keyword,$product_image,$meta_tag_description,$product_meta_tag_title,$product_seo)
{
    $updatedAt=  date("Y-m-d");
    $query="update funkids_products set product_name='$product_name',product_price='$product_price',product_gender='$product_gender',product_image='$product_image',product_description='$product_description',updatedAt='$updatedAt',product_meta_keywords='$meta_tag_keyword',product_meta_description='$meta_tag_description',product_seo='$product_seo',product_meta_tag_title='$product_meta_tag_title' where product_id=$product_id";
    mysql_query($query) or die(mysql_error());    
}
//--------------------------------delete product-------------------------------------------------------
function deleteProduct($id)
{
    $query="delete from funkids_products where product_id=$id";
    mysql_query($query) or die(mysql_error());
}

?>
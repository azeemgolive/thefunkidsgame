<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//------------------------Variable for Server name,Database,User name,Password--------------------------------
    $adb ="tfkids_clothes";
    $db_server ="localhost";
    $db_user = "tfkids_clothesu";
    $db_password = "DipoHfm(-2r.";
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

//-----------------------------------get Featured Products----------------------------------------------------
function getAllFeaturedProducts()
{
    $query="select product_id,product_name,product_price,product_image,product_description,isFeatured,product_seo from funkids_products where isFeatured='yes'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-----------------------------------get Featured Products----------------------------------------------------
function getAllLatestProducts()
{
    $query="select product_id,product_name,product_price,product_image,product_description,isFeatured,product_seo from funkids_products order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
function getWords($text, $limit)
{
$array = explode(" ", $text, $limit+1);
if (count($array) > $limit)
{
unset($array[$limit]);
}
return implode(" ", $array);
}
//-----------------------------get Female products---------------------------------------------------------------
function getProductsByGender($gender)
{
    $query="select product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where product_gender='$gender' order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//--------------------------get All clothing Types-------------------------------------------------------

//-------------------------get All Clothing Type----------------------------------------------------------------
function getAllClothingTypes()
{
    $query="select clothing_type_id,Clothing_type_name,clothing_type_gender,createdAt,updatedAt,isActive,clothing_seo_name,clothing_type_title,meta_keywords,meta_description from funkids_clothingtype";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}
//--------------------------get all product sizes-------------------------------------------------------------
function getAllProductsSizes()
{
    $query="select size_id,size_name,createdAt,updatedAt from prodcut_size";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}
//----------------------------count products by product size------------------------------------------------
function countProductByProductSize($product_size)
{
   $query="select COUNT(product_id) FROM funkids_products where size_id=$product_size";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}
//------------------------------get All Products by colors---------------------------------------------------
function getAllProductColors()
{
    $query="select color_id,color_name,createdAt,updatedAt from products_colors";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}
//----------------------------get All Prouct by COlors----------------------------------------------------
function countProductByProductColor($product_size)
{
   $query="select COUNT(product_id) FROM funkids_products where color_id=$product_size";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//-------------------------get Product by Size and gender---------------------------------------------------

function getProductsBySizeGender($product_size_id,$gender)
{
  $query="select product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where size_id =$product_size_id and product_gender='$gender' order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
}

//-------------------------get prodcut by color and gender--------------------------------------------------
function getProductsByColorGender($product_size_id,$gender)
{
  $query="select product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where color_id =$product_size_id and product_gender='$gender' order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
}
function getProductsByClothingTypeGender($clothing_type_id,$gender)
{
    $query="select product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where clothing_type_id =$clothing_type_id and product_gender='$gender' order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
}
//-----------------------------get products by price-------------------------------------------------------------------
function getProductsByPrice($price_from,$price_to)
{
    $query="select product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where product_price > $price_from AND product_price<=$price_to order by product_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;      
}
//---------------------------get product by Id--------------------------------------------------------------------------
function getProductById($product_id)
{
    $query="select clothing_type_id,product_id,product_name,product_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where product_id=$product_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;     
}
//----------------------------get product color by product id----------------------------------------------------------
function getProductColorByProduct($product_id)
{
    $query="select product_id,product_color_id,color_name,product_color_image,product_color_display_image from product_color where product_id=$product_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}

//----------------------------get product Size by product id----------------------------------------------------------
function getProductSizeByProduct($product_id)
{
    $query="select product_id,product_size_id,size_name from product_sizes where product_id=$product_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}

//-----------------------------get products by clothing type---------------------------------------------------------
function getProductsbyCatogery($clothing_type_id)
{
    $query="select clothing_type_id,product_id,product_name,product_price,product_old_price,product_gender,product_image,product_description,isFeatured,product_seo from funkids_products where clothing_type_id=$clothing_type_id order by RAND() limit 0,5";
    $result=  mysql_query($query) or die(mysql_error());
    return $result; 
}

//------------------------register New User------------------------------------------------------
function registerNewUser($email)
{
  $createdAt=  date("Y-m-d");
  $updatedAt=  date("Y-m-d");
  $query="insert into cl_users (email,createdAt,updatedAt) values ('$email','$createdAt','$updatedAt')";
  mysql_query($query) or die(mysql_error());    
}
//--------------------------------get user by email----------------------------------------------
function getUserByEmail($email)
{
   $query="select user_id,firstname,lastname,email,gender,password,mobilenumber,phonenumber,address,city,province from cl_users where  email='$email'";
   $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}
//---------------------------------------update user address-----------------------------------------
function updateUserAddress($user_id,$first_name,$last_name,$gender,$moblie_number,$otherphonenumber,$address,$province_name,$city_name,$password)
{
    $updatedAt=  date("Y-m-d");
    $query="update cl_users set firstname='$first_name',lastname='$last_name',gender='$gender',mobilenumber='$moblie_number',phonenumber='$otherphonenumber',address='$address',province='$province_name',city='$city_name',password='$password',updatedAt='$updatedAt' where user_id=$user_id";
    mysql_query($query) or die(mysql_error());    
}
//-------------------------------------user login----------------------------------------------------
//-------------------------------------user login----------------------------------------------------

 function  Userlogin($email,$password)
 {  
    $query="select user_id,firstname,lastname,email,gender,password,mobilenumber,phonenumber,address,city,province from cl_users where email='$email' AND  password='$password'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
 }
 //-------------------------------get user by ID------------------------------------------------------------------
 function getUserById($user_id) 
 {
     $query="select user_id,firstname,lastname,email,gender,password,mobilenumber,phonenumber,address,city,province from cl_users where user_id=$user_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
 }
 
 //---------------------------------get All Provinces--------------------------------------------------------------
 function getAllProvinces()
 {
     $query="select province_id,province_name from provinces";
     $result=  mysql_query($query) or die(mysql_error());
     return $result;
 }
 //--------------------------get All Cities---------------------------------------------------------------------
 function getAllCities()
 {
     $query="select province_id,city_id,city_name from cities";
     $result=  mysql_query($query) or die(mysql_error());
     return $result;
 }
 
 function getLastAddedOrder()
 {
     $query="SELECT order_id,order_number FROM product_orders ORDER BY order_id DESC LIMIT 1";
     $result=  mysql_query($query) or die(mysql_error());
     return $result;
 }
function addNewOrder($user_id,$order_number)
{
   $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d");
   $query="insert into product_orders(user_id,order_number,createdAt,updatedAt) values($user_id,$order_number,'$createdAt','$updatedAt')";
   mysql_query($query) or die(mysql_error());    
}
//------------------------------add new customer order---------------------------------------------------
function addNewCustomerOder($order_id,$product_id,$product_qty,$product_price)
{
    $createdAt=  date("Y-m-d");
    $updatedAt=  date("Y-m-d");
   $query="insert into customer_orders (order_id,product_id,product_quantity,product_price,createdAt,updatedAt,isdelievered) values ($order_id,$product_id,$product_qty,$product_price,'$createdAt','$updatedAt','no')";
    mysql_query($query) or die(mysql_error());
}
//---------------------------get order by user-----------------------------------------------------------------
function getOrderByUser($user_id)
{
  $query="SELECT user_id,order_id,order_number,createdAt,updatedAt FROM product_orders where user_id=$user_id  ORDER BY order_id DESC LIMIT 1";
     $result=  mysql_query($query) or die(mysql_error());
     return $result;  
}
?>
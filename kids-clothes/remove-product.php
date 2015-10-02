<?php
session_start();
include("dbconnection.php");
$product_id=  mysql_real_escape_string($_REQUEST['product_id']);
unset($_SESSION["cart_products"][$product_id]);
if(isset($_SESSION["cart_products"]))
{
 header("location:shoppingcart.php");
}else
{
    header("location:index.php");
}
?>
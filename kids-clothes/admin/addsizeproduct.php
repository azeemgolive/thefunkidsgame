<?php
session_start();
include("dbconnection.php");
$product_size_name  = mysql_real_escape_string($_REQUEST['product_size_name']);
addNewSizeProduct($product_size_name);
header("location:product-sizes.php");

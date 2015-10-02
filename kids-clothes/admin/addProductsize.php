<?php
session_start();
include("dbconnection.php");
$product_id  =  mysql_real_escape_string($_REQUEST['product_id']);
$product_size_name  =  mysql_real_escape_string($_REQUEST['product_size_name']);
addNewProductSize($product_id,$product_size_name);
header("location:view-product-detail.php?id=$product_id");

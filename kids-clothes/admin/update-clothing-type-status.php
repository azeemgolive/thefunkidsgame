<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
    $product_id=  mysql_real_escape_string($_REQUEST['id']);
    $product_status=mysql_real_escape_string($_REQUEST['status']);
    updateClothingTypeStatus($product_id,$product_status);
    header("location:clothes-type.php");
}  else {
   header("location:index.php");  
}
?>
<?php
session_start();
include("dbconnection.php");
$color_name  = mysql_real_escape_string($_REQUEST['color_name']);
addNewColor($color_name);
header("location:product-colors.php");
?>

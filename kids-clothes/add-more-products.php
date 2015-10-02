<?php
session_start();
unset($_SESSION["cart_products"]);
header("location:index.php");
?>
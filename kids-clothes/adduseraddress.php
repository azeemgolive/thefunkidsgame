<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $user_id =  mysql_real_escape_string($_REQUEST['user_id']);
    $first_name   =  mysql_real_escape_string($_REQUEST['first_name']);
    $last_name    =  mysql_real_escape_string($_REQUEST['last_name']);
    $gender   =  mysql_real_escape_string($_REQUEST['gender']);
    $moblie_number  =  mysql_real_escape_string($_REQUEST['moblie_number']);
    $otherphonenumber   =  mysql_real_escape_string($_REQUEST['otherphonenumber']);
    $address   =  mysql_real_escape_string($_REQUEST['address']);
    $province_name   =  mysql_real_escape_string($_REQUEST['province_name']);
    $city_name   =  mysql_real_escape_string($_REQUEST['city_name']);
    $password  =  mysql_real_escape_string(md5($_REQUEST['password']));
    updateUserAddress($user_id,$first_name,$last_name,$gender,$moblie_number,$otherphonenumber,$address,$province_name,$city_name,$password);
     header("location:index.php");
}else
{
    header("location:register-user.php");
}


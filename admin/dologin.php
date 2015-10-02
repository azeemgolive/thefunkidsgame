<?php
session_start();
include("dbconnection.php");
$email  = clean($_REQUEST['email']);
$password = clean(md5($_REQUEST['password']));
$result = adminLogin($email,$password);
$row=  mysql_fetch_array($result);
            $loginuser = $row['email'];
            $loginpassword = $row['password'];
            $adminfullname = $row['fullname']; 
            $userId = $row['user_id'];
        if(($loginuser==$email and $loginpassword==$password))
          {
	    $_SESSION['email']=$loginuser;
            $_SESSION['password']=$loginpassword;
            $_SESSION['fullname']=$adminfullname;
            $_SESSION['user_id']=$userId;
            if($_SESSION['fullname']=='Administrator')
            {
              header("location:dashboard.php");
            }else
            {
              header("location:momforum.php");
            }
            if(isset($_REQUEST['rememberme']))
	     {
	       header("location:dashboard.php");
               setcookie("email", $_SESSION['email'], time()+60*60*24*100, "/");
               setcookie("password", $_REQUEST['password'], time()+60*60*24*100, "/");   
               setcookie($_COOKIE['email'],  $_COOKIE['password'], $expire); 			
             }
          }else
          {
            header("location:index.php?msg");
          }

?>


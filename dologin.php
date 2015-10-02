<?php
session_start();
include("dbconnection.php");
$email  = clean($_REQUEST['email']);
$password = clean(md5($_REQUEST['password']));
$result = userLogin($email,$password);
$row=mysql_fetch_array($result);        
            $loginuser = $row['email'];
            $loginpassword = $row['password'];
            $fullname = $row['name']; 
            $userId = $row['user_id'];
            $user_image = $row['userimages'];     
            $user_name = $row['user_name'];  
        if(($loginuser==$email and $loginpassword==$password))
          {
	    $_SESSION['name']=$fullname;
            $_SESSION['email']=$loginuser;
            $_SESSION['password']=$loginpassword;
            $_SESSION['fullname']=$fullname;
            $_SESSION['user_id']=$userId;            
            $_SESSION['user_image']=$user_image;
            $_SESSION['user_name']=$user_name;
             header("location:mom-forum-user-profile");
            if(isset($_REQUEST['rememberme']))
	    {
	      header("location:mom-forum-user-profile");      					
              setcookie("email", $_SESSION['email'], time()+60*60*24*100, "/");
              setcookie("password", $_REQUEST['password'], time()+60*60*24*100, "/");   
              setcookie($_COOKIE['email'],  $_COOKIE['password'], $expire); 			
            }
       }else if(($user_name==$email and $loginpassword==$password))
       {
            $_SESSION['name']=$fullname;
            $_SESSION['email']=$loginuser;
            $_SESSION['password']=$loginpassword;
            $_SESSION['fullname']=$fullname;
            $_SESSION['user_id']=$userId;            
            $_SESSION['user_image']=$user_image;
            $_SESSION['user_name']=$user_name;
             header("location:mom-forum-user-profile");
            if(isset($_REQUEST['rememberme']))
	    {
	      header("location:mom-forum-user-profile");      					
              setcookie("email", $_SESSION['email'], time()+60*60*24*100, "/");
              setcookie("password", $_REQUEST['password'], time()+60*60*24*100, "/");   
              setcookie($_COOKIE['email'],  $_COOKIE['password'], $expire); 			
            }
       }else
          {
            header("location:login-kid-mom-forum?msg");
          }

    

/*

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

?>


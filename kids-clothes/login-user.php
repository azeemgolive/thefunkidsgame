<?php
session_start();
    include("dbconnection.php");
    $email=  clean($_REQUEST['user_email']);
    $password=  clean(md5($_REQUEST['password']));
    $result=  Userlogin($email,$password);  
    $row=mysql_fetch_array($result);        
            $loginuser = $row['email'];
            $loginpassword = $row['password'];
            $fullname = $row['firstname']." ".$row['lastname']; 
            $userId = $row['user_id'];            
        if(($loginuser==$email and $loginpassword==$password))
          {
	    $_SESSION['email']=$loginuser;
            $_SESSION['loged_password']=$loginpassword;
            $_SESSION['loged_fullname']=$fullname;
            $_SESSION['user_loged_id']=$userId;                     
            header("location:index.php");       
          }          
         else
          {
            header("location:register-user.php?msg");
          }    


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

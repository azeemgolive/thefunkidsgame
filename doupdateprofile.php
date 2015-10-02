<?php
session_start();
if($_POST['submit'])
{
    include("dbconnection.php");  
    $name  = mysql_real_escape_string($_POST['name']);
    $user_name = mysql_real_escape_string($_POST['user_name']);
    $email  = mysql_real_escape_string($_POST['email']);    
    if(isset($_POST['gender']))
    {
     $gender  = mysql_real_escape_string($_POST['gender']);
    }else
    {
      $gender="male";
    }
     $mobile_number  = mysql_real_escape_string($_POST['mobile_number']);      
     if($_POST['location']=='other')
     {
        $location  = mysql_real_escape_string($_POST['user_location']);   
     }else
     {
         $location  = mysql_real_escape_string($_POST['location']);    
     }     
     $totalkids   =mysql_real_escape_string($_POST['totalkids']);
     $month_name=mysql_real_escape_string($_POST['month_name']);
     $day_name=mysql_real_escape_string($_POST['day_name']);
     $year_name=mysql_real_escape_string($_POST['year_name']);
     $birth_date=$year_name."-".$month_name."-".$day_name;
     $post_date=-$month_name."/".$day_name."/".$year_name;
     //$birthDate = "12/17/1983";
  //explode the date to get month, day and year
  $birthDate = explode("/", $post_date);
  //get age from date or birthdate
    $kidsage = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));    
     $user_interest  = "";
     $user_id=$_SESSION['user_id'];    
   $result=  getUserByUserName($user_name);
   $checkUser=  mysql_fetch_array($result);
   if($checkUser && $user_id!=$checkUser['user_id'])
   {
       header("location:mom-forum-user-profile?error"); 
   }else
   {
    updateUser($user_id,$name,$email,$gender,$mobile_number,$user_interest,$location,$totalkids,$kidsage,$user_name,$birth_date);
    header("location:mom-forum-user-profile");    
   }
}else {
    header("location:mom-forum-user-profile");
}

?>
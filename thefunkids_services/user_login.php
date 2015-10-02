<?php
session_start();
header("Content-Type: application/json");
include("../dbconnection.php");
$user_name =  mysql_real_escape_string($_POST['user_name']);
$password  =  mysql_real_escape_string(md5($_POST['password']));
$result=  Userlogin($user_name,$password);
$user=  mysql_fetch_array($result);
if(($user['email']==$user_name and $user['password']==$password))
{
  $user_data=array(
        'user_id'=>$user['user_id'],
        'name'=>$user['name'],        
        'email'=>$user['email'],
        'mobile_number'=>$user['mobile_number'],        
        'gender'=> $user['gender'],        
        'status'=>'1' 
      );
  echo json_encode($user_data);      
}else if(($user['user_name']==$user_name and $user['password']==$password)) 
{
  $user_data=array(
    'user_id'=>$user['user_id'],
        'name'=>$user['name'],        
        'email'=>$user['email'],        
         'mobile_number'=>$user['mobile_number'],        
        'gender'=> $user['gender'],        
        'status'=>'1' 
      );    
  echo json_encode($user_data);
}else {
     $status=array('status'=>0,'error'=>'Invalid User name or password');          
     echo json_encode($status);
}
?>
<?php
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $name=  mysql_real_escape_string($_POST['name']);
    $gender=  mysql_real_escape_string($_POST['gender']);
    $email=  mysql_real_escape_string($_POST['email']);
    $phone_number=  mysql_real_escape_string($_POST['phone_number']);
    $location=  mysql_real_escape_string($_POST['location']);   
    $password=  mysql_real_escape_string(md5($_POST['password']));
    $activation=md5($email.time());  
    $user_register=  getUserByEmail($email);     
    $user=  mysql_fetch_array($user_register);    
    if($user['email']==$email)
    {    
         header("location:signup-mother-baby-forum.php?register");   
    }else{
      registerUser($name,$gender,$email,$location,$phone_number,$password,$activation);    
    $base_url="http://thefunkids.com/beta/activation.php?code=".$activation;
    $subject="Registration successful, please activate email at The Fun Kids";
    $from = "info@thefunskids.com"; 
    $to = $email;
    $mail_body="Dear $name,<br/><br/> Welcome to Fun Kids, we bring exciting rhymes, games, puzzles and stories for your little angels. We believe that learning with fun is important for child mental development and we strive to bring best products that can help you groom your child in a fun environment. <br /><br /> Along with Kids section, we have discussion forums and other activities related to Moms and parenting. To make your journey more exciting with us, we come up with monthly contest and sweepstakes, where you can participate and win super mom gifts from us.<br /><br />We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.<br /><br />Please note that your data is confidential and will be used only for our promotional activities. We do not share our data with other advertisers and refrain ourselves from any spam activities.<br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href=".$base_url.">.$base_url.'</a>' <br/><br/>Please contact us at info@golive.com.pk if you have any further queries.<br/></br>Regards & Love<br><br>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:raheelaslam@golive.com.pk' . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";   
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);      
    header("location:message.php");
    }    
    }else
    {
     header("location:signup-mother-baby-forum.php");
    }
?>
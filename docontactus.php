<?php
session_start();
if(isset($_POST['submit']))
{
 include("dbconnection.php");
 $name=  mysql_real_escape_string($_REQUEST['name']);
 $email=  mysql_real_escape_string($_REQUEST['email']);
 $message=  mysql_real_escape_string($_REQUEST['message']);
 $subject="Contact us user details";
 $from = "info@thefunskids.com"; 
 $to = $email;
 $mail_body="Dear $name,<br/><br/> Welcome to Fun Kids, <br />Thanks for contact with us.Our team will contact very soon<br/></br>Regards & Love<br/><br/>The Fun Kids Team";    
 $body = wordwrap($mail_body,2000);
 $mail_user_body="$name,<br/><br/> has contact us with follwing details, <br /><br/>Name:".$name."<br/><br/>Email:".$email."<br/></br>Message:".$message."<br/><br/>Regards & Love,<br/><br/>The Fun Kids Team";    
 $body_user = wordwrap($mail_body,2000);
 //$body_user = wordwrap($mail_body_user,70);
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= "From: " . $from ."\r\n";
 $headers .= 'Bcc:raheelaslam@golive.com.pk' . "\r\n";
 $headers .= "Reply-To: " . $email . "\r\n";   
 mail($to,$subject,$mail_body,$headers);
 mail($from,$subject,$mail_user_body,$headers);            
header("location:contact-us.php?thanks");
}else
{
    header("contact.php");
}
?>
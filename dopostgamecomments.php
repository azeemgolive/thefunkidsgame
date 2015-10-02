<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $game_id=  mysql_real_escape_string($_POST['game_id']);
    $games= getGameById($game_id);
    $game=  mysql_fetch_array($games);
    $game_seo= $game['seo_game'];
    if(isset($_SESSION['user_id']))
    {    
    $comments=  mysql_real_escape_string($_POST['comments']);
    addGamecomment($game_id,$comments,$_SESSION['user_id']);
    $base_url="http://thefunkids.com/admin";
    $subject="Comments on Game for Moderation";
    $from = "info@thefunskids.com";
    $to = "azeem.akram78@gmail.com";
    $mail_body="Dear All,<br/><br/> A comment has been posted on our website TheFunKids.com and is pending approval. Kindly review and <br /><br /> moderate whether the comment should be posted or not.<br /><br /><br/>Login Url:<a href=".$base_url.">".$base_url."</a><br/><br/><strong>User Name:</strong>admin@thefunkids.com<br><strong>Password:</strong>admin123<br/></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:raheelaslam@golive.com.pk,amohsin@golive.com.pk,saher@golive.com.pk' . "\r\n";           
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);   
    header("location:kids-games-$game_seo&comment#games");
    }else if(isset($_SESSION['FBID']))
    {
        $comments=  mysql_real_escape_string($_POST['comments']);
    $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
if($user_facebook_id){
$face_book_user=  mysql_fetch_array($user_facebook_id);
$user_id=$face_book_user['user_id'];
}
        addGamecomment($game_id,$comments,$user_id);
    $base_url="http://thefunkids.com/admin";
    $subject="Comments on Game for Moderation";
    $from = "info@thefunskids.com";
    $to = "azeem.akram78@gmail.com";
    $mail_body="Dear All,<br/><br/> A comment has been posted on our website TheFunKids.com and is pending approval. Kindly review and <br /><br /> moderate whether the comment should be posted or not.<br /><br /><br/>Login Url:<a href=".$base_url.">".$base_url."</a><br/><br/><strong>User Name:</strong>admin@thefunkids.com<br><strong>Password:</strong>admin123<br/></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:raheelaslam@golive.com.pk,amohsin@golive.com.pk,saher@golive.com.pk' . "\r\n";           
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);   
    header("location:kids-games-$game_seo&comment#games");
    }
    
    else
    {
        header("location:kids-games-$game_seo&comment#games");
    }
}  else {
      header("location:games.php");
}
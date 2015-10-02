<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
$game_id = mysql_real_escape_string($_REQUEST['funlearn_id']);
$game_comment_id  = mysql_real_escape_string($_REQUEST['fun_learn_comment_id']);
$games= getFunLearnById($game_id);
$game=  mysql_fetch_array($games);
$game_seo= $game['fun_learn_seo'];
if(isset($_SESSION['user_id']))
{  
$comments  = mysql_real_escape_string($_REQUEST['comments']);
updateFunlearnComments($game_comment_id,$game_id,$comments,$_SESSION['user_id']);
 header("location:kid-fun-learn-$game_seo&comment#funlearn");
}else if(isset($_SESSION['FBID']))
{
    $comments=  mysql_real_escape_string($_POST['comments']);
    $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
if($user_facebook_id){
$face_book_user=  mysql_fetch_array($user_facebook_id);
$user_id=$face_book_user['user_id'];
}
 updateFunlearnComments($game_comment_id,$game_id,$comments,$user_id);
 header("location:kid-fun-learn-$game_seo&comment#funlearn");
}
else
    {
        header("location:kid-fun-learn-$game_seo&comment#funlearn");
    }
}else
{
    header("location:kid-fun-learn-$game_seo&comment#funlearn");
}


?>

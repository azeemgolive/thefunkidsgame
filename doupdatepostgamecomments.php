<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
$game_id = mysql_real_escape_string($_REQUEST['game_id']);
$game_comment_id  = mysql_real_escape_string($_REQUEST['game_comment_id']);
$games= getGameById($game_id);
    $game=  mysql_fetch_array($games);
$game_seo= $game['seo_game'];
if(isset($_SESSION['user_id']))
{  
$comments  = mysql_real_escape_string($_REQUEST['comments']);
updateCommentGame($game_comment_id,$game_id,$comments,$_SESSION['user_id']);
 header("location:kids-games-$game_seo&comment#games");
}else if(isset($_SESSION['FBID']))
{
    $comments=  mysql_real_escape_string($_POST['comments']);
    $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
if($user_facebook_id){
$face_book_user=  mysql_fetch_array($user_facebook_id);
$user_id=$face_book_user['user_id'];
}
updateCommentGame($game_comment_id,$game_id,$comments,$user_id);
 header("location:kids-games-$game_seo&comment#games");
}
else
    {
        header("location:kids-games-$game_seo&comment#games");
    }
}else
{
    header("location:kids-games-$game_seo&comment#games");
}


?>

<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $story_comment_id=  mysql_real_escape_string($_POST['story_comment_id']);
    $story_id=  mysql_real_escape_string($_POST['story_id']);
    $rhymes= getStoryById($story_id);
    $rhyme=  mysql_fetch_array($rhymes);
    $rhyme_seo= $rhyme['seo_story'];
    if(isset($_SESSION['user_id']))
    {    
    $comments=  mysql_real_escape_string($_POST['comments']);
    updateStoryComment($story_comment_id,$story_id,$comments,$_SESSION['user_id']);
    header("location:kids-story-$rhyme_seo&comment#stories");
    }elseif (isset($_SESSION['FBID'])) {
      $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
      if($user_facebook_id){
      $face_book_user=  mysql_fetch_array($user_facebook_id);
      $user_id=$face_book_user['user_id'];
      }
    $comments=  mysql_real_escape_string($_POST['comments']);
    updateRhymecomment($rhyme_comment_id,$rhyme_id,$comments,$user_id);
    header("location:kids-story-$rhyme_seo&comment#stories");
    }
    else
    {
       header("location:kids-story-$rhyme_seo&comment#rhymes");
    }
}  else {
      header("location:kid-stories");
}
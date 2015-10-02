<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $rhyme_comment_id=  mysql_real_escape_string($_POST['rhyme_comment_id']);
    $rhyme_id=  mysql_real_escape_string($_POST['rhyme_id']);
    $rhymes=  getRhymeById($rhyme_id);
    $rhyme=  mysql_fetch_array($rhymes);
    $rhyme_seo= $rhyme['rhyme_seo'];
    if(isset($_SESSION['user_id']))
    {    
    $comments=  mysql_real_escape_string($_POST['comments']);
    updateRhymecomment($rhyme_comment_id,$rhyme_id,$comments,$_SESSION['user_id']);
    header("location:kids-rhymes-$rhyme_seo&comment#rhymes");
    }elseif (isset($_SESSION['FBID'])) {
      $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
      if($user_facebook_id){
      $face_book_user=  mysql_fetch_array($user_facebook_id);
      $user_id=$face_book_user['user_id'];
      }
    $comments=  mysql_real_escape_string($_POST['comments']);
    updateRhymecomment($rhyme_comment_id,$rhyme_id,$comments,$user_id);
    header("location:kids-rhymes-$rhyme_seo&comment#rhymes");
    }
    else
    {
       header("location:kids-rhymes-$rhyme_seo&comment#rhymes");
    }
}  else {
      header("location:kid-rhymes");
}
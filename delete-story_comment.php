<?php
session_start();
include("dbconnection.php");
$story_comment_id=$_REQUEST['id'];
$story_id=$_REQUEST['story_id'];
$rhymes= getStoryById($story_id);
$rhyme_detail=  mysql_fetch_array($rhymes);
$rhyme_seo=$rhyme_detail['seo_story'];
deleteStoryComment($story_comment_id);
header("location:kids-story-$rhyme_seo");
?>

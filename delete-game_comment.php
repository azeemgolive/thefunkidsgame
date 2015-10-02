<?php
session_start();
include("dbconnection.php");
$puzzle_comment_id=$_REQUEST['id'];
$game_id=$_REQUEST['game_id'];
$rhymes= getGameById($game_id);
$rhyme_detail=  mysql_fetch_array($rhymes);
$rhyme_seo=$rhyme_detail['seo_game'];
deleteGamesComment($puzzle_comment_id);
header("location:kids-games-$rhyme_seo");
?>

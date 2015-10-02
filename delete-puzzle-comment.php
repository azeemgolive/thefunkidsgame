<?php
session_start();
include("dbconnection.php");
$puzzle_comment_id=$_REQUEST['id'];
$puzzle_id=$_REQUEST['puzzle_id'];
$rhymes= getPuzzleById($puzzle_id);
$rhyme_detail=  mysql_fetch_array($rhymes);
$rhyme_seo=$rhyme_detail['seo_puzzle'];
deletePuzzleComment($puzzle_comment_id);
header("location:kid-puzzle-$rhyme_seo");
?>

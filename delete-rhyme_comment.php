<?php
session_start();
include("dbconnection.php");
$rhyme_comment_id=$_REQUEST['id'];
$rhyme_id=$_REQUEST['rhyme_id'];
$rhymes=  getRhymeById($rhyme_id);
$rhyme_detail=  mysql_fetch_array($rhymes);
$rhyme_seo=$rhyme_detail['rhyme_seo'];
deleteRhymeComment($rhyme_comment_id);
header("location:kids-rhymes-$rhyme_seo");
?>

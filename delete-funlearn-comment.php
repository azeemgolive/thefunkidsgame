<?php
session_start();
include("dbconnection.php");
$funlearn_comment_id=$_REQUEST['id'];
$funlearn_id=$_REQUEST['fun_learn_id'];
$rhymes= getFunLearnById($funlearn_id);
$rhyme_detail=  mysql_fetch_array($rhymes);
$rhyme_seo=$rhyme_detail['fun_learn_seo'];
deleteFunLearnComment($funlearn_comment_id);
header("location:kid-fun-learn-$rhyme_seo");
?>

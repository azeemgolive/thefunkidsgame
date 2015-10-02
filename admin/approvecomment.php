<?php
if(isset($_REQUEST['id']))
{
    include("dbconnection.php");
    $rhyme_comment_id=$_REQUEST['id'];
    updateRhymeComment($rhyme_comment_id);
    header("location:rhyme_comments.php");
}else
{
    header("location:rhyme_comments.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


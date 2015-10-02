<?php
if(isset($_REQUEST['id']))
{
    include("dbconnection.php");
    $game_comment_id=$_REQUEST['id'];
    updateGameComment($game_comment_id);
    header("location:game_comments.php");
}else
{
    header("location:game_comments.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


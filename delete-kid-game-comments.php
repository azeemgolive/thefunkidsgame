<?php
session_start();
include("dbconnection.php");
$game_comment_id=$_REQUEST['game_comment_id'];
$game_id=$_REQUEST['game_id'];
deleteGameComment($game_comment_id);
header("location:view-kids-games.php?id=$game_id");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


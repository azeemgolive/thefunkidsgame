<?php
session_start();
if(isset($_POST['submit']))
{
    include("dbconnection.php");
    $mom_forum_title=  mysql_real_escape_string($_POST['mom_forum_title']);
    if(isset($_REQUEST['isStrict']))
    {
       $isStrict=  mysql_real_escape_string($_REQUEST['isStrict']);
    }  else {
        $isStrict="no";
    }
    $seo_title=str_replace(" ","-", strtolower($mom_forum_title));
    addNewMomForum($mom_forum_title,$isStrict,rtrim($seo_title,"-"));
    header("location:momforum.php");
}  else {
    header("location:momforum.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


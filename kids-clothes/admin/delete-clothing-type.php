<?php
session_start();
if(isset($_REQUEST['id']))
{
    deleteClothingType($_REQUEST['id']);
    header("location:clothes-type.php?delete");
}  else {
   header("location:clothes-type.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


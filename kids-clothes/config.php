<?php
$currency = ''; //Currency Character or code

$db_username = 'tfkids_clothesu';
$db_password = 'DipoHfm(-2r.';
$db_name = 'tfkids_clothes';
$db_host = 'localhost';

$shipping_cost      = 250; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 0, 
                            'Service Tax' => 0
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
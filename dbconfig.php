<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tfkids_fungame');
define('DB_PASSWORD', ']#4[ZI1Gipe6');
define('DB_DATABASE', 'tfkids_fun');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>
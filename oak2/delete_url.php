<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "block";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	mysql_select_db($dbname) or die (mysql_error("Error database"));

$id=(int)$_GET["url"];

$query_delete = "DELETE FROM `block`.`block_url` WHERE `block_url`.`id` = '$id'";
mysql_query($query_delete);

shell_exec("/var/www/html/win/manage_squid.rb");
shell_exec('/var/www/html/win/restart_service_squid.sh');
mysql_close($con);
header('Location:/oak2/url_block.php');
?>
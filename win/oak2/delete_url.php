<?php
echo "1";
$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "block";
echo "2";
$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	mysql_select_db($dbname) or die (mysql_error("Error database"));
echo "3";
$id=(int)$_GET["url"];

$query_delete = "DELETE FROM `block`.`block_url` WHERE `block_url`.`id` = '$id'";
mysql_query($query_delete);

//shell_exec("/var/www/html/oak2/manage_main.rb");
//shell_exec("/var/www/html/oak2/restart_service.sh");
header('Location:/oak2/url_block.php');

mysql_close($con);
?>

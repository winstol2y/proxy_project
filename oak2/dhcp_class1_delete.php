<?php

	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "dhcp";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	        mysql_select_db($dbname) or die (mysql_error("Error database"));

	$mac=$_GET["mac"];

	$query_delete = "DELETE FROM `dhcp`.`class1` WHERE `class1`.`hw` = '$mac'";
	mysql_query($query_delete);

	shell_exec("/var/www/html/oak2/manage_dhcp.rb");
	shell_exec('/var/www/html/oak2/restart_service_dhcp.sh');
	header('Location:dhcp_class1.php');

	mysql_close($con);
?>

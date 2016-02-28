<?php
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "dhcp";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	        mysql_select_db($dbname) or die (mysql_error("Error database"));

	$query_add = "UPDATE `dhcp`.`class_range` SET `ip_start`='".$_POST["range1"]."', `ip_end`='".$_POST["range2"]."' WHERE `class`='".$_POST["class"]."'";

	mysql_query($query_add) or die(mysql_error());
	
	shell_exec("/var/www/html/oak2/manage_dhcp.rb");
	header('Location: ip_class_config.php');
			
	#			shell_exec('./service_isc_restart.sh'); //run shell restart service
	mysql_close($con);
?> 

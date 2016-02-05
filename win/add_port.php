<?php
include("connect.php");

	$query_add = "INSERT INTO `block`.`head_port` (`port` , `command` , `comment`) VALUES ('".$_POST["port_add"]."','".    $_POST["command_add"]."','".$_POST["comment_add"]."')";
	
	mysql_query($query_add) or die(mysql_error());
			
	shell_exec("./manage_main.rb");
	header('Location: config_port_squid.php');
		
	shell_exec('./restart_service.sh'); //run shell restart service
mysql_close($con);
?> 

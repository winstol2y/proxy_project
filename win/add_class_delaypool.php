<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "delay_pool";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

$query_add = "INSERT INTO `delay_pool`.`class_squid` (`class`, `range`, `bandwidth`) VALUES ('".$_POST["class"]."','".$_POST["range"]."','".$_POST["bandwidth"]."')";
$query_set = "SET @count = 0;"; 
$query_sort = "UPDATE `class_squid` SET `class_squid`.`pool` = @count := @count + 1";
mysql_query($query_add) or die(mysql_error());
mysql_query($query_set) or die(mysql_error());
mysql_query($query_sort) or die(mysql_error());
header('Location: config_class_squid.php');
				
#				shell_exec("./manage_dhcp.rb");

#				shell_exec('./service_isc_restart.sh'); //run shell restart service

mysql_close($con);
?> 

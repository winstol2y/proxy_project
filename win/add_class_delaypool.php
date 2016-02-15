<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "delay_pool";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

date_default_timezone_set("Asia/Bangkok"); //set time zone
date_default_timezone_get();
$t1 = date('d-m-Y'); //time now
$t2 = $_POST["time_add"];

$date1=date_create("$t1");
$date2=date_create("$t2");
$diff=date_diff($date1,$date2);
$date11 = $diff->format("%R%a");
$date12 = (int)$date11;

$query_add = "INSERT INTO `delay_pool`.`class_squid` (`class`, `range`, `bandwidth`) VALUES ('".$_POST["class"]."','".$_POST["range"]."','".$_POST["bandwidth"]."')";

mysql_query($query_add) or die(mysql_error());
header('Location: config_class_squid.php');
				
#				shell_exec("./manage_dhcp.rb");

#				shell_exec('./service_isc_restart.sh'); //run shell restart service

mysql_close($con);
?> 

<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "delay_pool";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

$pool=$_GET["pool"];

$query_delete = "DELETE FROM `delay_pool`.`class_squid` WHERE `class_squid`.`pool` = '$pool'";
mysql_query($query_delete)  or die(mysql_error());

$query_set = "SET @count = 0;";
$query_sort = "UPDATE `class_squid` SET `class_squid`.`pool` = @count := @count + 1";
mysql_query($query_set) or die(mysql_error());
mysql_query($query_sort) or die(mysql_error());

//shell_exec("./test.rb");
//shell_exec("./service_isc_restart.sh");
header('Location:config_class_squid.php');

mysql_close($con);
?>

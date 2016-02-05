<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "dhcpd";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

$subnet1=$_GET["subnet"];

$query_delete = "DELETE FROM `dhcpd`.`config_subnet` WHERE `config_subnet`.`subnet` = '$subnet1'";
mysql_query($query_delete);

//shell_exec("./test.rb");
//shell_exec("./service_isc_restart.sh");
header('Location:config_subnet.php');

mysql_close($con);
?>

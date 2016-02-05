<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "dhcp";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

$mac=$_GET["mac"];
$ip=$_GET["ip"];

$query_delete = "DELETE FROM `dhcp`.`class3` WHERE `class3`.`hw` = '$mac'";
mysql_query($query_delete);

//shell_exec("./test.rb");
//shell_exec("./service_isc_restart.sh");
header('Location:/oak2/dhcp_class3.php');

mysql_close($con);
?>

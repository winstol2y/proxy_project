<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "dhcp";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));

$query_add = "UPDATE `dhcp`.`subnet` SET `subnet`='".$_POST["subnet"]."', `netmask`='".$_POST["netmask"]."', `range1`='".$_POST["range1"]."', `range2`='".$_POST["range2"]."', `broadcast`='".$_POST["broadcast"]."' , `router`='".$_POST["router"]."'";

mysql_query($query_add) or die(mysql_error());
mysql_close($con);

shell_exec("/var/www/html/oak2/manage_dhcp.rb");

shell_exec('./restart_service_dhcp.sh');
shell_exec('./restart_service_network.sh');
header('Location: subnet_config.php');
?> 

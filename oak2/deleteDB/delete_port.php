<?php

include("connect.php");

$subnet1=$_GET["subnet"];

$query_delete = "DELETE FROM `block`.`head_port` WHERE `head_port`.`port` = '$subnet1'";
mysql_query($query_delete);

shell_exec("./manage_main.rb");
shell_exec("./restart_service.sh");
header('Location:config_port_squid.php');

mysql_close($con);
?>

<?php

include("connect.php");

$url=$_GET["url"];

$query_delete = "DELETE FROM `block`.`block_url` WHERE `block_url`.`url` = '$url'";
mysql_query($query_delete);

//shell_exec("rm -f /usr/local/etc/namedb/dynamic/*");
shell_exec("./manage_main.rb");
shell_exec("./restart_service.sh");
header('Location:index.php');

mysql_close($con);
?>

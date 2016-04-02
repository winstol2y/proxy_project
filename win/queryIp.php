<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "squidLogDaily";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));


$selectName  = "SELECT DISTINCT tableName FROM `tableName`";
$queryName = mysql_query("$selectName") or die(mysql_error());

while($tableName = mysql_fetch_assoc($queryName)){

	echo $tableName['tableName'];
	echo "<br>";
	$selectIp  = 'SELECT DISTINCT `ipClient` FROM `squidLogDaily`.`'.$tableName["tableName"].'`';
	$queryIp = mysql_query("$selectIp") or die(mysql_error());
	while($ip = mysql_fetch_assoc($queryIp)){
		echo "----->".$ip['ipClient'];
		$selectUrl = 'SELECT count(url),timeUse,byte FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
		$queryUrl = mysql_query("$selectUrl") or die(mysql_error());
		while($url = mysql_fetch_assoc($queryUrl)){
			echo "--------------->".$url['count(url)'];	
		}
		$selectSumTime = 'SELECT sum(timeUse),sum(byte) FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
		$querySumTime = mysql_query("$selectSumTime") or die(mysql_error());
		while($sum = mysql_fetch_assoc($querySumTime)){
		        echo "--------------->".$sum['sum(timeUse)'];
		        echo "--------------->".$sum['sum(byte)'];
		        echo "<br>";
		}	
	}
	echo "<br>";
	echo "<br>";
}

?>

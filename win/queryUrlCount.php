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
	echo "<br>";
	$selectUrl  = 'SELECT DISTINCT `url` FROM `squidLogDaily`.`'.$tableName["tableName"].'`';
	$queryUrl = mysql_query("$selectUrl") or die(mysql_error());
	$arrayUrl = array();
	$countArray = 0;
	while($url = mysql_fetch_assoc($queryUrl)){
		$pattern = "/http:\/\/([^\/]+)\//i";
		preg_match($pattern, $url['url'], $matches);
		$arrayUrl[$countArray] = $matches[1];
		$countArray++;
	}
	$duplicateUrl = array_keys(array_flip($arrayUrl));
	for($count = 0; $count < count($duplicateUrl); $count++){
		echo $duplicateUrl[$count];
		$selectCountUrl  = 'SELECT count(url),sum(byte) FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `url` LIKE "%'.$duplicateUrl["$count"].'%"';
		$queryCountUrl = mysql_query("$selectCountUrl") or die(mysql_error());
		while($countUrl = mysql_fetch_assoc($queryCountUrl)){
			echo "----->".$countUrl["count(url)"];
			echo "----->".$countUrl["sum(byte)"]." byte";
			$selectCountIp  = 'SELECT DISTINCT ipClient FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `url` LIKE "%'.$duplicateUrl["$count"].'%"';
			$queryCountIp = mysql_query("$selectCountIp") or die(mysql_error());
			$count_ip = 0;
			while($countIp = mysql_fetch_assoc($queryCountIp)){
				echo "<br>";
				echo "------------------------------------------>".$countIp["ipClient"];
				$count_ip++;
			}
			echo "<br>";
			echo "---------------------------------------------------------------------->".$count_ip;
		}
		echo "<br>";
		echo "<br>";		
	}
	echo "<br>";		
	echo "<br>";		
	echo "<br>";		
	echo "<br>";		
	echo "<br>";		
	echo "<br>";		
	echo "<br>";		
}

?>

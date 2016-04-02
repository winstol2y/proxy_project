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
		echo "<br>";
		$selectUrl = 'SELECT DISTINCT url,type,dateTime,byte,timeUse FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
		$queryUrl = mysql_query("$selectUrl") or die(mysql_error());
		$arrayUrl = array();
		$countArray = 0;
		while($url = mysql_fetch_assoc($queryUrl)){
			if($url['type'] == "text/html"){
				$pattern = "/http:\/\/([^\/]+)\//i";
				preg_match($pattern, $url['url'], $matches);
				$arrayUrl[$countArray] = $matches[1];
				$countArray++;
			}
		}
		$duplicateUrl = array_keys(array_flip($arrayUrl));
		$countUrl = array_count_values($arrayUrl);

		for($count = 0; $count < count($duplicateUrl);$count++){
			$selectSum1 = 'SELECT sum(byte),sum(timeUse) FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `url` LIKE "%'.$duplicateUrl[$count].'%"';
			$querySum1 = mysql_query("$selectSum1") or die(mysql_error());
			while($sum1 = mysql_fetch_assoc($querySum1)){
				echo $duplicateUrl[$count];
				echo "-------->";
				echo $countUrl[$duplicateUrl[$count]];
				echo "-------->";
				echo $sum1['sum(byte)'];
				echo "-------->";
				echo $sum1['sum(timeUse)'];
				echo "<br>";
			}
		}


		$selectUrlAnother = 'SELECT url,type,dateTime FROM `squidLogDaily`.`'.$tableName["tableName"].'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
		$queryUrlAnother = mysql_query("$selectUrlAnother") or die(mysql_error());
		while($url = mysql_fetch_assoc($queryUrlAnother)){
		        if($url['type'] != "text/html"){
				echo "$";
				echo "$url[url]";
				echo "<br>";
		        }
		}
	}
	echo "<br>";
	echo "<br>";
}

?>

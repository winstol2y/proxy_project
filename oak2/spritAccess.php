<?php
$data = file_get_contents('/var/log/squid3/access.log');
$dataLogArr = explode ( "\n", $data );
$lengthData = count($dataLogArr);

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "squid_log";

#$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
#  	mysql_select_db($dbname) or die (mysql_error("Error database"));

$t1 = date('d-m-Y'); //time now

#$queryCreateTable = "CREATE TABLE `$t1` (id INT AUTO_INCREMENT PRIMARY KEY,dateTime datetime, timeUse VARCHAR(1000), ipClient VARCHAR(15), resultCode VARCHAR(100), byte VARCHAR(100), method VARCHAR(100), url VARCHAR(10000000), hCode VARCHAR(100), type VARCHAR(100))";
#$insertDataTable = "INSERT INTO `squid_log`.`$t1` (dateTime,timeUse,ipClient,resultCode,byte,method,url,hCode,type) VALUES ('$data[0]','$data[6]','$data[8]','$data[10]','$data[12]','$data[14]')";
#mysql_query("$queryCreateTable") or die(mysql_error());

for($i = 0; $i < $lengthData; $i++){
	$data = explode(" ", trim($dataLogArr[$i]));
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	$lengthDataType = count($data);
	echo $i+1;
	echo "<br>";
	echo $dataLogArr[$i];
	echo "<br>";
	$k = 0;
	for($j = 0; $j < $lengthDataType; $j++)
	{
		if($data[$j] == "")
		{
			continue;
		}
		echo $data[$j];
		echo "<br>";
	}
	echo "<br>";
}

?>

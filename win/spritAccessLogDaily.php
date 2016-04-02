<?php
shell_exec('/var/www/html/win/change_permission.sh');
$data = file_get_contents('/var/log/squid3/access.log');
$dataLogArr = explode ( "\n", $data );
$lengthData = count($dataLogArr);

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "squidLogDaily";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));

$t1 = date('d-m-Y_H-i-s'); //time now
$queryCreateTable = "CREATE TABLE `$t1` (id INT AUTO_INCREMENT PRIMARY KEY,dateTime VARCHAR(100), timeUse VARCHAR(1000), ipClient VARCHAR(15), resultCode VARCHAR(100), byte VARCHAR(100), method VARCHAR(100), url VARCHAR(10000000), hCode VARCHAR(100), type VARCHAR(100))";
mysql_query("$queryCreateTable") or die(mysql_error());

$nameTable = "INSERT INTO `squidLogDaily`.`tableName` (tableName) VALUES ('$t1')";
mysql_query("$nameTable") or die(mysql_error());

for($i = 0; $i < $lengthData; $i++){
	$data = explode(" ", trim($dataLogArr[$i]));
	$lengthDataType = count($data);
	$k = 0;
	for($j = 0; $j < $lengthDataType; $j++)
	{
		if($data[$j] != "") {
			$data[$k] = $data[$j];
			$k++;
		}
	}
	$time = gmdate('d.m.Y H:i:s', $data[0]);
	$insertDataTable = "INSERT INTO `squidLogDaily`.`$t1` (dateTime,timeUse,ipClient,resultCode,byte,method,url,hCode,type) VALUES ('$time','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[8]','$data[9]')";
	mysql_query("$insertDataTable") or die(mysql_error());
}
mysql_close($con);
?>

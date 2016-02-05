<?php
include("connect.php");

date_default_timezone_set("Asia/Bangkok"); //set time zone
date_default_timezone_get();
$t1 = date('d-m-Y'); //time now
$t2 = $_POST["time_add"];

$date1=date_create("$t1");
$date2=date_create("$t2");
$diff=date_diff($date1,$date2);
$date11 = $diff->format("%R%a");
$date12 = (int)$date11;

if(empty($_POST["name_add"])){
	echo "กรุณากรอก Name";
}
elseif(empty($_POST["url_add"])){
	echo "กรุณากรอก URL";
}
elseif(empty($_POST["time_add"])){
	echo "กรุณากรอก Expire";
}
elseif($date12 < 0){
	echo "กรุณาใส่วันที่มากกว่านี้";
}
else{
	$a=fopen("url_check.txt", "w");
	fwrite($a,$_POST["url_add"]);
	fclose($a);
	
	$result = shell_exec("grep -c ' ' /var/www/html/win/url_check.txt");

	if($result > 0){
		echo "ห้ามมีช่องว่าง";
	}
	else{

	$query_add = "INSERT INTO `block`.`block_url` (`name` , `url` , `expire`) VALUES ('".$_POST["name_add"]."','".$_POST["url_add"]."','".$_POST["time_add"]."')";

	mysql_query($query_add) or die(mysql_error());
	header('Location: index.php');
	shell_exec("/var/www/html/win/manage_main.rb");
	shell_exec('/var/www/html/win/restart_service.sh'); //run shell restart service

	}
}
mysql_close($con);
?> 

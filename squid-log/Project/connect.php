<?
	$host="localhost";
	$user="root";
	$pass="root";
	$dbname="logfiles";
	$tbname = "log";
	$connect=mysql_connect($host,$user,$pass)or die('Error connecting to mysql');  

	if(!$connect) {
		echo "�������ö�������Ͱҹ��������".mysql_error();
		die();
	}
?>
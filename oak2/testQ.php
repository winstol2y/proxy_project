<?php
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "block";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
		mysql_select_db($dbname) or die (mysql_error("Error database"));

	$query_all = "SELECT * FROM `block_url` ORDER BY `id` ASC ";
	$query_DB = mysql_query($query_all);

	echo "<pre>";
	var_dump($query_DB);
	echo "</pre>";
	echo "<br>";
	echo "-----------------------------------------------------";

	$query_Err = "SELECT * FM `block_url` ORDER BY `id` ASC ";
	$query_DB_Err = mysql_query($query_Err);
	echo "<pre>";
	var_dump($query_DB_Err);
	echo "</pre>";

	if (!$query_DB_Err) 
	{
		$die = die(mysql_error());
		echo $die;
	}
?>
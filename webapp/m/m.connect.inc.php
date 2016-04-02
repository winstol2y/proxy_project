<?php
	//m.connect.inc.php
	define("db_host","mysql:dbname=webapp;host=localhost");
	define("db_user", "root");
	define("db_pass", "qwerty");

	function connecttoDB()
	{
    	$connect = new PDO(db_host,db_user,db_pass);
    	$connect->exec("SET CHARACTER SET utf8");
    	return $connect;
	}
?>
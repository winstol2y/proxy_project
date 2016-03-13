<?php
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "user_list";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));

	mysql_select_db($dbname) or die (mysql_error("Error database"));
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$strSQL = "SELECT * FROM admin_user WHERE username = '".($_POST['username'])."' and password = '".($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{
		$_SESSION["login"] = 0;
		echo '<script type="text/javascript">alert("Username and Password is Incorrect");window.location.href = "./index.php";</script>';
	}
	else
	{
		$_SESSION["login"] = 1;
		header("location:main.php");
	}
	mysql_close();
?>

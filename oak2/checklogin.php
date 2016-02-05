<script type="text/javascript">
alert("!!! Please Check Username and/or Password !!!");
window.location.href = "index.php";
</script>

<?php
	session_start();
	mysql_query("SET NAMES UTF8");
	mysql_query("SET character_set_results=utf8");
	$x="proxy_login_db";
	include("connectDB/connectLogin.php");
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$strSQL = "SELECT * FROM user WHERE username = '".($_POST['username'])."' and password = '".($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";	
	}
	else
	{
		echo "Username and Password Correct!";
		header("location:main.php");
	}

	mysql_close();
?>

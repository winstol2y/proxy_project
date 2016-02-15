<script type="text/javascript">
alert("!!! Please Check Username and/or Password !!!");
window.history.back();
</script>

<?php 
	session_start();
	mysql_query("SET NAMES UTF8");
	//mysql_query("SET character_set_results=utf8");
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
		
		$_SESSION["login_ok"] = 0;
		echo "Username and Password Incorrect!";	
	}
	else
	{
		$_SESSION["login_ok"] = 1;
		header("location:main.php");
	}

	mysql_close();
?>

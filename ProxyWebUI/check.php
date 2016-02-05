<script type="text/javascript">
alert("!!! Please Check Username and/or Password !!!");
window.location.href = "index.html";
</script>

<?php
	session_start();
	mysql_query("SET NAMES UTF8");
	mysql_query("SET character_set_results=utf8");
	$x="proxy_login_db";
	include("connect2.php");
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$strSQL = "SELECT * FROM user WHERE username = '".($_POST['username'])."' and password = '".($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	//$team = $objResult["staff_team"];
	//$chkuser = $objResult["staff_name"];
	
	if(!$objResult)
	{
		//echo "Username and Password Incorrect!";	
	}
	else
	{
		echo "Username and Password Correct!";
		header("location:main.php");
		//$_SESSION["sessionID"]=$objResult["staff_id"];
		//$_SESSION["sessionUser"]=$objResult["staff_username"];
		//$_SESSION["sessionTeam"]=$objResult["staff_team"];
		//$_SESSION["sessionPosition"]=$objResult["staff_position"];
		//$_SESSION["sessionName"]=$objResult["staff_name"];
	}
	
	/*if($team == "001")
	{
			header("location:admin1.php");
	}
	if($team == "002")
	{
			header("location:showproduct.php");
	}
	if($team == "003")
	{
			header("location:addstaff.php");
	}*/ 
	mysql_close();
?>

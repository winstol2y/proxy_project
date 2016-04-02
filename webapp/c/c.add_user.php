<?php
	//c.add_user.php
	session_start();
	$userD = $_SESSION['userD'];
	if(!isset($userD))
	{
		echo '<script type="text/javascript">alert("Please Login");window.location.href = "index.php";</script>';
	}
	elseif($userD["type"] != 0)
	{
		echo '<script type="text/javascript">alert("Admin Only");window.location.href = "index.php";</script>';
	}
	echo "<pre>";
		var_dump($_POST);
	echo "</pre>";
	require_once ('../m/m.connect.inc.php');
	require_once ('../m/m.member.inc.php');

	$name = isset($_POST['name']) ? $_POST['name'] : "";
	$surname = isset($_POST['surname']) ? $_POST['surname'] : "";
	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : "";
	$type = isset($_POST['type']) ? $_POST['type'] : "";
	
	if (add_user($name, $surname, $username, $passwd, $type)) 
	{
		//echo "1";
	    header("Location: ../admin_info.php");
	}
	else
	{
		//echo "2";
	    header("Location: ../admin_info.php");
	}
?>
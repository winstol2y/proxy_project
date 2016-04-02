<?php 
	//c.edit_user.php
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

	require_once ('../m/m.connect.inc.php');
	require_once ('../m/m.member.inc.php');

	$id = isset($_POST['id']) ? $_POST['id'] : "";
	$name = isset($_POST['name']) ? $_POST['name'] : "";
	$surname = isset($_POST['surname']) ? $_POST['surname'] : "";
	$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : "";
	$type = isset($_POST['type']) ? $_POST['type'] : "";

	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	if (edit_user($id,$name, $surname, $passwd, $type)) 
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
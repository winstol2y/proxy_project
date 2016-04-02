<?php 
	//c.delete_user.php
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

	$del_id = isset($_GET['id']) ? $_GET['id'] : "";

	if (delete_user($del_id)) 
	{
    	header("Location: ../admin_info.php");
	} 
	else 
	{
    	header("Location: ../admin_info.php");
	}
?>
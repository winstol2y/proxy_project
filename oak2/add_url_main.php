<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	//echo "<pre>";
	//var_dump($_POST);
	//echo "</pre>";
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "block";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
		mysql_select_db($dbname) or die (mysql_error("Error database"));
	if(!empty($_POST['qURL']))
	{
		$nametoDB = $_POST["qURL"];
		$urltoDB = $_POST["qURL"];
		$timetoDB = "00:00-23:59";
		$daystoDB = "SMTWHFA";
		$filenametoDB = "SMTWHFA_00_00_23_59";
		$blockdatetoDB = "SMTWHFA 00:00-23:59";
		///echo "<pre>";
		///var_dump(get_defined_vars());
		///echo "</pre>";
		$query_add = "INSERT INTO `block`.`block_url` (`name` , `url` , `time`,`day`,`file_name`,`block_date_time`) VALUES ('".$nametoDB."','".$urltoDB."','".$timetoDB."','".$daystoDB."','".$filenametoDB."','".$blockdatetoDB."')";	
		mysql_query($query_add) or die(mysql_error());	
	}
	else
	{
		alertBox("Quick URL is empty");
	}
	
?>
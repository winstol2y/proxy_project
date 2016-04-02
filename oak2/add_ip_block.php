<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}

	$days="";
	if($_POST["dayR"] == 'SMTWHFA')
	{
		$days = $_POST['dayR'];
		
	}
	else if ($_POST['dayR'] == 'on')
	{

		foreach ($_POST["day"] as $day) {
			$days = $days.$day;
		}
	}

	if ($_POST["timeR"] == "00:00-23:59") 
	{
		$time_start = "00:00";
		$time_end = "23:59";
		$check_time_start = (int)(0000);
		$check_time_end = (int)(2359);
	}
	else
	{
		$time_start = $_POST["hour_start"].":".$_POST["min_start"];
		$time_end = $_POST["hour_end"].":".$_POST["min_end"];
		$check_time_start = (int)($_POST["hour_start"].$_POST["min_start"]);
		$check_time_end = (int)($_POST["hour_end"].$_POST["min_end"]);
	}
	$texttoalert = "";
	$statusQuery = TRUE;
	$statusQuery2 = TRUE;
	$statusQuery3 = TRUE;
	$statusQuery4 = TRUE;
	$statusQuery5 = TRUE;
	$checkQuery = TRUE;
	$porttoDB = "";

	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "block";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	mysql_select_db($dbname) or die (mysql_error("Error database"));

	if(empty($_POST["name_add"]))
	{
		$statusQuery = FALSE;
		$texttoalert = $texttoalert.'Check Name \n';
	}
	if(empty($_POST["ip_add"]))
	{
		$statusQuery2 = FALSE;
		$texttoalert = $texttoalert.'Check IP \n';
	}
	else
	{
		$a=fopen("ip_check.temp", "w");
		fwrite($a,$_POST["ip_add"]);
		fclose($a);
		$checkSpace = shell_exec("grep -c ' ' /var/www/html/oak2/ip_check.temp"); //count line is have space
		if($checkSpace > 0)
		{
			$statusQuery4 = FALSE;
			$texttoalert = $texttoalert.'IP can\'n have space ';
		}
		$check_dot_char = preg_match('/^[0-9.]+$/', $_POST["ip_add"]);
		if(!$check_dot_char)
		{
			$statusQuery5 = FALSE;
			$texttoalert = $texttoalert.'IP can have only number and dot ';
		}
	}
	if(($check_time_end < $check_time_start) )
	{
		$statusQuery3 = FALSE;
		$texttoalert = $texttoalert.'Check Block Time \n';
	}
	else
	{
		shell_exec('rm /var/www/html/oak2/temp_time.temp');

		$timetoDB = $time_start."-".$time_end;
		$b=fopen("cut_colon.temp", "w");
		fwrite($b,$timetoDB);
		fclose($b);
		$win = shell_exec("sed 's/:/_/g' /var/www/html/oak2/cut_colon.temp");
		
		$c=fopen("temp_time.temp", "w");
		fwrite($c,$win);
		fclose($c);
		$time_name = shell_exec("sed 's/-/_/g' /var/www/html/oak2/temp_time.temp");
		
		$filenametoDB = $days."_".$time_name;
		$blockdatetoDB = $days." ".$timetoDB;
	}

	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5)
	{	
		$query_add = "INSERT INTO `block`.`block_ip` (`name` , `ip` , `time`,`day`,`file_name`,`block_date_time`) VALUES ('".$_POST["name_add"]."','".$_POST["ip_add"]."','".$timetoDB."','".$days."','".$filenametoDB."','".$blockdatetoDB."')";
		$query_DB = mysql_query($query_add);
		if(!$query_DB)
		{
			$checkQuery = FALSE;
			$texttoalert =  $texttoalert.die(mysql_error()).'\n';
		}
		else
		{
			mysql_close($con);
			//shell_exec("/var/www/html/oak2/manage_squid.rb");
			//shell_exec('/var/www/html/oak2/restart_service_squid.sh');
			header('Location: ./ip_block.php');
		}
	}
	else
	{	
		mysql_close($con);
		alertBox($texttoalert);
	}
?> 
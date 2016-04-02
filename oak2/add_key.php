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
	if(empty($_POST["key_add"]))
	{
		$statusQuery2 = FALSE;
		$texttoalert = $texttoalert.'Check Key \n';
	}
	else
	{
		$key = $_POST['key_add'];
		$key = explode(" ", $key);

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

	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4)
	{
		for ($i=0; $i < count($key)  ; $i++) 
		{ 
			$query_add = "INSERT INTO `block`.`block_keyword` (`name` , `keyword` , `time`,`day`,`file_name`,`block_date_time`) VALUES ('".$_POST["name_add"]."','".$key[$i]."','".$timetoDB."','".$days."','".$filenametoDB."','".$blockdatetoDB."')";
			$query_DB = mysql_query($query_add);
			if(!$query_DB)
			{
				$checkQuery = FALSE;
				$texttoalert =  $texttoalert.die(mysql_error()).'\n';
			}
		}
		
		if (!$checkQuery) 
		{
			$texttoalert = die(mysql_error());
			alertBox($texttoalert);
		}
		else
		{
			//shell_exec("/var/www/html/oak2/manage_squid.rb");
			//shell_exec('/var/www/html/oak2/restart_service_squid.sh');
			mysql_close($con);
			header('Location: ./keyword_block.php');
		}
	}
	else
	{
		mysql_close($con);
		alertBox($texttoalert);
	}
?>
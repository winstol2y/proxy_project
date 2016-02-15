<?php
	
	$days = "";
	$text = "";
	if($_POST["dayR"] == 'SMTWHFA')
	{
		$days = $_POST['dayR'];
		
	}
	else if ($_POST['dayR'] == 'on')
	{

		foreach ($_POST["day"] as $day)
		{
			$days = $days.$day;
		}
	}
	$time_start = $_POST["hour_start"].":".$_POST["min_start"];
	$time_end = $_POST["hour_end"].":".$_POST["min_end"];
	$check_time_start = (int)($_POST["hour_start"].$_POST["min_start"]);
	$check_time_end = (int)($_POST["hour_end"].$_POST["min_end"]);

	
	
	//echo "----------------------- <br>";
	//echo $days;
	//echo "----------------------- <br>";
	//echo $time_start;
	//echo "----------------------- <br>";
	//echo $time_end;
	//echo "----------------------- <br>";
	//echo $check_time_start;
	//echo "----------------------- <br>";
	//echo $check_time_end;
	

	/*if(isset($_POST['day'])) {echo "yes";}
	else {echo "no";}
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "block";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
		mysql_select_db($dbname) or die (mysql_error("Error database"));
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	if(empty($_POST["name_add"]))
	{
		$text = "Check Name";
		alertBox($text);
		//echo '<script type="text/javascript">alert("'.$text.'");window.history.back();</script>';
	}
	elseif(empty($_POST["url_add"]))
	{
		echo "กรุณากรอก URL";
	}
	elseif(empty($time_start))
	{
		echo "กรุณาเวลาเริ่มต้น";
	}
	elseif(empty($time_end))
	{
		echo "กรุณากรอกเวลาสุดท้าย";
	}
	elseif (empty($days)){
		echo "Check Block Day";
	}
	elseif(($check_time_end < $check_time_start) )
	{
		echo "Check Block Time";
	}
	else{

		shell_exec('rm /var/www/html/oak2/temp_time.temp');

		$timetoDB = $time_start."-".$time_end;
		$a=fopen("url_check.txt", "w");
		fwrite($a,$_POST["url_add"]);
		fclose($a);
		
		$result = shell_exec("grep -c ' ' /var/www/html/oak2/url_check.txt");

		$b=fopen("cut_colon.temp", "w");
		fwrite($b,$timetoDB);
		fclose($b);

		$win = shell_exec("sed 's/:/_/g' /var/www/html/oak2/cut_colon.temp");
		$c=fopen("temp_time.temp", "w");
		fwrite($c,$win);
		fclose($c);

		$time_name = shell_exec("sed 's/-/_/g' /var/www/html/oak2/temp_time.temp");
		if($result > 0)
		{

			echo "ห้ามมีช่องว่าง";
		}
		else
		{
			$filenametoDB = $days."_".$time_name;
			$blockdatetoDB = $days." ".$timetoDB;
			$query_add = "INSERT INTO `block`.`block_url` (`name` , `url` , `time`,`day`,`file_name`,`block_date_time`) VALUES ('".$_POST["name_add"]."','".$_POST["url_add"]."','".$timetoDB."','".$days."','".$filenametoDB."','".$blockdatetoDB."')";	
			mysql_query($query_add) or die(mysql_error());
			header('Location: url_block.php');
		//shell_exec("/var/www/html/oak2/manage_main.rb");
		//shell_exec('/var/www/html/oak2/restart_service.sh'); //run shell restart service

		}
	}
	mysql_close($con);
?>

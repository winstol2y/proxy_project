<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	$email_add = "";
	$texttoalert = "";
	$statusQuery = TRUE;
	$statusQuery2 = TRUE;
	$statusQuery3 = TRUE;
	$statusQuery4 = TRUE;
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));

  	date_default_timezone_set("Asia/Bangkok"); 
	date_default_timezone_get();
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
  	/*echo $_POST["surName"];
  	echo "\n";
  	echo $_POST["lastName"];
  	echo "\n";
  	echo $_POST["people_id"];
  	echo "\n";
  	echo $_POST["email"];
  	echo "\n";
  	echo $_POST["mac"];
  	echo "\n";
  	echo $_POST["tel"];
  	echo "\n";*/
  	/*
  	$dat = date('Y-m-d H:i:s');
  	
  	if(empty($_POST["email"]))
  	{
  		$email_add = "null";
  	}
	if(!empty($_POST["mac"]))
	{
		$a=fopen("macAddress_add.temp", "w");
		fwrite($a,$_POST["mac"]);
		fclose($a);
		
		$result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/macAddress_add.temp");
		$result1 = trim($result);
		$numCharecter=strlen($result1);

		$b=fopen("macAddress_add1.temp", "w");
		fwrite($b,$result1);
		fclose($b);
	 	
		$a = '\'s/[[:xdigit:]]\{2\}/&:/g\'';
		$b = '\'$s/.$//\'';
		$result_mac = shell_exec("sed -e $a -e $b /var/www/html/oak2/macAddress_add1.temp");

		$c=fopen("macAddress_add2.temp", "w");
		fwrite($c,$result_mac);
		fclose($c);

		if($numCharecter>12)
		{
			$statusQuery = FALSE;
			$texttoalert = $texttoalert.'MAC Address is less than 12 character \n';
		}
		elseif($numCharecter<12)
		{
			$statusQuery2 = FALSE;
			$texttoalert = $texttoalert.'MAC Address is more than 12 character \n';
		}
		elseif($numCharecter=12)
		{	
			$result_mac = trim($result_mac);
			$mac_query = "SELECT * FROM `class_wifi` WHERE `mac` = '".$result_mac."'";
			$checkMac = mysql_query("$mac_query");

			if(mysql_num_rows($checkMac) > 0)
			{
				$statusQuery3 = FALSE;
				$texttoalert = $texttoalert.'MAC Address is more than 12 character \n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $statusQuery4 = FALSE;
				$texttoalert = $texttoalert.'MAC Address can between A-F a-f and 0-9 \n';
			}
		}
	}
	//alertBox($texttoalert);
	//if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4)
	//{
		$query_add = "INSERT INTO `dhcp`.`class_wifi` (`wifi_id`,`name`, `surname`, `id-card`,`email`,`mac`,`tel`,`regis_time`) VALUES (NULL,'".$_POST["surName"]."','".$_POST["lastName"]."','".$_POST["people_id"]."','".$email_add."','".$result_mac."','".$_POST["tel"]."','".$dat."')";

		mysql_query($query_add) or die(mysql_error());
					
		shell_exec("./manage_dhcp.rb");
		//shell_exec('./service_isc_restart.sh'); //run shell restart service
		header('Location: WiFi_Register.php');
	//}
	
	mysql_close($con);*/
?>
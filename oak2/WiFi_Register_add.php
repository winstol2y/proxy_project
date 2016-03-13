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
	$statusQuery5 = TRUE;
	$statusQuery6 = TRUE;
	$statusQuery7 = TRUE;
	$statusQuery8 = TRUE;
	$statusQuery9 = TRUE;
	$statusQuery10 = TRUE;
	$statusQuery11 = TRUE;
	$statusQuery12 = TRUE;
	$statusQuery13 = TRUE;
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));

  	date_default_timezone_set("Asia/Bangkok"); 
	date_default_timezone_get();
  	
  	$dat = date('Y-m-d H:i:s');

  	if(!empty($_POST["people_id"]))
  	{
  		$a=fopen("ID_add.temp", "w");
		fwrite($a,$_POST["people_id"]);
		fclose($a);
		
		$resultID = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/ID_add.temp");
		$trimID = trim($resultID);
		$lengthID=strlen($trimID);
		
	  	$id_query = "SELECT `name` FROM `class_wifi` WHERE `id-card` = '".$trimID."'";
		$checkID = mysql_query($id_query);

		$my_name=mysql_fetch_array($checkID);
	  	
	    $name_db =  $my_name["name"];
	  	if($name_db != NULL)
	  	{
		  	if($name_db != $_POST["name"])
		  	{
		  		$statusQuery = FALSE;
				$texttoalert = $texttoalert.'ชื่อ กับ รหัสบัตรประชาชน ไม่ตรงกัน กรุณาติดต่อเจ้าหน้าที่\n';
		  	}
		}
	  	if($lengthID != 13)
	  	{
	  		$statusQuery2 = FALSE;
			$texttoalert = $texttoalert.'กรุณาเช็ครหัสบัตรประชาชน\n';
	  	}
	}

  	if(empty($_POST["email"]))
  	{
  		$email_add = "null";
  	}
  	else
  	{
  		$checkAT = strpos($_POST["email"], '@');
  		$checkDOT = strpos($_POST["email"], '.');
  		if($checkAT === FALSE || $checkDOT === FALSE)
  		{
  			$statusQuery3 = FALSE;
			$texttoalert = $texttoalert.'กรุณาเช็ค E-Mail\n';
  		}
  		$email_add = $_POST["email"];
  	}
	if(!empty($_POST["mac"]))
	{
		$a=fopen("macAddress_add.temp", "w");
		fwrite($a,$_POST["mac"]);
		fclose($a);
		
		$result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/macAddress_add.temp");
		$result1 = trim($result);
		$numCharecter=strlen($result1);
		echo $numCharecter;

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
			$statusQuery4 = FALSE;
			$texttoalert = $texttoalert.'MAC Address เกิน \n';
		}
		elseif($numCharecter<12)
		{
			$statusQuery5 = FALSE;
			$texttoalert = $texttoalert.'MAC Address ไม่ครบ \n';
		}
		elseif($numCharecter=12)
		{	
			$result_mac = trim($result_mac);

			$mac_query_1 = "SELECT * FROM `class1` WHERE `hw` = '".$result_mac."'";
			$checkMac1 = mysql_query($mac_query1);
			$mac_query_2 = "SELECT * FROM `class2` WHERE `hw` = '".$result_mac."'";
			$checkMac2 = mysql_query($mac_query2);
			$mac_query_3 = "SELECT * FROM `class3` WHERE `hw` = '".$result_mac."'";
			$checkMac3 = mysql_query($mac_query3);
			$mac_query_4 = "SELECT * FROM `class4` WHERE `hw` = '".$result_mac."'";
			$checkMac4 = mysql_query($mac_query4);
			$mac_query_wifi = "SELECT * FROM `class_wifi` WHERE `mac` = '".$result_mac."'";
			$checkMacWifi = mysql_query($mac_query_wifi);

			if(mysql_num_rows($checkMac1) > 0)
			{
				$statusQuery6 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 1 \n';
			}
			if(mysql_num_rows($checkMac2) > 0)
			{
				$statusQuery7 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 2 \n';
			}
			if(mysql_num_rows($checkMac3) > 0)
			{
				$statusQuery8 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 3 \n';
			}
			if(mysql_num_rows($checkMac4) > 0)
			{
				$statusQuery9 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 4 \n';
			}
			if(mysql_num_rows($checkMacWifi) > 0)
			{
				$statusQuery10 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in WiFi Class \n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $statusQuery11 = FALSE;
				$texttoalert = $texttoalert.'MAC Address can between A-F a-f and 0-9 \n';
			}
		}
	}

	$query_all = 'SELECT * FROM `class_wifi` ORDER BY `wifi_id` DESC';
  	$result_all = mysql_query($query_all) or die(mysql_error());

  	$allD=mysql_fetch_assoc($result_all);
  
  	$ipDBLong = ip2long($allD["ip"]);
  	$ipUPDB = long2ip($ipDBLong+1);
	
  	if(!empty($_POST["tel"]))
  	{
  		$c = fopen("tel_add.temp", "w");
		fwrite($c,$_POST["tel"]);
		fclose($c);
		
		$result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/tel_add.temp");
		$result1 = trim($result);
		$numCharecter=strlen($result1);
		echo $numCharecter;
  	}
  	if($numCharecter>10)
	{
		$statusQuery12 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์เกิน \n';
	}
	elseif($numCharecter<9)
	{
		$statusQuery13 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์ไม่ครบ \n';
	}
	//echo $name_db;
	
	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5 && $statusQuery6 && $statusQuery7 && $statusQuery8 && $statusQuery9 && $statusQuery10 && $statusQuery11 && $statusQuery12 && $statusQuery13)
	{
		$query_add = "INSERT INTO `dhcp`.`class_wifi` (`wifi_id`,`name`, `surname`, `id-card`,`email`,`mac`,`ip`,`tel`,`regis_time`) VALUES (NULL,'".$_POST["name"]."','".$_POST["surName"]."','".$_POST["people_id"]."','".$email_add."','".$result_mac."','".$ipUPDB."','".$_POST["tel"]."','".$dat."')";

		$query_DB = mysql_query($query_add);
		if (!$query_DB) 
		{
			$texttoalert = die(mysql_error());
			alertBox($texttoalert);
		}
		else
		{			
			shell_exec("/var/www/html/oak2/manage_dhcp.rb");
			shell_exec('/var/www/html/oak2/restart_service_dhcp.sh');
			mysql_close($con);
			header('Location: WiFi_Register.php');
		}
	}
	else
	{
		alertBox($texttoalert);
	}
?>
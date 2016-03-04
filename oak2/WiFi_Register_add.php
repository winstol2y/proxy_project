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
		$checkID = mysql_query("$id_query");

		while($my_name=mysql_fetch_array($checkID))
	  	{
	    	$name_db =  $my_name["name"];
	  	}
	  	if($name_db != $_POST["surName"])
	  	{
	  		$statusQuery = FALSE;
			$texttoalert = $texttoalert.'ชื่อ กับ รหัสบัตรประชาชน ไม่ตรงกัน กรุณาติดต่อเจ้าหน้าที่\n';
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
			$mac_query = "SELECT * FROM `class_wifi` WHERE `mac` = '".$result_mac."'";
			$checkMac = mysql_query("$mac_query");

			if(mysql_num_rows($checkMac) > 0)
			{
				$statusQuery6 = FALSE;
				$texttoalert = $texttoalert.'MAC Address ซ้ำ\n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $statusQuery7 = FALSE;
				$texttoalert = $texttoalert.'MAC Address ต้องมีแค่ A-F , a-f และ 0-9 \n';
			}
		}
	}
	

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
		$statusQuery8 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์เกิน \n';
	}
	elseif($numCharecter<9)
	{
		$statusQuery9 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์ไม่ครบ \n';
	}
	//echo $name_db;
	
	alertBox($texttoalert);
	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5 && $statusQuery6 && $statusQuery7 && $statusQuery8 && $statusQuery9)
	{
		$query_add = "INSERT INTO `dhcp`.`class_wifi` (`wifi_id`,`name`, `surname`, `id-card`,`email`,`mac`,`tel`,`regis_time`) VALUES (NULL,'".$_POST["name"]."','".$_POST["surName"]."','".$_POST["people_id"]."','".$email_add."','".$result_mac."','".$_POST["tel"]."','".$dat."')";

		mysql_query($query_add) or die(mysql_error());
					
		//shell_exec("./manage_dhcp.rb");
		//shell_exec('./service_isc_restart.sh');
		header('Location: WiFi_Register.php');
	}
	
	mysql_close($con);
?>
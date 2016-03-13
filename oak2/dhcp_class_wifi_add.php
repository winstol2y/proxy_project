<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	function checkID($id) 
	{
    	if(strlen($id) != 13)
    	{
    		return false;	
    	} 
    	for($i=0, $sum=0; $i<12;$i++)
    	{
        	$sum += (int)($id{$i})*(13-$i);
    	}
    	if((11-($sum%11))%10 == (int)($id{12}))
    	{
        	return true;
    	}
    	return false;
	}
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));
  	
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
	$statusQuery14 = TRUE;
	$statusQuery15 = TRUE;
	$statusQuery16 = TRUE;
	$statusQuery17 = TRUE;
	
	/*
	$_POST["people_id"];
	echo $_POST["people_id"]."<br>";
	$idnum = preg_replace("/(-)/", "", $_POST["people_id"]);
	echo $idnum;*/

	
	date_default_timezone_set("Asia/Bangkok"); //set time zone
	date_default_timezone_get();
	$dat = date('Y-m-d H:i:s');

	
	//-----------------------[Start] Check Name-----------------------//
	if(empty($_POST["name"]))
	{
	    $statusQuery = FALSE;
		$texttoalert = $texttoalert.'Name is empty \n';
	}
	else
	{
		$result_name = trim($_POST["name"]);
		if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['name']) == 0)
		{
			$statusQuery2 = FALSE;
			$texttoalert = $texttoalert.'Name can between A-Z and a-z\n';
		}
	}
	//-----------------------[End] Check Name-----------------------//

	//-----------------------[Start] Check Surname-----------------------//
	if(empty($_POST["surName"]))
	{
	    $statusQuery3 = FALSE;
		$texttoalert = $texttoalert.'Surname is empty \n';
	}
	else
	{
		$result_name = trim($_POST["surName"]);
		if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['surName']) == 0)
		{
			$statusQuery4 = FALSE;
			$texttoalert = $texttoalert.'Surname can between A-Z and a-z\n';
		}
	}
	//-----------------------[End] Check Surname-----------------------//

	//-----------------------[Start] Check ID Num-----------------------//
	if(empty($_POST["people_id"]))
	{
	    $statusQuery5 = FALSE;
		$texttoalert = $texttoalert.'ID Card Number is empty \n';
	}
	else
	{
		$idnum = preg_replace("/[-]|[ ]/", "", $_POST["people_id"]);
		if(checkID($idnum))
		{

		}
		else
		{
			$statusQuery6 = FALSE;
			$texttoalert = $texttoalert.'ID Card Number is incorrect \n';
		}
	}
	//-----------------------[End] Check ID Num-----------------------//

	//-----------------------[Start] Check Email-----------------------//
	if(empty($_POST["email"]))
	{
	    $statusQuery7 = FALSE;
		$texttoalert = $texttoalert.'E-mail is empty \n';
	}
	elseif(preg_match("/[@]/", $_POST["email"]) == 0)
	{
		$statusQuery8 = FALSE;
		//$texttoalert = $texttoalert.'E-mail is error \n';
		$texttoalert = $texttoalert.$_POST["email"].'\n';
	}
	//-----------------------[End] Check Email-----------------------//

	//-----------------------[Start] Check MAC-----------------------//
	if(empty($_POST["mac"]))
	{
		$statusQuery9 = FALSE;
		$texttoalert = $texttoalert.'MAC Address is empty \n';
	}
	else
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
			$statusQuery10 = FALSE;
			$texttoalert = $texttoalert.'MAC Address is less than 12 character \n';
		}
		elseif($numCharecter<12)
		{
			$statusQuery11 = FALSE;
			$texttoalert = $texttoalert.'MAC Address is more than 12 character \n';
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
				$statusQuery12 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 1 \n';
			}
			if(mysql_num_rows($checkMac2) > 0)
			{
				$statusQuery13 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 2 \n';
			}
			if(mysql_num_rows($checkMac3) > 0)
			{
				$statusQuery14 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 3 \n';
			}
			if(mysql_num_rows($checkMac4) > 0)
			{
				$statusQuery15 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 4 \n';
			}
			if(mysql_num_rows($checkMacWifi) > 0)
			{
				$statusQuery16 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in WiFi Class \n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $statusQuery17 = FALSE;
				$texttoalert = $texttoalert.'MAC Address can between A-F a-f and 0-9 \n';
			}
		}
	}
	//-----------------------[End] Check MAC-----------------------//

	//----------------------- [Start] Set IP -----------------------//
	$query_all = 'SELECT * FROM `class_wifi` ORDER BY `wifi_id` DESC';
  	$result_all = mysql_query($query_all) or die(mysql_error());

  	$allD=mysql_fetch_assoc($result_all);
  
  	$ipDBLong = ip2long($allD["ip"]);
  	$ipUPDB = long2ip($ipDBLong+1);
	//----------------------- [End] Set IP -----------------------//

	//-----------------------[Start] Check Tel-----------------------//
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
		$statusQuery18 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์เกิน \n';
	}
	elseif($numCharecter<9)
	{
		$statusQuery19 = FALSE;
		$texttoalert = $texttoalert.'เบอร์โทรศัพท์ไม่ครบ \n';
	}
	//-----------------------[End] Check Tel-----------------------//

	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5 && $statusQuery6 && $statusQuery7 && $statusQuery8 && $statusQuery9 && $statusQuery10 && $statusQuery11 && $statusQuery12 && $statusQuery13 && $statusQuery14 && $statusQuery15 && $statusQuery16 && $statusQuery17 && $statusQuery18 && $statusQuery19)
	{
		$query_add = "INSERT INTO `dhcp`.`class_wifi` (`wifi_id`, `name`, `surname`, `id-card`,`email`,`mac`,`ip`,`tel`,regis_time,) VALUES (NULL,'".$_POST["name"]."','".$_POST["surName"]."','".$_POST["people_id"]."','".$_POST["email"]."','".$_POST["mac"]."','".$ipUPDB."','".$_POST["tel"]."','".$dat."')";
		$query_DB = mysql_query($query_add);
		if (!$query_DB) 
		{
			$texttoalert = die(mysql_error());
			alertBox($texttoalert);
		}
		else
		{
			mysql_close($con);
			shell_exec("/var/www/html/oak2/manage_dhcp.rb");
			shell_exec('/var/www/html/oak2/restart_service_dhcp.sh');
		}
	}
	else
	{	
		mysql_close($con);
		alertBox($texttoalert);
	}
?> 


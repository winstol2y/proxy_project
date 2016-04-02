<?php
  require_once './session_login.inc.php';
?>
<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}

	$class = $_POST['class'];
	
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));

	$query_range = 'SELECT * FROM `class_range` WHERE `class` = '.$class;
  	$range = mysql_query($query_range);
  	while($ip_range=mysql_fetch_array($range))
  	{
  	  $ip_start =  $ip_range["ip_start"];
  	  $ip_end =  $ip_range["ip_end"];
  	}
	
	$texttoalert = "";
	$check1 = TRUE;
	$check2 = TRUE;
	$check3 = TRUE;
	$check4 = TRUE;
	$check5 = TRUE;
	$check6 = TRUE;
	$check7 = TRUE;
	$check8 = TRUE;
	$check9 = TRUE;
	$check10 = TRUE;
	$check11 = TRUE;
	$check12 = TRUE;
	$check13 = TRUE;
	$check14 = TRUE;
	$check15 = TRUE;
	$check16 = TRUE;
	$check17 = TRUE;

	

	
	//-----------------------[Start] Check MAC-----------------------//
	if(empty($_POST["macAddress_add"]))
	{
		$check1 = FALSE;
		$texttoalert = $texttoalert.'MAC Address is empty \n';
	}
	else
	{
		$mac2file=fopen("macAddress_add.temp", "w");
		fwrite($mac2file,$_POST["macAddress_add"]);
		fclose($mac2file);
		
		$result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/macAddress_add.temp"); // cut special character & space
		$result1 = trim($result);

		$numCharecter=strlen($result1); // count mac address

		$b=fopen("macAddress_add1.temp", "w");
		fwrite($b,$result1);
		fclose($b);
	 	
		$a = '\'s/[[:xdigit:]]\{2\}/&:/g\'';
		$b = '\'$s/.$//\'';
		$result_mac = shell_exec("sed -e $a -e $b /var/www/html/oak2/macAddress_add1.temp"); //add : every 2 character

		$c=fopen("macAddress_add2.temp", "w");
		fwrite($c,$result_mac);
		fclose($c);

		if($numCharecter > 12)
		{
			$check2 = FALSE;
			$texttoalert = $texttoalert.'MAC Address is less than 12 character \n';
		}
		elseif($numCharecter < 12)
		{
			$check3 = FALSE;
			$texttoalert = $texttoalert.'MAC Address is more than 12 character \n';
		}
		elseif($numCharecter == 12)
		{	
			$result_mac = trim($result_mac);

			$mac_query1 = 'SELECT * FROM `class1` WHERE `hw` = "'.$result_mac.'"';
			$checkMac1 = mysql_query($mac_query1);
			
			$mac_query2 = 'SELECT * FROM `class2` WHERE `hw` = "'.$result_mac.'"';
			$checkMac2 = mysql_query($mac_query2);

			$mac_query3 = 'SELECT * FROM `class3` WHERE `hw` = "'.$result_mac.'"';
			$checkMac3 = mysql_query($mac_query3);

			$mac_query4 = 'SELECT * FROM `class4` WHERE `hw` = "'.$result_mac.'"';
			$checkMac4 = mysql_query($mac_query4);

			$mac_query_wifi = 'SELECT * FROM `class_wifi` WHERE `mac` = "'.$result_mac.'"';
			$checkMacWifi = mysql_query($mac_query_wifi);
			
			if(mysql_num_rows($checkMac1) > 0)
			{
				$check4 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 1 \n';
			}
			if(mysql_num_rows($checkMac2) > 0)
			{
				$check5 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 2 \n';
			}
			if(mysql_num_rows($checkMac3) > 0)
			{
				$check6 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 3 \n';
			}
			if(mysql_num_rows($checkMac4) > 0)
			{
				$check7 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in User Class 4 \n';
			}
			if(mysql_num_rows($checkMacWifi) > 0)
			{
				$check8 = FALSE;
				$texttoalert = $texttoalert.'Have same MAC Address in WiFi Class \n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $check9 = FALSE;
				$texttoalert = $texttoalert.'MAC Address can between A-F a-f and 0-9 \n';
			}

		}
	}
	//-----------------------[End] Check MAC-----------------------//

	//-----------------------[Start] Check Name-----------------------//
	if(empty($_POST["name_add"]))
	{
	    $check10 = FALSE;
		$texttoalert = $texttoalert.'Name is empty \n';
	}
	else
	{
		$result_name = trim($_POST["name_add"]);
		$name_query = "SELECT * FROM `class1` WHERE `name` = '".$result_name."'";
		$checkName = mysql_query($name_query);

		if(mysql_num_rows($checkName) > 0)
		{
			$check11 = FALSE;
			$texttoalert = $texttoalert.'Name exists already \n';
		}
		if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['name_add']) == 0)
		{
			$check12 = FALSE;
			$texttoalert = $texttoalert.'Name can between A-Z a-z and 0-9 \n';
		}
	}
	//-----------------------[End] Check Name-----------------------//

	//-----------------------[Start] Check IP-----------------------//
	if(empty($_POST["ip_add"]))
	{
	    $check13 = FALSE;
		$texttoalert = $texttoalert.'IP Address is empty \n';
	}
	else
	{
		$result_ip = trim($_POST["ip_add"]);
		$ip_query = "SELECT * FROM `class1` WHERE `ip` = '".$result_ip."'";
		$checkIP = mysql_query("$ip_query");

		if(mysql_num_rows($checkIP) > 0)
		{
			$check14 = FALSE;
			$texttoalert = $texttoalert.'IP Address exists already\n';
		}
		$ip_start_long = ip2long($ip_start);
	    $ip_end_long = ip2long($ip_end);
	    $ip_cur = $_POST["ip_add"];
	    $ip_cur_long = ip2long($ip_cur);
	    if($ip_cur_long<$ip_start_long or $ip_cur_long>$ip_end_long)
		{
			$check15 = FALSE;
			$texttoalert = $texttoalert.' IP Address in Class '.$class.' is between '.$ip_start.'-'.$ip_end.'\n';
		}
	}
	//-----------------------[End] Check IP-----------------------//

	//-----------------------[Start] Check Time-----------------------//
	if(empty($_POST["date_exp"]))
	{
		$check16 = FALSE;
		$texttoalert = $texttoalert.'Date is empty \n';
	}
	else
	{
		date_default_timezone_set("Asia/Bangkok"); //set time zone
		date_default_timezone_get();
		$date_now = date('d-m-Y'); //date now
		$date_exp = $_POST["date_exp"];
	
		$date_now=date_create($date_now);
		$date_exp=date_create($date_exp);
		$diff=date_diff($date_now,$date_exp);
		$diff_format = $diff->format("%R%a"); 
		$date_space = (int)$diff_format;
		if($date_space < 0)
		{
			$check17 = FALSE;
			$texttoalert = $texttoalert.'Date is less than a day \n';
		}
		
	}
	//-----------------------[End] Check Time-----------------------//

	

	if($check1 && $check2 && $check3 && $check4 && $check5 && $check6 && $check7 && $check8 && $check9 && $check10 && $check11 && $check12 && $check13 && $check14 && $check15 && $check16 && $check17 )
	{
		
		$query_add = 'INSERT INTO `class'.$class.'` (`hw`, `name`, `ip`, `expire`) VALUES ("'.$result_mac.'" , "'.$_POST["name_add"].'" , "'.$_POST["ip_add"].'" , "'.$_POST["date_exp"].'")';
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
			header('Location: ./dhcp_classX.php?class='.$class);
		}
	}
	else
	{	
		mysql_close($con);
		alertBox($texttoalert);
	}
?>
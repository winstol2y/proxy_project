<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));
	$class = 1;
	$query_range = 'SELECT * FROM `class_range` WHERE `class` = '.$class;
  	$result_range = mysql_query($query_range);
  	while($my_range=mysql_fetch_array($result_range))
  	{
    	$ip_start =  $my_range["ip_start"];
    	$ip_end =  $my_range["ip_end"];
  	}
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

	date_default_timezone_set("Asia/Bangkok"); //set time zone
	date_default_timezone_get();
	$t1 = date('d-m-Y'); //time now
	$t2 = $_POST["time_add"];

	$date1=date_create("$t1");
	$date2=date_create("$t2");
	$diff=date_diff($date1,$date2);
	$date11 = $diff->format("%R%a");
	$date12 = (int)$date11;

	//-----------------------[Start] Check Name-----------------------//
	if(empty($_POST["name_add"]))
	{
	    $statusQuery = FALSE;
		$texttoalert = $texttoalert.'Name is empty \n';
	}
	else
	{
		$result_name = trim($_POST["name_add"]);
		$name_query = "SELECT * FROM `class1` WHERE `name` = '".$result_name."'";
		$checkName = mysql_query("$name_query");

		if(mysql_num_rows($checkName) > 0)
		{
			$statusQuery2 = FALSE;
			$texttoalert = $texttoalert.'Name exists already \n';
		}
		if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['name_add']) == 0)
		{
			$statusQuery3 = FALSE;
			$texttoalert = $texttoalert.'Name can between A-Z a-z and 0-9 \n';
		}
	}
	//-----------------------[End] Check Name-----------------------//

	//-----------------------[Start] Check IP-----------------------//
	if(empty($_POST["ip_add"]))
	{
	    $statusQuery4 = FALSE;
		$texttoalert = $texttoalert.'IP Address is empty \n';
	}
	else
	{
		$result_ip = trim($_POST["ip_add"]);
		$ip_query = "SELECT * FROM `class1` WHERE `ip` = '".$result_ip."'";
		$checkIP = mysql_query("$ip_query");

		if(mysql_num_rows($checkIP) > 0)
		{
			$statusQuery5 = FALSE;
			$texttoalert = $texttoalert.'IP Address exists already\n';
		}
		$ip_start_long = ip2long($ip_start);
	    $ip_end_long = ip2long($ip_end);
	    $ip_cur = $_POST["ip_add"];
	    $ip_cur_long = ip2long($ip_cur);
	    if($ip_cur_long<$ip_start_long or $ip_cur_long>$ip_end_long)
		{
			$statusQuery6 = FALSE;
			$texttoalert = $texttoalert.' IP Address in Class '.$class.' is between '.$ip_start.'-'.$ip_end.'\n';
		}
	}
	//-----------------------[End] Check IP-----------------------//

	//-----------------------[Start] Check Time-----------------------//
	if(empty($_POST["time_add"]))
	{
		$statusQuery7 = FALSE;
		$texttoalert = $texttoalert.'Date is empty \n';
	}
	elseif($date12 < 0)
	{
		$statusQuery8 = FALSE;
		$texttoalert = $texttoalert.'Date is less than a day \n';
	}
	//-----------------------[End] Check Time-----------------------//

	//-----------------------[Start] Check MAC-----------------------//
	if(empty($_POST["macAddress_add"]))
	{
		$statusQuery9 = FALSE;
		$texttoalert = $texttoalert.'MAC Address is empty \n';
	}
	else
	{
		$a=fopen("macAddress_add.temp", "w");
		fwrite($a,$_POST["macAddress_add"]);
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
			$mac_query = "SELECT * FROM `class1` WHERE `hw` = '".$result_mac."'";
			$checkMac = mysql_query("$mac_query");

			if(mysql_num_rows($checkMac) > 0)
			{
				$statusQuery12 = FALSE;
				$texttoalert = $texttoalert.'MAC Address is more than 12 character \n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
                $statusQuery13 = FALSE;
				$texttoalert = $texttoalert.'MAC Address can between A-F a-f and 0-9 \n';
			}
		}
	}
	//-----------------------[End] Check MAC-----------------------//

	alertBox($texttoalert);
	if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5 && $statusQuery6 && $statusQuery7 && $statusQuery8 && $statusQuery9 && $statusQuery10 && $statusQuery11 && $statusQuery12 && $statusQuery13)
	{
		$query_add = "INSERT INTO `dhcp`.`class1` (`hw`, `name`, `ip`, `expire`) VALUES ('".$result_mac."','".$_POST["name_add"]."','".$_POST["ip_add"]."','".$_POST["time_add"]."')";

		mysql_query($query_add) or die(mysql_error());
					
		shell_exec("./manage_dhcp.rb");
		//shell_exec('./service_isc_restart.sh'); //run shell restart service
		header('Location: dhcp_class1.php');
	}
	
	mysql_close($con);
?>

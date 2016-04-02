<?php
	$servername = "localhost";
  	$username = "root";
  	$password = "qwerty";
 	$dbname = "dhcp";

  	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  	mysql_select_db($dbname) or die (mysql_error("Error database"));
	$class = 4;
	$line = 0;
	$query_range = 'SELECT * FROM `class_range` WHERE `class` = '.$class;
  	$result_range = mysql_query($query_range);
  	while($my_range=mysql_fetch_array($result_range))
  	{
    	$ip_start =  $my_range["ip_start"];
    	$ip_end =  $my_range["ip_end"];
  	}
    $ip_start_long = ip2long($ip_start);
    $ip_end_long = ip2long($ip_end);
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");</script>';
	}
	function backalertBox()
	{
		echo '<script type="text/javascript">window.location.href = "./dhcp_class4.php";</script>';
	}

	move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

	$objConnect = mysql_connect("localhost","root","qwerty") or die("Error Connect to Database"); // Conect to MySQL
	$objDB = mysql_select_db("dhcp");

	if (empty($_FILES["fileCSV"]["name"]))
	{
		$text = "Emtry *.CSV files";
		alertBox($text);
	}
	else
	{
		$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) 
		{
			$line++;
			$texttoalert = "";
			$statusQuery = TRUE;
			$statusQuery2 = TRUE;
			$statusQuery3 = TRUE;
			$statusQuery4 = TRUE;
			$statusQuery5 = TRUE;
			$statusQuery6 = TRUE;
			$statusQuery7 = TRUE;
			$statusQuery8 = TRUE;
			date_default_timezone_set("Asia/Bangkok"); //set time zone
			date_default_timezone_get();
			$t1 = date('d-m-Y'); 
			$t2 = $objArr[3];
			$date1=date_create("$t1");
			$date2=date_create("$t2");
			$diff=date_diff($date1,$date2);
			$date11 = $diff->format("%R%a");
			$date12 = (int)$date11;
			
			$result_mac = trim($objArr[0]);
			$mac_query = "SELECT * FROM `class4` WHERE `hw` = '".$result_mac."'";
			$checkMac = mysql_query("$mac_query");
			
			$result_name = trim($objArr[1]);
			$name_query = "SELECT * FROM `class4` WHERE `name` = '".$result_name."'";
			$checkName = mysql_query("$name_query");
			
			$result_ip = trim($objArr[2]);
			$ip_query = "SELECT * FROM `class4` WHERE `ip` = '".$result_ip."'";
			$checkIP = mysql_query("$ip_query");

	        $a=fopen("macAddress_add.txt", "w");
	        fwrite($a,$objArr[0]);
	        fclose($a);

	        $result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/macAddress_add.txt");
	        $result1 = trim($result);
	        $numCharecter=strlen($result1);

	        $b=fopen("macAddress_add1.txt", "w");
	        fwrite($b,$numCharecter);
	        fclose($b);

	        $a = '\'s/[[:xdigit:]]\{2\}/&:/g\'';
	        $b = '\'$s/.$//\'';
	        $result_mac = shell_exec("sed -e $a -e $b /var/www/html/oak2/macAddress_add1.txt");

	        $c=fopen("macAddress_add2.txt", "w");
	        fwrite($c,$result_mac);
	        fclose($c);
			
	        $ip_cur_long = ip2long($objArr[2]);

			if($date12 < 0)
			{
				$statusQuery = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' check date\n';

			}
			if(mysql_num_rows($checkMac) > 0)
			{
				$statusQuery2 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' MAC Address exists already\n';
			}
			if(mysql_num_rows($checkName) > 0)
			{
				$statusQuery3 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' Name exists already\n';
			}
			if(mysql_num_rows($checkIP) > 0)
			{
				$statusQuery4 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' IP Address exists already\n';
			}
			if(preg_match("/^[a-fA-F0-9]+$/", $result) == 0)
			{
				$statusQuery5 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' Change MAC Address between 00:00:00:00:00:00-FF:FF:FF:FF:FF:FF\n';
			}
			if(preg_match("/^[a-zA-Z0-9]+$/", $objArr[1]) == 0)
			{
				$statusQuery6 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' Name can have only A-Z a-z 0-9\n';
			}
			if($ip_cur_long<$ip_start_long or $ip_cur_long>$ip_end_long)
			{
				$statusQuery7 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' IP Address in Class '.$class.' is between '.$ip_start.'-'.$ip_end.'\n';
			}
			if(empty($ip_cur_long))
			{
				$statusQuery8 = FALSE;
				$texttoalert = $texttoalert.'At line '.$line.' Check IP Address\n';
			}

			if($statusQuery && $statusQuery2 && $statusQuery3 && $statusQuery4 && $statusQuery5 && $statusQuery6 && $statusQuery7 && $statusQuery8)
			{
				$strSQL = "INSERT INTO `dhcp`.`class4` (hw,name,ip,expire) VALUES ('$objArr[0]','$objArr[1]','$objArr[2]','$objArr[3]')";
				$objQuery = mysql_query($strSQL);
				if (!$objQuery) 
				{
					$texttoalert = die(mysql_error());
					alertBox($texttoalert);
				}
			}
			else
			{
				alertBox($texttoalert);
			}
		}
		shell_exec("/var/www/html/oak2/manage_dhcp.rb");
		mysql_close($con);
		fclose($objCSV);
		backalertBox();
	}
?>
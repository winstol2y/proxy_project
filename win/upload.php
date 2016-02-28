<html>
<head>
<title>upload csv</title>
</head>
<body>

<?php
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objConnect = mysql_connect("localhost","root","qwerty") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("dhcp");

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$t1 = date('d-m-Y'); //time now
	$t2 = $objArr[4];
	$date1=date_create("$t1");
	$date2=date_create("$t2");
	$diff=date_diff($date1,$date2);
	$date11 = $diff->format("%R%a");
	$date12 = (int)$date11;
	
	$result_mac = trim($objArr[0]);
	$mac_query = "SELECT * FROM `ipv4` WHERE `hw` = '".$result_mac."'";
	$checkMac = mysql_query("$mac_query");
	
	$result_name = trim($objArr[2]);
	$name_query = "SELECT * FROM `ipv4` WHERE `name` = '".$result_name."'";
	$checkName = mysql_query("$name_query");
	
	$result_ip = trim($objArr[3]);
	$ip_query = "SELECT * FROM `ipv4` WHERE `ip` = '".$result_ip."'";
	$checkIP = mysql_query("$ip_query");

	$a=fopen("macAddress_add.txt", "w");
	fwrite($a,$objArr[0]);
	fclose($a);
	
	$result = shell_exec("sed -e 's/[[:punct:]]//g' -e 's/[[:space:]]//g' /var/www/html/oak2/macAddress_add.txt");
	
	if($date12 < 0){
		echo "$objArr[0],$objArr[1],$objArr[2],$objArr[3] : date<br/><br/>";
	}
	elseif(mysql_num_rows($checkMac) > 0){
		echo "$objArr[0],$objArr[1],$objArr[2],$objArr[3] : Mac Address exists already.<br/><br/>";
	}
	elseif(mysql_num_rows($checkName) > 0){
		echo "$objArr[0],$objArr[1],$objArr[2],$objArr[3] : Name exists already.<br/><br/>";
	}
	elseif(mysql_num_rows($checkIP) > 0){
		echo "$objArr[0],$objArr[1],$objArr[2],$objArr[3] : IP address exists already.<br/><br/>";
	}
	elseif(preg_match("/^[a-fA-F0-9]+$/", $result) == 0){
	        echo "$objArr[0] : Please check macaddress between A-F, a-f, 0-9";
	}
	elseif(preg_match("/^[a-zA-Z0-9]+$/", $objArr[1]) == 0){
	        echo "$objArr[1] : Change name";
	}  
	else{	
		$strSQL = "INSERT INTO `dhcp`.`class1`";
		$strSQL .="(hw,name,ip,expire)";
		$strSQL .="VALUES ";
		$strSQL .="('$objArr[0]','$objArr[1]','$objArr[2]','$objArr[3]') ";
		$objQuery = mysql_query($strSQL);
	}
}
fclose($objCSV);

//shell_exec("./test.rb");
//shell_exec("./service_isc_restart.sh");
header('Location: dhcp_class1.php');
?>
<button onclick="window.location.href='http://158.108.207.113/oak2/dhcp_class1.php'">BACK</button>
</table>
</body>
</html>

<html>
<head>
<title>upload csv</title>
</head>
<body>

<?php
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
$objConnect = mysql_connect("localhost","root","qwerty") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("dhcp");
if (empty($_FILES["fileCSV"]["tmp_name"]))
{
	echo "Please Input CSV file";
}
else
{
$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$t1 = date('d-m-Y'); //time now
	$t2 = $objArr[3];
	$date1=date_create("$t1");
	$date2=date_create("$t2");
	$diff=date_diff($date1,$date2);
	$date11 = $diff->format("%R%a");
	$date12 = (int)$date11;
	
	$result_mac = trim($objArr[0]);
	$mac_query = "SELECT * FROM `class1` WHERE `hw` = '".$result_mac."'";
	$checkMac = mysql_query("$mac_query");
	
	$result_name = trim($objArr[1]);
	$name_query = "SELECT * FROM `class1` WHERE `name` = '".$result_name."'";
	$checkName = mysql_query("$name_query");
	
	$result_ip = trim($objArr[2]);
	$ip_query = "SELECT * FROM `class1` WHERE `ip` = '".$result_ip."'";
	$checkIP = mysql_query("$ip_query");

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
	else{	
		$strSQL = "INSERT INTO class1 ";
		$strSQL .="(hw,name,ip,expire)";
		$strSQL .="VALUES ";
		$strSQL .="('$objArr[0]','$objArr[1]','$objArr[2]','$objArr[3]') ";
		$objQuery = mysql_query($strSQL);
	}
}
fclose($objCSV);
}


//shell_exec("./test.rb");
//shell_exec("./service_isc_restart.sh");
//header('Location: index.php');
?>
<button onclick="window.location.href='/oak2/dhcp_class1.php'">BACK</button>
</table>
</body>
</html>

<?
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c) or die("�������ö��ҹ������ $dbname ��");
$getUsers = mysql_query('Select *,count(domain) AS count from report where domain != "" GROUP BY domain  ORDER BY count DESC')or die (mysql_error()) ;
$user_info = mysql_fetch_array($getUsers)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="template3.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SQUID</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-attachment:fixed;
	background-image: url();
	background-repeat: repeat-x;
	background-color: #333;
}
-->
</style>
<script src="SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="806" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="template_06.gif" width="1024" height="78" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#4D9473">&nbsp;</td>
  </tr>
  <tr>
    <td width="124" rowspan="2" align="left" valign="top" bgcolor="#4C4C4C"><!-- InstanceBeginEditable name="Menu" -->
      <ul id="MenuBar1" class="MenuBarVertical">
        <li><a href="main.php">MAIN</a></li>
        <li><a href="#" class="MenuBarItemSubmenu">Domain</a>
          <ul>
<?php 
do {
?>
<li><a href="domain.php?domain_n=<? echo $user_info['domain']; ?>">

<?php echo $user_info['domain']; ?></a>

<?php
	  } while ($user_info = mysql_fetch_assoc($getUsers))
?>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Graph</a>
		 <ul>
            <li><a href="graph1.php">domain graph</a></li>
            <li><a href="graph3.php">traffic graph 1</a></li>
            <li><a href="graph4.php">traffic graph 2</a></li>
          </ul>
		</li>
		<li><a href="#" class="MenuBarItemSubmenu">Search</a>
		  <ul>
			<li><a href="searchurl.php">URL</a></li>
            <li><a href="searchip.php">IP</a></li>
			<li><a href="searchdate-date.php">Date To Date</a></li>
			<li><a href="searchdate&time.php">Date & Time</a></li>
		        </li>
      </ul>
    <!-- InstanceEndEditable --></td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" -->
<table align = "left"  border="1" cellpadding="0" cellspacing="0">

<tr>
<th>id</th>
<th>date</th>
<th>time</th>
<th>duration</th>
<th>client_address</th>
<th>result_codes</th>
<th>bytes</th>
<th>request_method</th>
<th>URL</th>
<th>URL.</th>
<th>domain</th>
<th>rfc931</th>
<th>hierarchy_code</th>
<th>type</th>
</tr> 
<?



$strSQL = mysql_db_query($dbname,"SELECT * from report ORDER BY date")or die('Error select');

$day = array();
$datetime = array();
$date = array();
$timestemp = array();
$duration = array();
$client_address = array();
$result_codes = array();
$bytes = array();
$request_method = array();
$url = array();
$urlmain = array();
$domain = array();
$rfc931 = array();
$hierarchy_code = array();
$type = array();

$strSQL1 = mysql_db_query($dbname,"TRUNCATE TABLE log")or die("????????????? ???");

while($objResult = mysql_fetch_array($strSQL))
{


$day=$objResult['day'];
$datetime=$objResult['datetime'];
$date=$objResult['date'];
$timestemp=$objResult['times'];
$duration=$objResult['duration'];
$client_address=$objResult['client_address'];
$result_codes=$objResult['result_codes'];
$bytes=$objResult['bytes'];
$request_method=$objResult['request_method'];
$url=$objResult['url'];
$urlmain=$objResult['urlmain'];
$domain=$objResult['domain'];
$rfc931=$objResult['rfc931'];
$hierarchy_code=$objResult['hierarchy_code'];
$type=$objResult['type'];

$strSQL1 = mysql_db_query($dbname,"INSERT INTO log (day,datetime,date,times,duration,client_address,result_codes,bytes,request_method,url,urlmain,domain,rfc931,hierarchy_code,type) VALUES ('$day','$datetime','$date','$timestemp','$duration','$client_address','$result_codes','$bytes','$request_method','$url','$urlmain','$domain','$rfc931','$hierarchy_code','$type')")or die(mysql_error()) ;



}
//$strSQL1 = mysql_db_query($dbname,"INSERT INTO log (day,datetime) VALUES ('$day','$datetime')")or die(mysql_error()) ;



$strSQL1 = mysql_db_query($dbname,"SELECT * from log ORDER BY date")or die(mysql_error()) ;
while($objResult = mysql_fetch_array($strSQL1))
{
?>



<tr>
<td><div align="center"><?=$objResult['id'];?></div></td>
<td><div align="center"><?=$objResult['date'];?></div></td>
<td><div align="center"><?=$objResult['times'];?></div></td>
<td><div align="center"><?=$objResult['duration'];?></div></td>
<td><div align="center"><?=$objResult['client_address'];?></div></td>
<td><div align="center"><?=$objResult['result_codes'];?></div></td>
<td><div align="center"><?=$objResult['bytes'];?></div></td>
<td><div align="center"><?=$objResult['request_method'];?></div></td>
<td><div align="center"><?=$objResult['url'];?></div></td>
<td><div align="center"><?=$objResult['urlmain'];?></div></td>
<td><div align="center"><?=$objResult['domain'];?></div></td>
<td><div align="center"><?=$objResult['rfc931'];?></div></td>
<td><div align="center"><?=$objResult['hierarchy_code'];?></div></td>
<td><div align="center"><?=$objResult['type'];?></div></td>
</tr>

<?

}

		
?>
</table>
<!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
<!-- InstanceEnd --></html>
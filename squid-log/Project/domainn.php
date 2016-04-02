<?php
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c);
$getUsers = mysql_query('Select *,count(domain) AS count from report GROUP BY domain  ORDER BY count DESC')or die (mysql_error()) ;
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
<li><a href="com.php?domain_n=<? echo $user_info['domain']; ?>">

<?php echo $user_info['domain']; ?></a>

<?php
	  } while ($user_info = mysql_fetch_assoc($getUsers))
?>


          </ul>
        </li>
        <li><a href="graph1.php">Graph</a></li>
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
<?

?>

<table width="839" border="1" cellpadding="0" cellspacing="0">
<tr>
<th>No.</th>
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
$strSQL = mysql_db_query($dbname,"SELECT * from report")or die('Error select');

while($objResult = mysql_fetch_array($strSQL))
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
<?
$test1=$_POST["test1"];
print_r ($user_info);
?>
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
<?
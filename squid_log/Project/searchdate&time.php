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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template3.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<script src="../index/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../index/SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="806" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="../index/template_06.gif" width="1024" height="78" /></td>
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
		    </ul>    
		  </li>
      </ul>
    <!-- InstanceEndEditable --></td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" --><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**</title>
</head>
<body>
<table width="600" border="1" align="left" cellpadding="0" cellspacing="0">
<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?//----------------------------------------------------------------------------------------?>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// á·Ã¡â¤éµ jquery
	$("#dateInput1").datepicker({ dateFormat: 'yy-mm-dd'});
	$("#dateInput2").datepicker({ dateFormat: 'yy-mm-dd'});
	         });
</script>
<style type="text/css">
.ui-datepicker{
	width:150px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
             }
</style>
<?//----------------------------------------------------------------------------------------?>
<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <tr style="text-align:center">
      <th>
	    Date<input type="text" name="dateInput1" id="dateInput1" value="<?=$_GET["dateInput1"];?>" autocomplete="off" /><br></br>
        Time
  <select name="lmName1">
	<option value="00:00">00 : 00</option>
    <option value="00:30">00 : 30</option>
	<option value="01:00">01 : 00</option>
    <option value="01:30">01 : 30</option>	
	<option value="02:00">02 : 00</option>
    <option value="02:30">02 : 30</option>
	<option value="03:00">03 : 00</option>
    <option value="03:30">03 : 30</option>
	<option value="04:00">04 : 00</option>
    <option value="04:30">04 : 30</option>
	<option value="05:00">05 : 00</option>
    <option value="05:30">05 : 30</option>
	<option value="06:00">06 : 00</option>
    <option value="06:30">06 : 30</option>
	<option value="07:00">07 : 00</option>
    <option value="07:30">07 : 30</option>
	<option value="08:00">08 : 00</option>
    <option value="08:30">08 : 30</option>
	<option value="09:00">09 : 00</option>
    <option value="09:30">09 : 30</option>
	<option value="10:00">10 : 00</option>
    <option value="10:30">10 : 30</option>
	<option value="11:00">11 : 00</option>
    <option value="11:30">11 : 30</option>
	<option value="12:00">12 : 00</option>
    <option value="12:30">12 : 30</option>
	<option value="13:00">13 : 00</option>
    <option value="13:30">13 : 30</option>
	<option value="14:00">14 : 00</option>
    <option value="14:30">14 : 30</option>
	<option value="15:00">15 : 00</option>
    <option value="15:30">15 : 30</option>
	<option value="16:00">16 : 00</option>
    <option value="16:30">16 : 30</option>
	<option value="17:00">17 : 00</option>
    <option value="17:30">17 : 30</option>
	<option value="18:00">18 : 00</option>
    <option value="18:30">18 : 30</option>
	<option value="19:00">19 : 00</option>
    <option value="19:30">19 : 30</option>
	<option value="20:00">20 : 00</option>
    <option value="20:30">20 : 30</option>
	<option value="21:00">21 : 00</option>
    <option value="21:30">21 : 30</option>
	<option value="22:00">22 : 00</option>
    <option value="22:30">22 : 30</option>
	<option value="23:00">23 : 00</option>
    <option value="23:30">23 : 30</option>
  </select>
		To
        Time
    <select name="lmName2">
	<option value="00:00">00 : 00</option>
    <option value="00:30">00 : 30</option>
	<option value="01:00">01 : 00</option>
    <option value="01:30">01 : 30</option>	
	<option value="02:00">02 : 00</option>
    <option value="02:30">02 : 30</option>
	<option value="03:00">03 : 00</option>
    <option value="03:30">03 : 30</option>
	<option value="04:00">04 : 00</option>
    <option value="04:30">04 : 30</option>
	<option value="05:00">05 : 00</option>
    <option value="05:30">05 : 30</option>
	<option value="06:00">06 : 00</option>
    <option value="06:30">06 : 30</option>
	<option value="07:00">07 : 00</option>
    <option value="07:30">07 : 30</option>
	<option value="08:00">08 : 00</option>
    <option value="08:30">08 : 30</option>
	<option value="09:00">09 : 00</option>
    <option value="09:30">09 : 30</option>
	<option value="10:00">10 : 00</option>
    <option value="10:30">10 : 30</option>
	<option value="11:00">11 : 00</option>
    <option value="11:30">11 : 30</option>
	<option value="12:00">12 : 00</option>
    <option value="12:30">12 : 30</option>
	<option value="13:00">13 : 00</option>
    <option value="13:30">13 : 30</option>
	<option value="14:00">14 : 00</option>
    <option value="14:30">14 : 30</option>
	<option value="15:00">15 : 00</option>
    <option value="15:30">15 : 30</option>
	<option value="16:00">16 : 00</option>
    <option value="16:30">16 : 30</option>
	<option value="17:00">17 : 00</option>
    <option value="17:30">17 : 30</option>
	<option value="18:00">18 : 00</option>
    <option value="18:30">18 : 30</option>
	<option value="19:00">19 : 00</option>
    <option value="19:30">19 : 30</option>
	<option value="20:00">20 : 00</option>
    <option value="20:30">20 : 30</option>
	<option value="21:00">21 : 00</option>
    <option value="21:30">21 : 30</option>
	<option value="22:00">22 : 00</option>
    <option value="22:30">22 : 30</option>
	<option value="23:00">23 : 00</option>
    <option value="23:30">23 : 30</option>
  </select>
		
        <input name="submit" type="submit" value="Search" />
        </th>
    </tr>
  </form>
<p>
  <?


if(($_GET["dateInput1"]) != "" && ($tm1 = $_GET["lmName1"]) <= ($tm1 = $_GET["lmName2"]))
{
$dateInput1 = $_GET["dateInput1"];
$tm1 = $_GET["lmName1"];
$tm2 = $_GET["lmName2"];

$strSQL = "SELECT  * FROM report WHERE (date = '$dateInput1')AND (times  between '$tm1' AND '$tm2')ORDER By datetime";

//$strSQL = "SELECT  * FROM domain WHERE date BETWEEN '$dateInput1' AND '$dateInput1' "; //AND '".$_GET["dateInput2"]."'" //AND  times  between '".$_GET["txtKeyword1"]."' AND 

//$strSQL = "SELECT  * FROM domain WHERE times  between ('".$_GET["txtKeyword1"]."') AND ('".$_GET["txtKeyword2"]."') IN (SELECT * FROM domain WHERE date between ('".$_GET["dateInput1"]."') AND ('".$_GET["dateInput2"]."')";
/*$strSQL = "SELECT  * FROM domain WHERE 
(
times between '".$_GET["txtKeyword1"]."' AND '".$_GET["txtKeyword2"]."'
)
AND
(
date between '".$_GET["dateInput1"]."' AND '".$_GET["dateInput2"]."'
)";*/
//$strSQL = "SELECT  * FROM domain Where DATE_FORMAT(date,'%Y/%m/%d') BETWEEN '".$_GET["dateInput1"]."' AND '".$_GET["dateInput2"]."' AND DATE_FORMAT(times,'%H.%i')  between '".$_GET["txtKeyword1"]."' AND '".$_GET["txtKeyword2"]."'";

//$strSQL = "SELECT  * FROM domain Where (date between 'DATE_FORMAT('".$_GET["dateInput1"]."','%d/%m/%Y') AND  'DATE_SUB(DATE_ADD(DATE_FORMAT('".$_GET["dateInput2"]."','%d/%m/%Y'),interval 1 month),interval 1 day)')";

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
</p>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Date </div></th>
    <th width="91"> <div align="center">Time </div></th>
    <th width="98"> <div align="center">ip address </div></th>
    <th width="98"> <div align="center">URL </div></th>
  </tr>
  <?


while($objResult = mysql_fetch_array($objQuery))
{
?>

  <tr>
    <td><div align="center">
      <?=$objResult["date"];?>
    </div></td>
    <td><div align="center">
      <?=$objResult["times"];?>
    </div></td>
    <td><div align="center">
      <?=$objResult["client_address"];?>
    </div></td>
    <td><div align="center">
      <?=$objResult["urlmain"];?>
    </div></td>
  </tr>
  <?
}
?>
</table>
<?
}
?>
    </body>
</html>










</table>
</body>
</html>
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
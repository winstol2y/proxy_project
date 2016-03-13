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
            <li><a href="com.php">COM</a></li>
            <li><a href="net.php">NET</a></li>
            <li><a href="co.php">CO</a></li>
            <li><a href="in.php">IN</a></li>
            <li><a href="or.php">OR</a></li>
            <li><a href="ac.php">AC</a></li>
            <li><a href="go.php">GO</a></li>
            <li><a href="mi.php">MI</a></li>
            <li><a href="etc.php">ETC</a></li>
          </ul>
        </li>
        <li><a href="graph1.php">Graph</a></li>
				<li><a href="#" class="MenuBarItemSubmenu">Search</a>
		  <ul>
			<li><a href="searchurl.php">URL</a></li>
            <li><a href="searchip.php">IP</a></li>
		        </li>
		  </ul>
      </ul>
    <!-- InstanceEndEditable --></td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" --><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**</title>
</head>
<body>
<table width="800" border="1" align="left" cellpadding="0" cellspacing="0">
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
	$("#dateInput1").datepicker({ dateFormat: 'yy/mm/dd'});
	$("#dateInput2").datepicker({ dateFormat: 'yy/mm/dd'});
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
	    Date<input type="text" name="dateInput1" id="dateInput1" value="<?=$_GET["dateInput1"];?>" />
        Time<input name="txtKeyword1" type="text" id="txtKeyword1" value="<?=$_GET["txtKeyword1"];?>" />
        To
		Date<input type="text" name="dateInput2" id="dateInput2" value="<?=$_GET["dateInput2"];?>" />
        Time<input name="txtKeyword2" type="text" id="txtKeyword2" value="<?=$_GET["txtKeyword2"];?>" />
        <input name="submit" type="submit" value="Search" />
        </th>
    </tr>
  </form>
<p>
  <?
if(($_GET["txtKeyword1"]) != "")
{
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("logfiles");
// Search By Name or Email
$dateInput1 = $_GET["dateInput1"];
$dateInput2 = $_GET["dateInput2"];
$txtKeyword1 = $_GET["txtKeyword1"];
$txtKeyword2 = $_GET["txtKeyword2"];

echo $dateInput1,$txtKeyword1;
//$strSQL = "SELECT  * FROM domain WHERE (date = '$dateInput1' AND times = '$txtKeyword1') AND (date = '$dateInput2' AND times = '$txtKeyword2')";


//$strSQL = "SELECT  * FROM domain WHERE (date = '".$_GET["dateInput1"]."')AND (times  between '".$_GET["txtKeyword1"]."' AND '".$_GET["txtKeyword2"]."')";

$strSQL = "SELECT  * FROM domain WHERE (date BETWEEN '$dateInput1' AND '$dateInput1')  ORDER BY (times  between '".$_GET["txtKeyword1"]."' AND '".$_GET["dateInput2"]."')"; 

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
mysql_close($objConnect);
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
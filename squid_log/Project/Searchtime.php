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
      </ul>
    <!-- InstanceEndEditable --></td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" --><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**</title>
</head>
<body>
<table width="500" border="1" align="left" cellpadding="0" cellspacing="0">
   


<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
    <tr style="text-align:center">
      <th><p>Time
        <input name="txtKeyword1" type="text" id="txtKeyword1" value="<?=$_GET["txtKeyword1"];?>" />
        to
        <input name="txtKeyword2" type="text" id="txtKeyword2" value="<?=$_GET["txtKeyword2"];?>" />
        <input name="submit" type="submit" value="Search" />
      </p>
        </th>
    
	
       
       
    </tr>
  </form>
<p>
  <?
if(($_GET["txtKeyword1"]&&$_GET["txtKeyword2"]) != "")
{
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("logfiles");
// Search By Name or Email

$strSQL = "SELECT  * FROM report WHERE times  between '".$_GET["txtKeyword1"]."' AND '".$_GET["txtKeyword2"]."'"; 

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
</p>
<table width="600" border="1">
  <tr>
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








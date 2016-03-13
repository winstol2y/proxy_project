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
			<li><a href="searchdate-date.php">Date To Date</a></li>
			<li><a href="searchdate&time.php">Date & Time</a></li>
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
<table width="300" border="1" align="center" cellpadding="2" cellspacing="0">
   
     <?

$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c) or die("ไม่สามารถใช้ฐานข้อมูล $dbname ได้");
?>
     <?php


//$query = "SELECT id, domain, url FROM logfiles";
$getUsers = mysql_query('Select *,count(urlmain) AS count from report GROUP BY urlmain ORDER BY count DESC')or die (mysql_error()) ;
if (mysql_num_rows($getUsers) == 0 ){

echo "NO any user.";
} else {
	while($user_info = mysql_fetch_array($getUsers)){
    
	if($user_info['domain']=="mi")
		{    
         
		?><tr><?
		?><td style="text-align:center"><? print_r($user_info['urlmain']);echo" [ ";print_r($user_info['count']);echo" ] "; ?></td><?
		?></tr><?
		 
		     
        }
	
		 /*echo "<pre>"; 
		 print_r($user_info);
		 echo "</pre>";
		*/
		 
    }   
}

 
              
?>
   
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
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
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" -->

<html>
<head>
    <title>***</title>
    <script type="text/javascript" src="lib/amcolumn/swfobject.js"></script>
</head>
<body>
<?
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c) or die("????????????????? $dbname ");


?> 
<?
$type = array();
$numType = array();
$sql = mysql_db_query($dbname,'Select *,count(urlmain) AS count from report GROUP BY urlmain order by count DESC')or die('Error conndting to mysql');
			
	                while($result = mysql_fetch_array($sql))
						{
		           //echo  $result['type']." : ".$result['count']."<br>";
				   array_push($type,$result['urlmain']);
				   array_push($numType,$result['count']);
				        }
if(count($numType) > 10 )
{
$strTotal = 0;
for($i=0;$i<=count($numType);$i++)
{
$strTotal = $strTotal + $numType[10+$i];
}
?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart;
	var legend;

            var chartData = 
				[
			{  
				web: "<?=$type[0]?>",
                value: <?=$numType[0]?>
            },
               {
               web: "<?=$type[1]?>",
                value: <?=$numType[1]?>
            }, {
                web: "<?=$type[2]?>",
                value: <?=$numType[2]?>
            }, {
                web: "<?=$type[3]?>",
                value: <?=$numType[3]?>
            }, {
                web: "<?=$type[4]?>",
                value: <?=$numType[4]?>
            }, {
                web: "<?=$type[5]?>",
                value: <?=$numType[5]?>
            }, {
                web: "<?=$type[6]?>",
                value: <?=$numType[6]?>
            }, {
                web: "<?=$type[7]?>",
                value: <?=$numType[7]?>
            }, {
                web: "<?=$type[8]?>",
                value: <?=$numType[8]?>
            }, {
                web: "<?=$type[9]?>",
                value: <?=$numType[9]?>
            }, {
                web: "<?='ETC'?>",
                value: <?=$strTotal?>
            }
				];

	AmCharts.ready(function () {
		// PIE CHART
		chart = new AmCharts.AmPieChart();
		chart.dataProvider = chartData;
		chart.titleField = "web";
		chart.valueField = "value";
		chart.outlineColor = "#FFFFFF";
		chart.outlineAlpha = 0.8;
		chart.outlineThickness = 2;
		// this makes the chart 3D
		chart.depth3D = 15;
		chart.angle = 30;

		// WRITE
		chart.write("chartdiv");
	});
</script>
<div id="chartdiv" style="width: 120%; height: 480px;"></div>
 
<?}

if(count($numType) == 10 )
{
?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart;
	var legend;

            var chartData = 
				[
			{   web: "<?=$type[0]?>",
                value: <?=$numType[0]?>
            },
            {   web: "<?=$type[1]?>",
                value: <?=$numType[1]?>
            }, {
                web: "<?=$type[2]?>",
                value: <?=$numType[2]?>
            }, {
                web: "<?=$type[3]?>",
                value: <?=$numType[3]?>
            }, {
                web: "<?=$type[4]?>",
                value: <?=$numType[4]?>
            }, {
                web: "<?=$type[5]?>",
                value: <?=$numType[5]?>
            }, {
                web: "<?=$type[6]?>",
                value: <?=$numType[6]?>
            }, {
                web: "<?=$type[7]?>",
                value: <?=$numType[7]?>
            }, {
                web: "<?=$type[8]?>",
                value: <?=$numType[8]?>
            }, {
                web: "<?=$type[9]?>",
                value: <?=$numType[9]?>
            }
				];

	AmCharts.ready(function () {
		// PIE CHART
		chart = new AmCharts.AmPieChart();
		chart.dataProvider = chartData;
		chart.titleField = "web";
		chart.valueField = "value";
		chart.outlineColor = "#FFFFFF";
		chart.outlineAlpha = 0.8;
		chart.outlineThickness = 2;
		// this makes the chart 3D
		chart.depth3D = 15;
		chart.angle = 30;

		// WRITE
		chart.write("chartdiv");
	});
</script>
<div id="chartdiv" style="width: 120%; height: 480px;"></div>
 
<?}
if(count($numType) < 10 )
{
$strTotal = 0;
for($i=0;$i<=count($numType);$i++)
{
$strTotal = $strTotal + $numType[5+$i];
}
?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart;
	var legend;

            var chartData = 
				[
			{   web: "<?=$type[0]?>",
                value: <?=$numType[0]?>
            },
            {   web: "<?=$type[1]?>",
                value: <?=$numType[1]?>
            }, {
                web: "<?=$type[2]?>",
                value: <?=$numType[2]?>
            }, {
                web: "<?=$type[3]?>",
                value: <?=$numType[3]?>
            }, {
                web: "<?=$type[4]?>",
                value: <?=$numType[4]?>
            }, {
                web: "<?='ETC'?>",
                value: <?=$strTotal?>
            }
				];

	AmCharts.ready(function () {
		// PIE CHART
		chart = new AmCharts.AmPieChart();
		chart.dataProvider = chartData;
		chart.titleField = "web";
		chart.valueField = "value";
		chart.outlineColor = "#FFFFFF";
		chart.outlineAlpha = 0.8;
		chart.outlineThickness = 2;
		// this makes the chart 3D
		chart.depth3D = 15;
		chart.angle = 30;

		// WRITE
		chart.write("chartdiv");
	});
</script>
<div id="chartdiv" style="width: 120%; height: 480px;"></div>
 
<?}?>
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
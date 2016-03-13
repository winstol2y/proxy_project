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
        <li><a href="#">MAIN</a></li><li><a href="#" class="MenuBarItemSubmenu">Domain</a>
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
            <li><a href="graph2.php">traffic graph 1</a></li>
            <li><a href="graph3.php">traffic graph 2</a></li>
            <li><a href="graph4.php">traffic graph 3</a></li>
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
    

</head>
<body>
<?//----------------------------------------------------------------------------------------?>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// ???????? jquery
	$("#dateInput1").datepicker({ dateFormat: 'yy/mm/dd'});
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
	    Date<input type="text" name="dateInput1" id="dateInput1" value="<?=$_GET["dateInput1"];?>" autocomplete="off" />      
        <input name="submit" type="submit" value="Search" />
  </form>
<?
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c) or die("?? $dbname ");
?>

<?
$dateInput1 = $_GET["dateInput1"];

$numbyte0 = array();
$numbyte1 = array();
$numbyte2 = array();
$numbyte3 = array();
$numbyte4 = array();
$numbyte5 = array();
$numbyte6 = array();
$numbyte7 = array();
$numbyte8 = array();
$numbyte9 = array();
$numbyte10 = array();
$numbyte11 = array();
$numbyte12 = array();
$numbyte13 = array();
$numbyte14 = array();
$numbyte15 = array();
$numbyte16 = array();
$numbyte17 = array();
$numbyte18 = array();
$numbyte19 = array();
$numbyte20 = array();
$numbyte21 = array();
$numbyte22 = array();
$numbyte23 = array();

$s0 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '00.00' and '00.59') ")or die('Error conndting to mysql');
$s1 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '01.00' and '01.59') ")or die('Error conndting to mysql');
$s2 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '02.00' and '02.59') ")or die('Error conndting to mysql');
$s3 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '03.00' and '03.59') ")or die('Error conndting to mysql');
$s4 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '04.00' and '04.59') ")or die('Error conndting to mysql');
$s5 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '05.00' and '05.59') ")or die('Error conndting to mysql');
$s6 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '06.00' and '06.59') ")or die('Error conndting to mysql');
$s7 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '07.00' and '07.59') ")or die('Error conndting to mysql');
$s8 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '08.00' and '08.59') ")or die('Error conndting to mysql');
$s9 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '09.00' and '09.59') ")or die('Error conndting to mysql');
$s10 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '10.00' and '10.59') ")or die('Error conndting to mysql');
$s11 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '11.00' and '11.59') ")or die('Error conndting to mysql');
$s12 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '12.00' and '12.59') ")or die('Error conndting to mysql');
$s13 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '13.00' and '13.59') ")or die('Error conndting to mysql');
$s14 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '14.00' and '14.59') ")or die('Error conndting to mysql');
$s15 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '15.00' and '15.59') ")or die('Error conndting to mysql');
$s16 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '16.00' and '16.59') ")or die('Error conndting to mysql');
$s17 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '17.00' and '17.59') ")or die('Error conndting to mysql');
$s18 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '18.00' and '18.59') ")or die('Error conndting to mysql');
$s19 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '19.00' and '19.59') ")or die('Error conndting to mysql');
$s20 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '20.00' and '20.59') ")or die('Error conndting to mysql');
$s21 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '21.00' and '21.59') ")or die('Error conndting to mysql');
$s22 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '22.00' and '22.59') ")or die('Error conndting to mysql');
$s23 = mysql_db_query($dbname,"Select sum(bytes) AS sum from  report  WHERE (date = '$dateInput1') and (times between '23.00' and '23.59') ")or die('Error conndting to mysql');


while($result0 = mysql_fetch_array($s0))
						{
				   array_push($numbyte0,$result0['sum']);
				   $byte0 = ($numbyte0[0]/1024);
                   $byte0 = number_format($byte0,2,'.','');
				        }

while($result1 = mysql_fetch_array($s1))
						{
				   array_push($numbyte1,$result1['sum']);
				   $byte1 = ($numbyte1[0]/1024);
                   $byte1 = number_format($byte1,2,'.','');
				        }

 while($result2 = mysql_fetch_array($s2))
						{
				   array_push($numbyte2,$result2['sum']);
				   $byte2 = ($numbyte2[0]/1024);
                   $byte2 = number_format($byte2,2,'.','');
				        }

 while($result3 = mysql_fetch_array($s3))
						{
				   array_push($numbyte3,$result3['sum']);
				   $byte3 = ($numbyte3[0]/1024);
                   $byte3 = number_format($byte3,2,'.','');
				        }

 while($result4 = mysql_fetch_array($s4))
						{
				   array_push($numbyte4,$result4['sum']);
				   $byte4 = ($numbyte4[0]/1024);
                   $byte4 = number_format($byte4,2,'.','');
				        }

 while($result5 = mysql_fetch_array($s5))
						{
				   array_push($numbyte5,$result5['sum']);
				   $byte5 = ($numbyte5[0]/1024);
                   $byte5 = number_format($byte5,2,'.','');
				        }

 while($result6 = mysql_fetch_array($s6))
						{
				   array_push($numbyte6,$result6['sum']);
				   $byte6 = ($numbyte6[0]/1024);
                   $byte6 = number_format($byte6,2,'.','');
				        }

 while($result7 = mysql_fetch_array($s7))
						{
				   array_push($numbyte7,$result7['sum']);
				   $byte7 = ($numbyte7[0]/1024);
                   $byte7 = number_format($byte7,2,'.','');
				        }

 while($result8 = mysql_fetch_array($s8))
						{
				   array_push($numbyte8,$result8['sum']);
				   $byte8 = ($numbyte8[0]/1024);
                   $byte8 = number_format($byte8,2,'.','');
				        }
						
 while($result9 = mysql_fetch_array($s9))
						{
				   array_push($numbyte9,$result9['sum']);
				   $byte9 = ($numbyte9[0]/1024);
                   $byte9 = number_format($byte9,2,'.','');
				        }

 while($result10 = mysql_fetch_array($s10))
						{
				   array_push($numbyte10,$result10['sum']);
				   $byte10 = ($numbyte10[0]/1024);
                   $byte10 = number_format($byte10,2,'.','');
				        }

 while($result11 = mysql_fetch_array($s11))
						{
				   array_push($numbyte11,$result11['sum']);
				   $byte11 = ($numbyte11[0]/1024);
                   $byte11 = number_format($byte11,2,'.','');
				        }

 while($result12 = mysql_fetch_array($s12))
						{
				   array_push($numbyte12,$result12['sum']);
				   $byte12 = ($numbyte12[0]/1024);
                   $byte12 = number_format($byte12,2,'.','');
				        }

 while($result13 = mysql_fetch_array($s13))
						{
				   array_push($numbyte13,$result13['sum']);
				   $byte13 = ($numbyte13[0]/1024);
                   $byte13 = number_format($byte13,2,'.','');
				        }

 while($result14 = mysql_fetch_array($s14))
						{
				   array_push($numbyte14,$result14['sum']);
				   $byte14 = ($numbyte14[0]/1024);
                   $byte14 = number_format($byte14,2,'.','');
				        }

 while($result15 = mysql_fetch_array($s15))
						{
				   array_push($numbyte15,$result15['sum']);
				   $byte15 = ($numbyte15[0]/1024);
                   $byte15 = number_format($byte15,2,'.','');
				        }

 while($result16 = mysql_fetch_array($s16))
						{
				   array_push($numbyte16,$result16['sum']);
				   $byte16 = ($numbyte16[0]/1024);
                   $byte16 = number_format($byte16,2,'.','');
				        }

 while($result17 = mysql_fetch_array($s17))
						{
				   array_push($numbyte17,$result17['sum']);
				   $byte17 = ($numbyte17[0]/1024);
                   $byte17 = number_format($byte17,2,'.','');
				        }

 while($result18 = mysql_fetch_array($s18))
						{
				   array_push($numbyte18,$result18['sum']);
				   $byte18 = ($numbyte18[0]/1024);
                   $byte18 = number_format($byte18,2,'.','');
				        }

 while($result19 = mysql_fetch_array($s19))
						{
				   array_push($numbyte19,$result19['sum']);
				   $byte19 = ($numbyte19[0]/1024);
                   $byte19 = number_format($byte19,2,'.','');
				        }

 while($result20 = mysql_fetch_array($s20))
						{
				   array_push($numbyte20,$result20['sum']);
				   $byte20 = ($numbyte20[0]/1024);
                   $byte20 = number_format($byte20,2,'.','');
				        }

 while($result21 = mysql_fetch_array($s21))
						{
				   array_push($numbyte21,$result21['sum']);
				   $byte21 = ($numbyte21[0]/1024);
                   $byte21 = number_format($byte21,2,'.','');
				        }

 while($result22 = mysql_fetch_array($s22))
						{
				   array_push($numbyte22,$result22['sum']);
				   $byte22 = ($numbyte22[0]/1024);
                   $byte22 = number_format($byte22,2,'.','');
				        }

 while($result23 = mysql_fetch_array($s23))
						{
				   array_push($numbyte23,$result23['sum']);
				   $byte23 = ($numbyte23[0]/1024);
                   $byte23 = number_format($byte23,2,'.','');
				        }


if($dateInput1 != NULL)
	{

?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script type="text/javascript">


var chart;
var chartData = [{
    time: "00:00",
    
    data: <?=$byte0?>},
    
{
    time: "01:00",
    
    data: <?=$byte1?>},
{
    time: "02:00",
    
    data: <?=$byte2?>},
{
    time: "03:00",
    
    data: <?=$byte3?>},
{
    time: "04:00",
    
    data: <?=$byte4?>},
{
    time: "05:00",
    
    data: <?=$byte5?>},
{
    time: "06:00",
    
    data: <?=$byte6?>},
{
    time: "07:00",
    
    data: <?=$byte7?>},
{
    time: "08:00",
    
    data: <?=$byte8?>},
{
    time: "09:00",
    
    data: <?=$byte9?>},
{
    time: "10:00",
    
    data: <?=$byte10?>},
{
    time: "11:00",
    
    data: <?=$byte11?>},
{
    time: "12:00",
    
    data: <?=$byte12?>},
{
    time: "13:00",
    
    data: <?=$byte13?>},
{
    time: "14:00",
    
    data: <?=$byte14?>},
{
    time: "15:00",
    
    data: <?=$byte15?>},
{
    time: "16:00",
    
    data: <?=$byte16?>},
{
    time: "17:00",
    
    data: <?=$byte17?>},
{
    time: "18:00",
    
    data: <?=$byte18?>},
{
    time: "19:00",
    
    data: <?=$byte19?>},
{
    time: "20:00",
    
    data: <?=$byte20?>},
{
    time: "21:00",
    
    data: <?=$byte21?>},
{
    time: "22:00",
    
    data: <?=$byte22?>},
{
    time: "23:00",
    
    data: <?=$byte23?>}];

	
AmCharts.ready(function() {
    // SERIAL CHART
    chart = new AmCharts.AmSerialChart();
    
    chart.pathToImages = "http://www.amcharts.com/lib/images/";
    chart.zoomOutButton = {
        backgroundColor: '#000000',
        backgroundAlpha: 0.15
    };
    chart.dataProvider = chartData;
    chart.marginTop = 10;
    chart.autoMarginOffset = 3;
    chart.marginRight = 0;        
    chart.categoryField = "time";
	
    // AXES
    // Category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0.07;
    categoryAxis.axisColor = "#DADADA";
    categoryAxis.startOnAxis = true;
    categoryAxis.showLastLabel = false;
    categoryAxis.title = "Time";

    // Value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.stackType = "regular"; // this line makes the chart "stacked"
    valueAxis.gridAlpha = 0.07;
    valueAxis.title = "KB";
    chart.addValueAxis(valueAxis);

    // GUIDES are vertical (can also be horizontal) lines (or areas) marking some event.
    // first guide
    var guide1 = new AmCharts.Guide();
    guide1.category = "2001";
    guide1.lineColor = "#CC0000";
    guide1.lineAlpha = 1;
    guide1.dashLength = 2;
    guide1.inside = true;
    guide1.labelRotation = 90;
    guide1.label = "fines for speeding increased";
    categoryAxis.addGuide(guide1);

    // second guide
    var guide2 = new AmCharts.Guide();
    guide2.category = "2007";
    guide2.lineColor = "#CC0000";
    guide2.lineAlpha = 1;
    guide2.dashLength = 2;
    guide2.inside = true;
    guide2.labelRotation = 90;
    guide2.label = "Data";
    categoryAxis.addGuide(guide2);


    // GRAPHS
    
    graph = new AmCharts.AmGraph();
    graph.type = "line";
    graph.title = "Value";
    graph.valueField = "data";
    graph.lineAlpha = 1;
    graph.fillAlphas = 0.6;
    chart.addGraph(graph);

    // LEGEND
    var legend = new AmCharts.AmLegend();
    legend.position = "top";
    chart.addLegend(legend);

    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.zoomable = false; // as the chart displayes not too many values, we disabled zooming
    chartCursor.cursorAlpha = 0;
    chart.addChartCursor(chartCursor);

    // WRITE
    chart.write("chartdiv");
});
</script>

<div id="chartdiv" style="width: 100%; height: 300px;"></div>

<?php







$sumbyte = ($byte0+$byte1+$byte2+$byte3+$byte4+$byte5+$byte6+$byte7+$byte8+$byte9+$byte10+$byte11+$byte12+$byte13+$byte14+$byte15+$byte16+$byte17+$byte18+$byte19+$byte20+$byte21+$byte22+$byte23)/24;

$max = max($byte0+$byte1,$byte2,$byte3,$byte4,$byte5,$byte6,$byte7,$byte8,$byte9,$byte10,$byte11,$byte12,$byte13,$byte14,$byte15,$byte16,$byte17,$byte18,$byte19,$byte20,$byte21,$byte22,$byte23);

$min = min($byte0+$byte1,$byte2,$byte3,$byte4,$byte5,$byte6,$byte7,$byte8,$byte9,$byte10,$byte11,$byte12,$byte13,$byte14,$byte15,$byte16,$byte17,$byte18,$byte19,$byte20,$byte21,$byte22,$byte23);

 echo "Max : ",number_format($max,2,'.','')," KB";

 ?><br></br><?
 
 echo "Avg : ",number_format($sumbyte,2,'.','')," KB";

?><br></br><?

 echo "Min : ",number_format($min,2,'.','')," KB";


} 

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

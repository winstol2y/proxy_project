<html>
<head>
    <title>***</title>
    <script type="text/javascript" src="lib/amcolumn/swfobject.js"></script>
</head>
<body
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
?>
?>
</table>
<?
$type = array();
$numType = array();
$sql = mysql_db_query($dbname,'Select *,count(urlmain) AS count from report GROUP BY urlmain')or die('Error conndting to mysql');
			
	                while($result = mysql_fetch_array($sql))
						{
		           //echo  $result['type']." : ".$result['count']."<br>";
				   array_push($type,$result['urlmain']);
				   array_push($numType,$result['count']);
				        } 
//print_r($type);
//print_r($numType);
?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart;
	var legend;

            var chartData = [{
                web: "<?=$type[0];?>",
                value: <?=$numType[0]?>
            }, {
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
            }];

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
<div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </form>
</body>
</html>
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
$url = array();
$numUrl = array();
$sql = mysql_db_query($dbname,'Select *,count(url) AS count from domain GROUP BY url ORDER BY count DESC')or die('Error conndting to mysql');
			
	                while($result = mysql_fetch_array($sql))
						{
		           //echo  $result['type']." : ".$result['count']."<br>";
				   array_push($url,$result['url']);
				   array_push($numUrl,$result['count']);
				        } 
print_r($url);
print_r($numUrl); 

?>
 
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.js" type="text/javascript"></script>
<script type="text/javascript">
var chart;

var chartData = [{
                web: "<?=$url[0];?>",
                value: <?=$numUrl[0]?>
            }, {
                web: "<?=$url[1]?>",
                value: <?=$numUrl[1]?>
            }, {
                web: "<?=$url[2]?>",
                value: <?=$numUrl[2]?>
            }, {
                web: "<?=$url[3]?>",
                value: <?=$numUrl[3]?>
            }, {
                web: "<?=$url[4]?>",
                value: <?=$numUrl[4]?>
            }, {
                web: "<?=$url[5]?>",
                value: <?=$numUrl[5]?>
            }, {
                web: "<?=$url[6]?>",
                value: <?=$numUrl[6]?>
            }, {
                web: "<?=$url[7]?>",
                value: <?=$numUrl[7]?>
            }];


AmCharts.ready(function() {
    // SERIAL CHART
    chart = new AmCharts.AmSerialChart();
    chart.autoMarginOffset = 0;
    chart.marginRight = 0;    
    chart.dataProvider = chartData;
    chart.categoryField = "WEB";
    // this single line makes the chart a bar chart, 
    // try to set it to false - your bars will turn to columns                
    chart.rotate = true;
    // the following two lines makes chart 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // AXES
    // Category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridPosition = "start";
    categoryAxis.axisColor = "#DADADA";
    categoryAxis.fillAlpha = 1;
    categoryAxis.gridAlpha = 0;
    categoryAxis.fillColor = "#FAFAFA";

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.axisColor = "#DADADA";
    valueAxis.title = "Number";
    valueAxis.gridAlpha = 0.1;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.title = "web";
    graph.valueField = "value";
    graph.type = "column";
    graph.balloonText = "Income in [[web]]:[[value]]";
    graph.lineAlpha = 0;
    graph.fillColors = "#bf1c25";
    graph.fillAlphas = 1;
    chart.addGraph(graph);

    // WRITE
    chart.write("chartdiv");
});
</script>
<div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </form>
</body>
</html>
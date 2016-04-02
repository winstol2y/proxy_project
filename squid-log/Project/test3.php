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
      </ul>
    <!-- InstanceEndEditable --></td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" -->
<?
$all = file_get_contents('upload/access.log');

$arr = explode ( "\r", $all );
?>
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

<table border="1">
<tr>
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
$i = 0;
$c = 0;
?>

<?

for($q=0; $q < count($arr);$q++)
{
$count=0;	
    
	if($arr[$q]!= NULL)
	{
?>
<tr>
<?
$arr2 = explode ( " ", $arr[$q] );

for($u=0; $u < count($arr2);$u++ )
{   
	if($arr2[$u] != NULL){
		$count++;
		if($count == 1 )
		{
			$timestemp = $arr2[$u];
		}
		if($count == 2 )
		{
			$duration = $arr2[$u];
		}
		if($count == 3 )
		{
			$client_address = $arr2[$u];
		}
		if($count == 4 )
		{
			$result_codes = $arr2[$u];
		}
		if($count == 5 )
		{
			$bytes = $arr2[$u];
		}
		if($count == 6 )
		{
			$request_method = $arr2[$u];
		}
		if($count == 7 )
		{   $url =  $arr2[$u];
			$pattern = "/http:\/\/([^\/]+)\//i";
			preg_match($pattern, $arr2[$u], $matches);
			
			$exten = explode ( ".", $matches[1] );
			
			
			?>
           		<td style="text-align:center"><?=$arr2[$u]?></td>
            	<td style="text-align:center"><?=$matches[1]?></td>
            <?
					if(strlen($exten[count($exten)-1])<3)
				    {
			?>
            			<td style="text-align:center"><?=$exten[count($exten)-2]?></td>
            <?      
				        $domain = $exten[count($exten)-2];
					}
					else
					{
			?>
						<td style="text-align:center"><?=$exten[count($exten)-1]?></td>
            <? 	    				    
	                    $domain = $exten[count($exten)-1];
				    
					}
			
            $urlmain = $matches[1];
		
					

		}
		if($count == 8 )
		{
			$rfc931 = $arr2[$u];
		}
		if($count == 9 )
		{
			$hierarchy_code = $arr2[$u];
		}
		if($count == 10 )
		{
			$type = $arr2[$u];
		}

		else		
		{
?>

		<td style="text-align:center"><?=$arr2[$u]?></td>
<?
	    
		}
		
	
	}//end ifelse inner


}//end for


?>
</tr>
<?





	}//end if




echo $timestemp;

$times = $timestemp;

$result = mysql_db_query($dbname,"INSERT INTO log (timestemp) VALUES ('$times')")or die('Error insert');

//$result = mysql_db_query($dbname,"INSERT INTO report(times,duration,client_address,result_codes,bytes,request_method,url,urlmain,domain,rfc931,hierarchy_code,type) VALUES ('$timestemp','$duration','$client_address','$result_codes','$bytes','$request_method','$url','$urlmain','$domain','$rfc931','$hierarchy_code','$type')")or die('Error insert');

}//end for



		
?>
</table>
<?



$type = array();
$numType = array();
$sql = mysql_db_query($dbname,'Select *,count(type) AS count from domain GROUP BY type')or die('Error conndting to mysql');
			
	                while($result = mysql_fetch_array($sql))
						{
		       
				   array_push($type,$result['type']);
				   array_push($numType,$result['count']);
				        } 

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

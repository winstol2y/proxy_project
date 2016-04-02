<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// á·Ã¡â¤éµ jquery
	$("#dateInput").datepicker({ dateFormat: 'dd/mm/yy'});
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
<form name="frmDate" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
 <input type="text" name="dateInput" id="dateInput" value="<?=$_GET["dateInput"];?>" />
 <input name="submit" type="submit" value="Search" />
</form>





<?
$dateInput = $_GET["dateInput"];
echo $dateInput;
?>
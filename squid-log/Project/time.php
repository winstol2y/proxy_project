<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<form action="time.php" method="post" name="form1">
List Menu 1<br>
  <select name="lmName1">
	<option value="00.00">00 : 00</option>
    <option value="00.30">00 : 30</option>
	<option value="01.00">01 : 00</option>
    <option value="01.30">01 : 30</option>	
	<option value="02.00">02 : 00</option>
    <option value="02.30">02 : 30</option>
	<option value="03.00">03 : 00</option>
    <option value="03.30">03 : 30</option>
	<option value="04.00">04 : 00</option>
    <option value="04.30">04 : 30</option>
	<option value="05.00">05 : 00</option>
    <option value="05.30">05 : 30</option>
	<option value="06.00">06 : 00</option>
    <option value="06.30">06 : 30</option>
	<option value="07.00">07 : 00</option>
    <option value="07.30">07 : 30</option>
	<option value="08.00">08 : 00</option>
    <option value="08.30">08 : 30</option>
	<option value="09.00">09 : 00</option>
    <option value="09.30">09 : 30</option>
	<option value="10.00">10 : 00</option>
    <option value="10.30">10 : 30</option>
	<option value="11.00">11 : 00</option>
    <option value="11.30">11 : 30</option>
	<option value="12.00">12 : 00</option>
    <option value="12.30">12 : 30</option>
	<option value="13.00">13 : 00</option>
    <option value="13.30">13 : 30</option>
	<option value="14.00">14 : 00</option>
    <option value="14.30">14 : 30</option>
	<option value="15.00">15 : 00</option>
    <option value="15.30">15 : 30</option>
	<option value="16.00">16 : 00</option>
    <option value="16.30">16 : 30</option>
	<option value="17.00">17 : 00</option>
    <option value="17.30">17 : 30</option>
	<option value="18.00">18 : 00</option>
    <option value="18.30">18 : 30</option>
	<option value="19.00">19 : 00</option>
    <option value="19.30">19 : 30</option>
	<option value="20.00">20 : 00</option>
    <option value="20.30">20 : 30</option>
	<option value="21.00">21 : 00</option>
    <option value="21.30">21 : 30</option>
	<option value="22.00">22 : 00</option>
    <option value="22.30">22 : 30</option>
	<option value="23.00">23 : 00</option>
    <option value="23.30">23 : 30</option>
  </select>
   <select name="lmName2">
	<option value="00.00">00 : 00</option>
    <option value="00.30">00 : 30</option>
	<option value="01.00">01 : 00</option>
    <option value="01.30">01 : 30</option>	
	<option value="02.00">02 : 00</option>
    <option value="02.30">02 : 30</option>
	<option value="03.00">03 : 00</option>
    <option value="03.30">03 : 30</option>
	<option value="04.00">04 : 00</option>
    <option value="04.30">04 : 30</option>
	<option value="05.00">05 : 00</option>
    <option value="05.30">05 : 30</option>
	<option value="06.00">06 : 00</option>
    <option value="06.30">06 : 30</option>
	<option value="07.00">07 : 00</option>
    <option value="07.30">07 : 30</option>
	<option value="08.00">08 : 00</option>
    <option value="08.30">08 : 30</option>
	<option value="09.00">09 : 00</option>
    <option value="09.30">09 : 30</option>
	<option value="10.00">10 : 00</option>
    <option value="10.30">10 : 30</option>
	<option value="11.00">11 : 00</option>
    <option value="11.30">11 : 30</option>
	<option value="12.00">12 : 00</option>
    <option value="12.30">12 : 30</option>
	<option value="13.00">13 : 00</option>
    <option value="13.30">13 : 30</option>
	<option value="14.00">14 : 00</option>
    <option value="14.30">14 : 30</option>
	<option value="15.00">15 : 00</option>
    <option value="15.30">15 : 30</option>
	<option value="16.00">16 : 00</option>
    <option value="16.30">16 : 30</option>
	<option value="17.00">17 : 00</option>
    <option value="17.30">17 : 30</option>
	<option value="18.00">18 : 00</option>
    <option value="18.30">18 : 30</option>
	<option value="19.00">19 : 00</option>
    <option value="19.30">19 : 30</option>
	<option value="20.00">20 : 00</option>
    <option value="20.30">20 : 30</option>
	<option value="21.00">21 : 00</option>
    <option value="21.30">21 : 30</option>
	<option value="22.00">22 : 00</option>
    <option value="22.30">22 : 30</option>
	<option value="23.00">23 : 00</option>
    <option value="23.30">23 : 30</option>
  </select>
</form>
</body>
</html>

<?
$da1 = $_POST["lmName1"];
$da2 = $_POST["lmName2"];
$da3 = $_POST["lmName3"];
$da4 = $_POST["lmName4"];
echo $da1,$da2;
?>
<?$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("logfiles");

$strSQL = "SELECT  * FROM domain WHERE times  between '$da1' AND '$da2'";

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<?while($objResult = mysql_fetch_array($objQuery))
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
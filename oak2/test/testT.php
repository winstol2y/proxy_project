<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
 
		<title>TableTools example</title>
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "media/css/TableTools.css";
		</style>
<!--ไฟล์ css อยู่ใน folder ที่เรา ดาวน์โหลดมา เมื่อนำมาใช้ กำหนด path ไฟล์ให้ถูกต้อง-->
		<script type="text/javascript" charset="utf-8" src="./js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8"src="./js/jquery.dataTables.js"></script>
<!--ไฟล์ js อยู่ใน folder ที่เรา ดาวน์โหลดมา เมื่อนำมาใช้ กำหนด path ไฟล์ให้ถูกต้อง-->
		<script type="text/javascript" charset="utf-8">
 
		$(document).ready( function () {
			$('#example').dataTable( {
				"sPaginationType" : "full_numbers",// แสดงตัวแบ่งหน้า
				"bLengthChange": true, // แสดงจำนวน record ที่จะแสดงในตาราง
				"iDisplayLength": 10, // กำหนดค่า default ของจำนวน record 
				"bFilter": true, // แสดง search box
				"sScrollY": "400px", // กำหนดความสูงของ ตาราง
 
				"oTableTools": {
					"sRowSelect": "single" // คลิกที่ record มีแถบสีขึ้น
 
					}
 
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big"></div>
 
		  <div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>ชื่อ</th>
            <th>นามสกุล</th>
		</tr>
	</thead>
 
	<tbody>
    <?php
		$hostname = "localhost"; // ชื่อ Host
        $usename = "root"; // username เข้าฐานข้อมูล
        $password = "qwerty"; // password เข้าฐานข้อมูล
        $database = "test"; // ฐานข้อมูล
        $conn = mysql_connect($hostname,$usename,$password,$database) or die ("ติดต่อฐานข้อมูลไม่ได้");
        mysql_query("SET NAMES UTF8",$conn);
        mysql_select_db($database) or die ("เลือกฐานข้อมูลไม่ได้");
 
	$sql = "SELECT * FROM name_friend"; // เลือก ตารางที่เราเก็บข้อมูล
	$query = mysql_query($sql) or die ("sql error [".$sql."]");
 
	?>
    <?php   while($row = mysql_fetch_array($query)){ ?>
		<tr class="odd_gradeX">
 
	    <td><?php echo $row['name']?></td> 
            <td><?php echo $row['surname']?></td> 
 
		</tr>
         <?php } ?>
	</tbody>
</table>
		  </div>
			<div class="spacer"></div>
 
 
			<h1>&nbsp;</h1>
		</div>
	</body>
</html>
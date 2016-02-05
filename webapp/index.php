<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tax7%</title>
</head>
<style type="text/css">
	tr{
        text-align: center; 
    }
</style>
<body>
	<?php
		$item1 = "ยาสระผม";
		$item2 = "แปลง";
		$item3 = "ยาสีฟัน";
		$uItem1 = 1;
		$uItem2 = 4;
		$uItem3 = 2;
		const pItem1 = 85;
		const pItem2 = 55;
		const pItem3 = 40;
	?>
	<table style="width:100%" border="1" align="center">
  		<tr>
    		<th>ชื่อ</th>
    		<th>จำนวน</th>
    		<th>ราคาต่อชิ้น</th>
            <th>ราคาไม่รวมภาษี</th>
            <th>ราคารวมภาษี</th>
    	</tr>
    	<tr>
    		<td><?php echo $item1; ?></td>
    		<td><?php echo $uItem1; ?></td>
    		<td><?php echo pItem1; ?></td>
            <td><?php echo pItem1*$uItem1; ?></td>
            <td><?php echo ((pItem1*$uItem1)*1.07); ?></td>
    	</tr>
    	
    	<tr>
    		<td><?php echo $item2; ?></td>
    		<td><?php echo $uItem2; ?></td>
    		<td><?php echo pItem2; ?></td>
            <td><?php echo pItem2*$uItem2; ?></td>
            <td><?php echo ((pItem2*$uItem2)*1.07); ?></td>
    	</tr>
    	
    	<tr>
    		<td><?php echo $item3; ?></td>
    		<td><?php echo $uItem3; ?></td>
    		<td><?php echo pItem3; ?></td>
            <td><?php echo pItem3*$uItem3; ?></td>
            <td><?php echo ((pItem3*$uItem3)*1.07); ?></td>
    	</tr>

  		
	</table>
    ราคารวมสินค้า <?php echo $uItem1+$uItem2+$uItem3; ?> ชิ้น =  <?php echo ((pItem1*$uItem1)*1.07)+((pItem2*$uItem2)*1.07)+((pItem3*$uItem3)*1.07); ?>
</body>
</html>

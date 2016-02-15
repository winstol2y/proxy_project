<?php
	include_once 'function.inc.php';
	$get_P = get_product();
	$get_A = isset($_POST['amount']) ? $_POST['amount'] :"";
	$last_P = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill Show</title>
	<style>
		table, th, td 
		{
    		border: 1px solid black;
    		border-collapse: collapse;
		}
		th, td 
		{
    		padding: 5px;
    		text-align: center;
		}
		
	</style>
</head>

	
</style>
<body>
	<?php include 'header.php';?>
	<form>
		<table border="1" width="100%">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Amount</th>
			<th>No VAT 7%</th>
			<th>VAT 7%</th>
		</tr>
		<?php
			$i=1;
			foreach ($get_P as $key) 
			{
				$last_P[$i] = $get_A[$i]*$key['price']*1.07;
				echo "<tr>";
					echo "<td>".$key['product_code']."</td>";
					echo "<td>".$key['product_name']."</td>";
					echo "<td>".$key['price']."</td>";
					echo "<td>".$get_A[$i]."</td>";
					echo '<td>'.$get_A[$i]*$key['price'].'</td>';
					echo "<td>".$last_P[$i]."</td>";
				echo "<tr>";
				$i++;
			}
		?>
		<tr>
			<td colspan="6">
				<?php
					$total = total_bill($last_P);
					//total_bill($last_P);
					//total_bill($product,$bAmount);
					/*
					$j=1;
					foreach ($_SESSION["product"] as $key => $intable) 
					{  
						$pSum = $pSum + (((int)$_SESSION["bAmount".$j])*((int)$intable["price"])*1.07);
						$j = $j + 1;
					}*/
					echo "Total $ ";
					echo $total;
					echo " ";
				?>
			</td>
		</tr>

		</table>
	</form>
</body>
</html>
<?php
	include ('footer.php');
?>
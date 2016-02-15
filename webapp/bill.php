<?php 
	if(isset($_POST['set_session']))
	{	
		session_start();
		$x = $_SESSION["i"] - 1;
		for ($y=1; $y <= $x ; $y=$y+1) 
		{  
			$_SESSION["bAmount".$y] = $_POST["amount".$y];
			
		}
		
	}
	$bAmount = array($_SESSION["bAmount1"],$_SESSION["bAmount2"],$_SESSION["bAmount3"],$_SESSION["bAmount4"],$_SESSION["bAmount5"]);
	include 'helper_func.inc.php';
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
	<form action="workshop.php">
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
			$product = $_SESSION["product"];
			$a = 1;
			$b = 0;
			create_table($product,$a,$bAmount,$b);

			/*foreach ($_SESSION["product"] as $key => $intable) 
			{
				
				echo "<tr>";
					echo "<td>".$intable["id"]."</td>";
					echo "<td>".$key."</td>";
					echo "<td>$ ".$intable['price']."</td>";
					echo '<td>'.$_SESSION["bAmount".$a].'</td>';
					echo '<td>'.$_SESSION["bAmount".$a]*$intable["price"].'</td>';
					echo '<td>'.$_SESSION["bAmount".$a]*$intable["price"]*1.07.'</td>';
				echo "</tr>";
				$a = $a + 1;
			}*/
		?>
		<tr>
			<td colspan="6">
				<?php
					total_bill($product,$bAmount);
					/*
					$j=1;
					foreach ($_SESSION["product"] as $key => $intable) 
					{  
						$pSum = $pSum + (((int)$_SESSION["bAmount".$j])*((int)$intable["price"])*1.07);
						$j = $j + 1;
					}
					echo "Total $ ";
					echo $pSum;
					echo " ";*/
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
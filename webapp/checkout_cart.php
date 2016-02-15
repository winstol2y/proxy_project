<!DOCTYPE html>
<html>
<head>
	<title>Supermarket</title>
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
		.wrapper {
    text-align: center;
}
	</style>

</head>

	
</style>
<body>

	<?php 
		include('header.php');
  	    include("function.inc.php");	
	?>
	<form action="calculate_cast.php" method="post">
		<table border="1" width="100%">
		<tr>
			<th>Product ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Amount</th>
		</tr>
		<?php
			$get_P = get_product();
			$i = 1;
			foreach ($get_P as $key) 
			{
				echo "<tr>";
					echo "<td>".$key['product_code']."</td>";
					echo "<td>".$key['product_name']."</td>";
					echo "<td>".$key['price']."</td>";
					echo '<td><input type="text" name="amount['.$i.']"></td>';
				echo "</tr>";
				$i++;
			}
			 
		?>
		</table><br><br><div class="wrapper"><input type="submit" name="set_value" value="Submit" ></div>
		
	</form>
</body>
</html>
<?php
	include('footer.php');
?>

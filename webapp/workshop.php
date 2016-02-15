<?php 
	session_start();
	$_SESSION["product"] = array(
									"Ice Cream Sandwidth" => array ("id" => 001,"price" => 10,"amount1" => 1),
									"Jelly Bean" => array ("id" => 002,"price" => 10,"amount2" => 2),
									"KitKat" => array ("id" => 003,"price" => 15,"amount3" => 3),
									"Lollipop" => array ("id" => 004,"price" => 20,"amount4" => 4),
									"Marshmallow" => array ("id" => 005,"price" => 25,"amount5" => 5)
								);
	$_SESSION["i"] = 1;
?>
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

	<?php include 'header.php';?>
	<form action="bill.php" method="post">
		<table border="1" width="100%">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Amount</th>
		</tr>
		<?php 
			foreach ($_SESSION["product"] as $key => $intable) 
			{
				
				echo "<tr>";
					echo "<td>".$intable["id"]."</td>";
					echo "<td>".$key."</td>";
					echo "<td>$ ".$intable['price']."</td>";
					echo '<td><input type="text" name="amount'.$_SESSION["i"].'"></td>';

				echo "</tr>";	
				$_SESSION["i"] =$_SESSION["i"]+1;
			}
		?>
		
		</table><br><br><div class="wrapper"><input type="submit" name="set_session" value="Submit" ></div>
		
	</form>
</body>
</html>
<?php
	include ('footer.php');
?>
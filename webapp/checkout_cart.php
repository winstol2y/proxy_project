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

	<?php include('header.php');
  	      include("helper_func.inc.php");	
	?>
	<form action="bill.php" method="post">
		<table border="1" width="100%">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Amount</th>
		</tr>
		<?php get_product(); ?>		
		</table><br><br><div class="wrapper"><input type="submit" name="set_value" value="Submit" ></div>
		
	</form>
</body>
</html>
<?php
	include('footer.php');
?>

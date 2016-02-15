<?php 
	function create_table($product,$a,$bAmount,$b)
	{
	 	foreach ($product as $key => $intable) 
		{
			
			echo "<tr>";
				echo "<td>".$intable["id"]."</td>";
				echo "<td>".$key."</td>";
				echo "<td>$ ".$intable['price']."</td>";
				echo '<td>'.$bAmount[$b].'</td>';
				echo '<td>'.$bAmount[$b]*$intable["price"].'</td>';
				echo '<td>'.$bAmount[$b]*$intable["price"]*1.07.'</td>';
			echo "</tr>";
			$a = $a + 1;
			$b = $b + 1;
		}
	}
	function total_bill($product,$bAmount)
	{
		$pSum=0;
		$j=0;
		foreach ($product as $key => $intable) 
		{  
			$pSum = $pSum + (((int)$bAmount[$j])*((int)$intable["price"])*1.07);
			$j = $j + 1;
		}
		echo "Total $ ";
		echo $pSum;
		echo " ";
	}
?>
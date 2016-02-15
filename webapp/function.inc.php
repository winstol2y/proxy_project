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
	define("HOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "qwerty");

	function connecttoDB($dbname)
	{
    	$connect = new PDO('mysql:host=localhost;dbname=' . $dbname, DBUSER, DBPASS);
    	$connect->exec("SET CHARACTER SET utf8");
    	return $connect;
	}
	function login($dbname,$user,$pass)
	{
		$connect = connecttoDB($dbname);
		$query = 'SELECT `id`,`name`,`surname`,`username` , `passwd` FROM `member` WHERE `username` = :username AND `passwd` = :password';
		$stmt = $connect->prepare($query);
		$stmt->execute(array(':username' => $user,':password' => $pass ));
		$r_Count = $stmt->rowCount();
		return $r_Count>0;
	}
?>
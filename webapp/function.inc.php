<?php 
	/*function create_table($product,$a,$bAmount,$b)
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
	}*/
	function total_bill($last_P)
	{	$total = 0 ;
		$i=0;
		/*foreach ($last_P as $i) 
		{  
			$total = $total + $last_P[$i];
		}*/
		while($i<=count($last_P))
		{
			$total = $total + $last_P[$i];
			$i++;
		}
		return $total;
		//print_r($last_P);
	}


	define("db_host","mysql:dbname=webapp;host=localhost");
	define("db_user", "root");
	define("db_pass", "qwerty");

	function connecttoDB()
	{
    	$connect = new PDO(db_host,db_user,db_pass);
    	$connect->exec("SET CHARACTER SET utf8");
    	return $connect;
	}
	function login($user,$pass)
	{
		$connect = connecttoDB();
		$query = 'SELECT `id`,`name`,`surname`,`username` , `passwd` FROM `member` WHERE `username` = :username AND `passwd` = :password';
		$stmt = $connect->prepare($query);
		$stmt->execute(array(':username' => $user,':password' => $pass ));
		$r_Count = $stmt->rowCount();
		return $r_Count>0;
	}
	function get_product()
	{
		$i = 1;
		$connect = connecttoDB();
		$query = 'SELECT `product_code`,`product_name`,`price` FROM `products`';
		$stmt = $connect->prepare($query);
		$stmt->execute();
		$get_P = $stmt->fetchAll();
		return $get_P;
	}
?>
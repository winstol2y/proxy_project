<?php
	function alertBox($alerttext)
	{
		echo '<script type="text/javascript">alert("'.$alerttext.'");window.history.back();</script>';
	}
	$servername = "localhost";
	$username = "root";
	$password = "qwerty";
	$dbname = "delay_pool";

	$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
	mysql_select_db($dbname) or die (mysql_error("Error database"));

	$checkE1 = TRUE;
	$checkE2 = TRUE;

	$user_c = $_POST['user_c'];
	$bw = $_POST['bw'];
	$squid_c = $_POST['squid_c'];
	$squid_c_count1 = preg_replace('/\/|-/', ' ', $bw);
	$squid_c_count2 = preg_replace('/none/', ' ', $squid_c_count1);
	$squid_c_count3 = preg_match('/[^0-9]/', trim($squid_c_count2));

	if($squid_c_count3 > 0)
	{
		alertBox("Please check syntax of bandwidth shaping");
		$checkE1 = FALSE;
	}
	else
	{
		$squid_c_count4 = explode(' ', $squid_c_count1);
		$arrayBW = array();
		$j=0;
		for ($i=0; $i < count($squid_c_count4); $i++)
		{ 
			if(!empty($squid_c_count4[$i]))
			{
				$arrayBW[$j] = $squid_c_count4[$i];
				$j++;
			}
		}

		$l = 0;
		for ($k=0; $k < count($arrayBW); $k++) 
		{
			if ($arrayBW[$k] == "none")
			{
				$l++;
			}
			$l++;
		}

		if($squid_c == "1")
		{
			if($l != 2) 
			{
				alertBox("Please check syntax of bandwidth shaping");
				$checkE2 = FALSE;
			}
		}
		else if($squid_c == "2")
		{
			if($l != 4) 
			{
				alertBox("Please check syntax of bandwidth shaping");
				$checkE2 = FALSE;
			}
		}
		else if($squid_c == "3")
		{
			if($l != 6) 
			{
				alertBox("Please check syntax of bandwidth shaping");
				$checkE2 = FALSE;
			}
		}
		else if($squid_c == "4")
		{
			if($l != 8) 
			{
				alertBox("Please check syntax of bandwidth shaping");
				$checkE2 = FALSE;
			}
		}
		else if($squid_c == "5")
		{
			//if($l != 2) {alertBox("Please check syntax of bandwidth shaping");}
		}
	}
	if($checkE1 && $checkE2)
	{
		$query_update = 'UPDATE `class_squid` SET `class`='.$squid_c.' , `bw` = '.$bw.'WHERE user_class='.$user_c;
		mysql_query($query_update) or die(mysql_error());
		header('Location: squid.php');
	}
	
?>
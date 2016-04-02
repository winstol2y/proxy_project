<?php
	$x = "none -123456/123456 -1/-1";
	$x2 = preg_replace('/\/|-/', ' ',$x);
	$x3 = explode(' ', $x2);
	$x4 = array();
	echo "<pre>";
	var_dump($x);
	echo "<br>";
	var_dump($x2);
	echo "<br>";
	var_dump($x3);
	echo "<br>";
	$j=0;
	for ($i=0; $i < count($x3); $i++)
	{ 
		if(!empty($x3[$i]))
		{
			$x4[$j] = $x3[$i];
			$j++;
		}
	}
	var_dump($x4);
	echo "<br>";
	$l = 0;
	for ($k=0; $k < count($x4); $k++) 
	{
		if ($x4[$k] == "none")
		{
			$l++;
		}
		$l++;
	}
	echo $l;
	echo "</pre>";
?>
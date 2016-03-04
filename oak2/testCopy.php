<?php
	/*function getBetween($content,$start,$end)
	{
	    $r = explode($start, $content);
	    if (isset($r[1]))
	    {
	        $r = explode($end, $r[1]);
	        return $r[0];
	    }
	    return '';
	}
	$content = file_get_contents('http://158.108.207.113:55580/linfo/');

	$content2File=fopen("Sysinfo.temp", "w");
	fwrite($content2File,$content);
	fclose($content2File);

	$getRamInfo = explode("/",trim(preg_replace('/([a-z]|A|L|[C-F]|[H-J]|L|[N-O]|[Q-S]|[U-Z]|<|>|=|"|:|;|Ph|To|_|\t|\n)/', '', shell_exec("grep -a -7 '<td>Physical</td>' /var/www/html/oak2/Sysinfo.temp"))));

	$getHDDInfo = explode("/",trim(preg_replace('/([a-z]|A|L|[C-F]|[H-J]|L|[N-O]|[Q-S]|[U-Z]|<|>|=|"|:|;|Ph|To|_|\t|\n)/', '', shell_exec("grep -a -8 '>Totals: </td>' /var/www/html/oak2/Sysinfo.temp"))));*/
	/*echo "-------------------------------------------------- \n";
	echo "<pre>";
	var_dump($getRamInfo);
	echo "</pre>";
	echo "-------------------------------------------------- \n";

	echo "-------------------------------------------------- \n";
	echo "<pre>";
	var_dump($getHDDInfo);
	echo "</pre>";
	echo "-------------------------------------------------- \n";

	echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
	echo $getRamInfo[7]."\t".$getRamInfo[8]."\t".$getRamInfo[9]."\t".$getRamInfo[11]."\n";
	echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
	echo $getHDDInfo[7].\t.$getHDDInfo[8].\t.$getHDDInfo[9].\t.$getHDDInfo[11].\n;*/

	//$cutPer = substr("75%", 0, -1);
	//$cutPer = substr("55%", 0, -1);
	//$cutPer = substr("35%", 0, -1);
	//$cutPer = substr($getHDDInfo[11], 0, -1);
	/*var_dump($getHDDInfo[11]);
	echo "<br>";
	var_dump($cutPer);
	$perToINT = intval(substr("56%", 0, -1));
	echo "<br>";
	var_dump($perToINT);
	echo "<br>";
	if ($perToINT > 66)
	{
		$barX = 33;
		$barY = 33;
		$barZ = $perToINT - 66;
	}
	elseif ($perToINT > 33 && $perToINT <= 66)
	{
		$barX = 33;
		$barY = $perToINT - 33;
		$barZ = 0;
	}
	elseif ($perToINT <= 33)
	{
		$barX = $perToINT;
		$barY = 0;
		$barZ = 0;
	}
	echo $barX.".........".$barY.".........".$barZ;*/

	$stat1 = file('/proc/stat'); 
	sleep(1); 
	$stat2 = file('/proc/stat'); 
	$info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0])); 
	$info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0])); 
	$dif = array(); 
	$dif['user'] = $info2[0] - $info1[0]; 
	$dif['nice'] = $info2[1] - $info1[1]; 
	$dif['sys'] = $info2[2] - $info1[2]; 
	$dif['idle'] = $info2[3] - $info1[3]; 
	$total = array_sum($dif); 
	$cpu = array(); 
	foreach($dif as $x=>$y) 
	{
		$cpu[$x] = round($y / $total * 100, 1);
	}
	var_dump($cpu);
?>
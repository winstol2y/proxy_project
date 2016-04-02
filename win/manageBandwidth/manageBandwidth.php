<?php

shell_exec("/var/www/html/win/manageBandwidth/runSh.sh");
shell_exec("/var/www/html/win/changePermissionLogBandwidth.sh");

$data1 = file_get_contents('/var/www/html/win/manageBandwidth/log/logBandwidthClass1.log');
$data2 = file_get_contents('/var/www/html/win/manageBandwidth/log/logBandwidthClass2.log');
$data3 = file_get_contents('/var/www/html/win/manageBandwidth/log/logBandwidthClass3.log');
$data4 = file_get_contents('/var/www/html/win/manageBandwidth/log/logBandwidthClass4.log');
$data5 = file_get_contents('/var/www/html/win/manageBandwidth/log/logBandwidthClass5.log');
$dataLogArr1 = explode ( "\n", $data1 );
$dataLogArr2 = explode ( "\n", $data2 );
$dataLogArr3 = explode ( "\n", $data3 );
$dataLogArr4 = explode ( "\n", $data4 );
$dataLogArr5 = explode ( "\n", $data5 );
$lengthData = count($dataLogArr1);
$sum1 = 0; $sum2 = 0; $sum3 = 0; $sum4 = 0; $sum5 = 0;
for($i = 0; $i < $lengthData; $i++){
        $data1 = explode(" ", trim($dataLogArr1[$i]));
        $data2 = explode(" ", trim($dataLogArr2[$i]));
        $data3 = explode(" ", trim($dataLogArr3[$i]));
        $data4 = explode(" ", trim($dataLogArr4[$i]));
        $data5 = explode(" ", trim($dataLogArr5[$i]));
        $lengthDataType = count($data1);
        $k1 = 0;  $k2 = 0; $k3 = 0; $k4 = 0; $k5 = 0;
	
        for($j = 0; $j < $lengthDataType; $j++)
        {
               	if($data1[$j] != "" && $data1[$j] != "Total" && $data1[$j] != "send" && $data1[$j] != "and" && $data1[$j] != "receive" && $data1[$j] != "rate"){
                       	$data1[$k1] = $data1[$j];
                       	$k1++;
               	}
               	if($data2[$j] != "" && $data2[$j] != "Total" && $data2[$j] != "send" && $data2[$j] != "and" && $data2[$j] != "receive" && $data2[$j] != "rate"){
                       	$data2[$k2] = $data2[$j];
                       	$k2++;
               	}
               	if($data3[$j] != "" && $data3[$j] != "Total" && $data3[$j] != "send" && $data3[$j] != "and" && $data3[$j] != "receive" && $data3[$j] != "rate"){
                       	$data3[$k3] = $data3[$j];
                       	$k3++;
               	}
               	if($data4[$j] != "" && $data4[$j] != "Total" && $data4[$j] != "send" && $data4[$j] != "and" && $data4[$j] != "receive" && $data4[$j] != "rate"){
                       	$data4[$k4] = $data4[$j];
                       	$k4++;
               	}
               	if($data5[$j] != "" && $data5[$j] != "Total" && $data5[$j] != "send" && $data5[$j] != "and" && $data5[$j] != "receive" && $data5[$j] != "rate"){
                       	$data5[$k5] = $data5[$j];
                       	$k5++;
               	}
        }
	if(preg_match("/K/i", $data1[1]) == 0){ $sum11 += $data1[1];} else { $sum11 += ($data1[1]*1024); }
	if(preg_match("/K/i", $data2[1]) == 0){ $sum22 += $data2[1];} else { $sum22 += ($data2[1]*1024); }
	if(preg_match("/K/i", $data3[1]) == 0){ $sum33 += $data3[1];} else { $sum33 += ($data3[1]*1024); }
	if(preg_match("/K/i", $data4[1]) == 0){ $sum44 += $data4[1];} else { $sum44 += ($data4[1]*1024); }
	if(preg_match("/K/i", $data5[1]) == 0){ $sum55 += $data5[1];} else { $sum55 += ($data5[1]*1024); }
}

echo "<br>";
echo $sum11;
echo "<br>";
echo $sum22;
echo "<br>";
echo $sum33;
echo "<br>";
echo $sum44;
echo "<br>";
echo $sum55;
echo "<br>";

shell_exec("rm /var/www/html/win/manageBandwidth/tmp/*");
shell_exec("echo ".$sum11." > /var/www/html/win/manageBandwidth/tmp/bandwidthClass1.tmp");
shell_exec("echo ".$sum22." > /var/www/html/win/manageBandwidth/tmp/bandwidthClass2.tmp");
shell_exec("echo ".$sum33." > /var/www/html/win/manageBandwidth/tmp/bandwidthClass3.tmp");
shell_exec("echo ".$sum44." > /var/www/html/win/manageBandwidth/tmp/bandwidthClass4.tmp");
shell_exec("echo ".$sum55." > /var/www/html/win/manageBandwidth/tmp/bandwidthClass5.tmp");
shell_exec("/var/www/html/win/manageBandwidth/change_permission_tmp.sh");

#shell_exec("");





?>

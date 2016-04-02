<?php
  require_once './session_login.inc.php';
?>
<?php
  $ipC_Arr = array();
  $cURL_Arr = array();
  $timeUse_Arr = array();
  $byte_Arr = array();
  $C = 0;
  $C2 = 0;
  $x = 1;
  $y = "";
  $setH = "";
  $setM = "";
  $setS = "";
  $setT = "";
  $setB = "";
  $url = array();
  $ip_tmp = "";
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "squidLogDaily";
  
  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));
  //$table = $_POST['table']; // for real
  $table = '15-03-2016_23-12-29'; // for test
  // Start : Report by IP  
  $selectIp  = 'SELECT DISTINCT `ipClient` FROM `'.$table.'`';
  $queryIp = mysql_query($selectIp) or die(mysql_error());
  while($ip = mysql_fetch_assoc($queryIp))
  {
    $ipC_Arr[$C] = $ip['ipClient'];
    $selectUrl = 'SELECT count(url),timeUse,byte FROM `'.$table.'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
    $queryUrl = mysql_query($selectUrl) or die(mysql_error());
    while($url = mysql_fetch_assoc($queryUrl))
    {  
      $cURL_Arr[$C] = $url['count(url)']; 
    }
    $selectSumTime = 'SELECT sum(timeUse),sum(byte) FROM `'.$table.'` WHERE `ipClient` = "'.$ip["ipClient"].'"';
    $querySumTime = mysql_query($selectSumTime) or die(mysql_error());
    while($sum = mysql_fetch_assoc($querySumTime))
    {
      $timeUse_Arr[$C] = $sum['sum(timeUse)'];
      $byte_Arr[$C] = $sum['sum(byte)'];
    }
    $C++;
  }
  for ($i = 0; $i < count($timeUse_Arr); $i++) 
  { 
    $toSec = number_format($timeUse_Arr[$i]/1000,2,".",".");
    $toMin = sprintf("%02d", ($toSec/60)%60);
    $toHour = sprintf("%02d", ($toSec/60/60)%24);
    $toSec = sprintf("%02d", $toSec % 60);

    $setT = $toHour.":".$toMin.":".$toSec;
    if ($setT == "00:00:00") 
    {
      $setT = $setT . " ( " . $timeUse_Arr[$i] . "ms )";
    }
    $timeUse_Arr[$i] = $setT;
    $setT = "";

    $B = $byte_Arr[$i];
    $KB = ($B / 1024);
    $MB = ($B / 1024 / 1024);
    $GB = ($B /  1024 / 1024 / 1024);

    if ($GB > 1)
    {
      $setB = number_format($GB,2,".",".")." GB ";
    }
    elseif ($MB > 1) 
    {
      $setB = number_format($MB,2,".",".")." MB ";
    }
    elseif ($KB > 1) 
    {
      $setB = number_format($KB,2,".",".")." KB ";
    }
    else
    {
      $setB = number_format($B,2,".",".")." B ";
    }
    $byte_Arr[$i] = $setB;
    $setB = "";
  }
  // End : Report by IP

  // Start : Site & User
  $selectUrl  = 'SELECT DISTINCT `url`,type FROM `'.$table.'`';
  $queryUrl = mysql_query($selectUrl) or die(mysql_error());
  $arrayUrl = array();
  $countArray = 0;
  while($url = mysql_fetch_assoc($queryUrl))
  {
    $pattern = "/http:\/\/([^\/]+)\//i";
    preg_match($pattern, $url['url'], $matches);
    if($url['type'] == "text/html")
    {
      $arrayUrl[$countArray] = $matches[1];
      $countArray++;
    }
  }

  $duplicateUrl = array_keys(array_flip($arrayUrl));
  $url = array();
  $countTime = array();
  $sum_byte = array();
  $sum_time = array();
  $useIP = array();
  $countIP = array();
  for($count = 0; $count < count($duplicateUrl); $count++)
  {
    //echo $duplicateUrl[$count];
    $url[$count] = $duplicateUrl[$count];
    $selectCountUrl  = 'SELECT count(url),sum(byte),sum(timeUse) FROM `squidLogDaily`.`'.$table.'` WHERE `url` LIKE "%'.$duplicateUrl["$count"].'%"';
    $queryCountUrl = mysql_query("$selectCountUrl") or die(mysql_error());
    while($countUrl = mysql_fetch_assoc($queryCountUrl)){
      $countTime[$count] = $countUrl["count(url)"];
      $sum_byte[$count] =$countUrl["sum(byte)"];
      $sum_time[$count] = $countUrl["sum(timeUse)"];
      $selectCountIp  = 'SELECT DISTINCT ipClient FROM `squidLogDaily`.`'.$table.'` WHERE `url` LIKE "%'.$duplicateUrl["$count"].'%"';
      $queryCountIp = mysql_query("$selectCountIp") or die(mysql_error());
      $count_ip = 0;
      $ip_tmp = "";
      while($countIp = mysql_fetch_assoc($queryCountIp)){
        $ip_tmp = $ip_tmp.$countIp["ipClient"]." , ";
      }
      $ip_tmp = substr($ip_tmp, 0, -3);
      $useIP[$count] = $ip_tmp;
    }    
  }
  for ($i = 0; $i < count($sum_time); $i++) 
  { 
    $toSec = number_format($sum_time[$i]/1000,2,".",".");
    $toMin = sprintf("%02d", ($toSec/60)%60);
    $toHour = sprintf("%02d", ($toSec/60/60)%24);
    $toSec = sprintf("%02d", $toSec % 60);

    $setT = $toHour.":".$toMin.":".$toSec;
    if ($setT == "00:00:00") 
    {
      $setT = $setT . " ( " . $sum_time[$i] . "ms )";
    }
    $sum_time[$i] = $setT;
    $setT = "";

    $B = $sum_byte[$i];
    $KB = ($B / 1024);
    $MB = ($B / 1024 / 1024);
    $GB = ($B /  1024 / 1024 / 1024);

    if ($GB > 1)
    {
      $setB = number_format($GB,2,".",".")." GB ";
    }
    elseif ($MB > 1) 
    {
      $setB = number_format($MB,2,".",".")." MB ";
    }
    elseif ($KB > 1) 
    {
      $setB = number_format($KB,2,".",".")." KB ";
    }
    else
    {
      $setB = number_format($B,2,".",".")." B ";
    }
    $sum_byte[$i] = $setB;
    $setB = "";
  }
  // End : Site & User
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proxy Web UI:Report</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>

  <body>
    <?php include ("./modalbar.php");?>

    <div class="wrapper">
      <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
          
          <?php include ("./sidebar.php");?>
        
          <!-- Main Right -->
          <div class="column col-sm-10 col-xs-11" id="main">
              
            <?php include ("./bluebar.php");?>

            <div class="padding">
              <div class="full col-sm-12">
                <div class="row"><!-- Content -->

                  <div class="row">
                    <div class="col-sm-12">
                        <h2 align="center">Daily Report</h2>
                        <h3 align="center">IP Report</h3>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="container-fluid">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>#</th>
                              <th>IP Address</th>
                              <th>Connect</th>
                              <th>Byte</th>
                              <th>Time</th>
                            </tr>
                            <?php
                              $x = 1;
                              for ($i = 0; $i < $C-1 ; $i++) 
                              { 
                                echo "<tr>";
                                  echo "<td><b>".$x."</b></td>";
                                  echo "<td><a href=report_daily_ip.php?ip=".$ipC_Arr[$i].">".$ipC_Arr[$i]."</a></td>";
                                  echo "<td>".$cURL_Arr[$i]." Times</td>";
                                  echo "<td>".$byte_Arr[$i]."</td>";
                                  echo "<td>".$timeUse_Arr[$i]."</td>";
                                echo "</tr>";
                                $x++;
                              }
                            ?>                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                        <h3 align="center">Site and User</h3>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="container-fluid">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>#</th>
                              <th>Site</th>
                              <th>Connect</th>
                              <th>User</th>
                              <th>Byte</th>
                              <th>Time</th>
                            </tr>
                            <?php
                              $x = 1;
                              for ($i = 0; $i < count($url) ; $i++) 
                              { 
                                echo "<tr>";
                                  echo "<td><b>".$x."</b></td>";
                                  echo "<td><a href='http://".$url[$i]."/'>".$url[$i]."</a></td>";
                                  echo "<td>".$countTime[$i]."</td>";
                                  echo "<td>".$useIP[$i]."</td>";
                                  echo "<td>".$sum_byte[$i]."</td>";
                                  echo "<td>".$sum_time[$i]."</td>";
                                echo "</tr>";
                                $x++;
                              }
                            ?>                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!--/Content-->
              </div><!-- /col-12 -->
            </div><!-- /padding -->
          </div><!-- /Main Content -->
        </div>
      </div>
    </div>

    <?php include ("./script.php");?>

  </body>
</html>
<?php
  require_once './session_login.inc.php';
?>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "squidLogDaily";
  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));

  $webURL_Arr = array();
  $webCount_Arr = array();
  $timeUse_Arr = array();
  $byte_Arr = array();
  $DL_URL_Arr = array();
  $DL_TYPE_Arr = array();
  $C = 0;
  $C2 = 0;
  $x = 1;
  $setH = "";
  $setM = "";
  $setS = "";
  $setT = "";
  $setB = "";
  $getIP = $_GET["ip"];
  $table = '15-03-2016_23-12-29'; // test

  $selectUrl = 'SELECT DISTINCT url,type,dateTime,byte,timeUse FROM `'.$table.'` WHERE `ipClient` = "'.$getIP.'"';
  $queryUrl = mysql_query("$selectUrl") or die(mysql_error());
  $arrayUrl = array();
  $countArray = 0;
  while($url = mysql_fetch_assoc($queryUrl))
  {
    if($url['type'] == "text/html")
    {
      $pattern = "/http:\/\/([^\/]+)\//i";
      preg_match($pattern, $url['url'], $matches);
      $arrayUrl[$countArray] = $matches[1];
      $countArray++;
    }
  }
  $duplicateUrl = array_keys(array_flip($arrayUrl));
  $countUrl = array_count_values($arrayUrl);

  for($count = 0; $count < count($duplicateUrl);$count++)
  {
    $selectSum1 = 'SELECT sum(byte),sum(timeUse) FROM `'.$table.'` WHERE `url` LIKE "%'.$duplicateUrl[$count].'%"';
    $querySum1 = mysql_query("$selectSum1") or die(mysql_error());
    while($sum1 = mysql_fetch_assoc($querySum1))
    {
      $webURL_Arr[$C] = $duplicateUrl[$count];
      $webCount_Arr[$C] = $countUrl[$duplicateUrl[$count]];
      $timeUse_Arr[$C] = $sum1['sum(timeUse)'];
      $byte_Arr[$C] = $sum1['sum(byte)'];
      $C++;
    }
  }
  for ($i = 0; $i < count($timeUse_Arr)-1; $i++) 
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

  $selectUrlAnother = 'SELECT DISTINCT url,type,dateTime FROM `'.$table.'` WHERE `ipClient` = "'.$getIP.'"';
  $queryUrlAnother = mysql_query("$selectUrlAnother") or die(mysql_error());
  while($url = mysql_fetch_assoc($queryUrlAnother))
  {
    if($url['type'] != "text/html")
    {
      if($url['type'] != "-")
      {
        $DL_URL_Arr[$C2] = $url['url'];
        $DL_TYPE_Arr[$C2] = $url['type'];
        $C2++;
      }
    }
  }
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
                      <h2 align="center">User Report</h2>
                      <h3 align="center"><?php echo $getIP; ?></h3>
                      <h4 align="center"> ACCESSED SITE</h4>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="container-fluid">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>#</th>
                              <th>SITE</th>
                              <th>Connect</th>
                              <th>Byte</th>
                              <th>Time</th>
                            </tr>
                            <?php
                              $x = 1;
                              for ($i = 0; $i < $C ; $i++) 
                              { 
                                echo "<tr>";
                                  echo "<td><b>".$x."</b></td>";
                                  echo "<td><a href='http://".$webURL_Arr[$i]."/'>".$webURL_Arr[$i]."</a></td>";
                                  echo "<td>".$webCount_Arr[$i]." Times</td>";
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
                      <h4 align="center"> Download</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="container-fluid">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>#</th>
                              <th>SITE</th>
                              <th>Connect</th>
                            </tr>
                            <?php
                              $x = 1;
                              for ($i = 0; $i < count($DL_TYPE_Arr) ; $i++) 
                              { 
                                echo "<tr>";
                                  echo "<td><b>".$x."</b></td>";
                                  echo "<td><a href='http://".$DL_URL_Arr[$i]."/'>".$DL_URL_Arr[$i]."</a></td>";
                                  echo "<td>".$DL_TYPE_Arr[$i]."</td>";
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
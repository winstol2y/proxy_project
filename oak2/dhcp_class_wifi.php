<?php
  require_once './session_login.inc.php';
?>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "dhcp";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));

  $query_all_data = 'SELECT * FROM `class_wifi`';
  $my_result = mysql_query($query_all_data);
  $i = 1;
  $class = 5;
  $query_range = 'SELECT * FROM `class_range` WHERE `class` = '.$class;
  $result_range = mysql_query($query_range);
  while($my_range=mysql_fetch_array($result_range))
  {
    $ip_s =  $my_range["ip_start"];
    $ip_e =  $my_range["ip_end"];
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proxy Web UI:WiFi Class</title>
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
                  
                  <br>
                                    
                  <div class="row">
                    <div class="col-sm-12">
                        <h2 align="center">Display</h2> 
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <div class="container-fluid">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Surname</th>
                              <th>IP Card Number</th>
                              <th>E-Mail</th>
                              <th>MAC Address</th>
                              <th>Telephone Num</th>
                              <th>Regis. Time</th>
                              <th>Function</th>
                            </tr>
                            <?php
                              function table($data){
                                echo '<th><div>';
                                echo "$data";
                                echo '</div></th>';
                              }
                              while($my_row1=mysql_fetch_array($my_result))
                              {
                                echo '<tr>';
                                table("$i");
                                table($my_row1["name"]);
                                table($my_row1["surname"]);
                                table($my_row1["id-card"]);
                                table($my_row1["email"]);
                                table($my_row1["mac"]);
                                table($my_row1["tel"]);
                                table($my_row1["regis_time"]);
                                table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/dhcp_class_wifi_delete.php?mac='.trim($my_row1["mac"]).'>Delete</button>');
                                $i++;
                                echo '</tr>';
                              }
                            ?>
                          </table>
                          <?php
                            mysql_close($con);
                          ?>
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
<?php
  require_once './session_login.inc.php';
?>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "squidLogDay";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));
  $query_name = 'SELECT * FROM `tableName`';
  $result_name = mysql_query($query_name);
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
    <style type="text/css">
    .dropdownHeight option {
        height: 30px;
    }
    .sameline {
      display:block;
    }
    </style>
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
                        <h2 align="center">Report</h2> 
                      </div>
                  </div>

                  <form action="dhcp_class1_add.php" method="post">
                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-4">
                        <h4 align="right">Daily Report :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="btn btn-primary" type="submit" value="Show Report">
                      </div>
                    </div>
                  </form>

                  <form action="report_day.php" method="post">
                    <div class="row">

                      <div class="col-sm-2 col-sm-offset-4">
                        <h4 align="right">Day Report :</h4>
                        
                      </div>

                      <div class="col-sm-1">
                        <select class="dropdownHeight" name="table">
                          <?php
                            while ($row = mysql_fetch_array($result_name))
                            {
                              echo "<option value=\"". $row['tableName'] ."\">" . $row['tableName'] . "</option>";
                            }
                          ?>
                        </select>
                      </div>

                      <div class="col-sm-1">
                        <input class="btn btn-primary" type="submit" value="Show Report">
                      </div>

                    </div>
                  </form>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <div class="container-fluid">
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
<?php mysql_close($con); ?>
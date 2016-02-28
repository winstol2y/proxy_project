<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "dhcp";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));

  $query_all_data = 'SELECT * FROM `class_range`';
  $my_result = mysql_query($query_all_data);
  $i = 1;
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proxy Web UI:Set IP Class</title>
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
                  <form action="ip_class_update.php" method="post" name="frm_data">
                    
                    <div class="row">
                      <div class="col-sm-12">
                        <h1 align="center">Set IP Class</h1> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Class :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="class" type="text" placeholder=""/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">IP Range :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <table>
                          <tr>
                            <td>
                              <input class="form-control" name="range1" type="text" placeholder=""/>
                            </td>
                            <td>
                              <h4> to </h4>
                            </td>
                            <td>
                              <input class="form-control" name="range2" type="text" placeholder=""/>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-1 col-sm-offset-5">
                          <div class="col-sm-1 col-sm-offset-3">
                            <input class="btn btn-primary" type="submit" value="submit">
                          </div>
                      </div>
                    </div>
                  </form>

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
                              <th>Class</th>
                              <th>Start IP</th>
                              <th>to</th>
                              <th>End IP</th>
                            </tr>
                            <?php
                              function table($data){
                                echo '<th><div>';
                                echo "$data";
                                echo '</div></th>';
                              }
                              while($my_row=mysql_fetch_array($my_result))
                              {
                                echo '<tr>';
                								table($my_row["class"]);
            						        table($my_row["ip_start"]);
                								table("-");
                								table($my_row["ip_end"]);
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

                <?php include ("./underbar.php");?>

                <hr>
              </div><!-- /col-12 -->
            </div><!-- /padding -->
          </div><!-- /Main Content -->
        </div>
      </div>
    </div>

    <?php include ("./script.php");?>

  </body>
</html>
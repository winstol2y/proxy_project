<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "dhcp";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));

  $query_all_data = 'SELECT * FROM `class5`';
  $my_result = mysql_query($query_all_data);
  $i = 1;
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proxy Web UI:DHCP Class 5</title>
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
                  <form action="add_dhcp_class5.php" method="post" name="frm_data">
                    
                    <div class="row">
                      <div class="col-sm-12">
                        <h1 align="center">DHCP Class 5</h1> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Mac Address :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="macAddress_add" type="text" placeholder="Ex. : AA:BB:CC:DD:EE:FF "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Name :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="name_add" type="text" placeholder="Only a-z, A-Z, 0-9 "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">IP Address :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="ip_add" type="text" placeholder="10.41.0.2 - 10.50.255.254"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Expire :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="ip_add" type="text" placeholder="Ex : yyyy-mm-dd"/>
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
                  
                  <br>
                  
                  <form action="upload_csv_class5.php" method="post" enctype="multipart/form-data">
                      
                      <div class="row">
                        
                        <div class="col-sm-2 col-sm-offset-3">
                          <h4 align="center">Import CSV file :</h4> 
                        </div>
                        <div class="col-sm-2">
                          <input class="btn btn-default" type="file" name="fileCSV" id="fileCSV">
                        </div>
                        <div class="col-sm-2 col-sm-offset-1" >
                          <div class="col-sm-11 col-sm-offset-1" >
                            <input class="btn btn-default" type="submit" value="Import" name="submit">
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-sm-9 col-sm-offset-3">
                          <div class="col-sm-12">
                            <h5>Format : MacAddress (xx:xx:xx:xx:xx:xx) , Hostname , ip , expire (yyyy-mm-dd)</h5>
                          </div>
                        </div>

                      </div>
                    <p></p>
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
                          <table class="table">
                            <tr>
                              <th>#</th>
                              <th>Mac Address</th>
                              <th>IP Address</th>
                              <th>Name</th>
                              <th>Expire</th>
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
                                table($my_row1["hw"]);
                                table($my_row1["ip"]);
                                table($my_row1["name"]);
                                table($my_row1["zone"]);
                                table($my_row1["expire"]);
                                table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/deleteDB/delete_dhcp5.php?ip='.trim($my_row1["ip"]).'&mac='.trim($my_row1["hw"]).'>Delete</button>');
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


    <!--post modal-->
    <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              Update Status
          </div>
          <div class="modal-body">
            <form class="form center-block">
              <div class="form-group">
                <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div>
              <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
              <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
            </div>  
          </div>
        </div>
      </div>
    </div>

    <?php include ("./script.php");?>

  </body>
</html>
<?php
  include("/var/www/html/oak2/connectDB/block_url.php");
  $query_all_data = 'SELECT * FROM `block_url` ORDER BY no DESC';
  $my_result = mysql_query($query_all_data);
  $i = 1;
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proxy Web UI:URL Block</title>
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
                  <form action="add_url.php" method="post" name="frm_data">

                    <div class="row">
                      <div class="col-sm-12">
                        <h1 align="center">URL Block</h1> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Name :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="name_add" type="text" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">URL :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="url_add" type="text" placeholder="Ex. : google.com "/>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Time Start :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="time_start" type="text" placeholder="Ex. : hh:mm"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Time End :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="time_end" type="text" placeholder="Ex. : hh:mm"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Day :</h4> 
                      </div>
                      <label class="checkbox-inline"><input type="checkbox" value="">Sunday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Monday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Tuesday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Wednesday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Thursday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Friday</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Saturday</label>

                    </div>
                        
                    
                    <div class="row">
                      <div class="col-sm-1 col-sm-offset-5">
                          <div class="col-sm-1 col-sm-offset-3">
                            <input class="btn btn-primary" type="submit" value="submit">
                          </div>
                      </div>
                    </div>
                  </form>
                  <?php /*
                  <div class="row">
                    <div class="col-sm-12">
                        <h2 align="center">Display</h2> 
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <table class="table table-striped">
                        <thead>

                          <?php
                           
                          include("connect.php");
                           
                          function table($data){
                            echo '<th><div>';
                            echo "$data";
                            echo '</th></div>';
                          }

                          echo '<tr>';
                                  table("  #  ");
                                  table('<a href=index.php?sort=name>Name</a>');
                                  table('<a href=index.php?sort=hw>URL</a>');
                                  table('<a href=index.php?sort=expire>Expire</a>');
                                  table("Function");
                          echo '</tr>';
                          
                          while($my_row1=mysql_fetch_array($my_result)){
                            table("$i");
                            table($my_row1["name"]);
                            table($my_row1["url"]);
                            table($my_row1["expire"]);
                            table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/deleteDB/delete_url.php?url='.trim($my_row1["url"]).'>Delete</button>');
                            $i++;
                            echo '</tr>';
                          }
                          
                          mysql_close($con);*/
                          ?>
                        </thead>
                      </table>
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
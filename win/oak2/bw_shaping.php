<?php/*
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "block";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));
  $query_all_data = 'SELECT * FROM `block_url` ORDER BY id DESC';
  $my_result = mysql_query($query_all_data);*/
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <title>Proxy Web UI:B/W Shaping</title>
    <style>
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
                  <form action="add_bw_shaping.php" method="post" name="frm_data">

                    <div class="row">
                      <div class="col-sm-12">
                        <h1 align="center">Bandwidth Shaping</h1> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Number of Class :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="class_num" type="text" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">IP Range Begin :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="ip_begin" type="text" placeholder="Ex. : google.com "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">IP Range End :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="ip_end" type="text" placeholder="Ex. : google.com "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">B/W per Class :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="bw_class" type="text" placeholder="Ex. : google.com "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">B/W per Client :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" name="bw_client" type="text" placeholder="Ex. : google.com "/>
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
                      <table class="table table-striped">
                        <thead>

                          <?php
                           
                          function table($data){
                            echo '<th><div>';
                            echo "$data";
                            echo '</th></div>';
                          }
                          
                          /*echo '<tr>';
                                  table("  #  ");
                                  table('<a href=index.php?sort=name>Name</a>');
                                  table('<a href=index.php?sort=hw>URL</a>');
                                  table('<a href=index.php?sort=time>Block Time</a>');
                                  table('<a href=index.php?sort=time>Block Day</a>');
                                  table("Function");
                          echo '</tr>';
                          $i = 1;*/
                          /*while($my_row1=mysql_fetch_array($my_result))
                          {
                            echo '<tr>';
                            table("$i");
                            table($my_row1["name"]);
                            table($my_row1["url"]);
                            table($my_row1["time"]);
                            table($my_row1["day"]);*/
                            //table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/delete_url.php?url='.trim($my_row1["id"]).'>Delete</button>');
                            /*$i++;
                            echo '</tr>';*/
                          //}
                          
                          //mysql_close($con);
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

    <?php include ("./script.php");?>
 
  </body>
</html>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "block";

  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));
  $query_all_data = 'SELECT * FROM `block_url` ORDER BY id DESC';
  $my_result = mysql_query($query_all_data);
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

    <title>Proxy Web UI:URL Block</title>

    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<!--
    <script src="js/jquery.js"></script> 
    <script src="js/moment.min.js"></script> 
    <script src="js/combodate.js"></script> 
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/transition.js"></script>
    <script type="text/javascript" src="js/collapse.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/jquery-clockpicker.css">
    <script src="js/bootstrap.min.js"></script>-->

    
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
                        <input class="form-control" name="time_start" type="text" placeholder="Ex. : HH:MM "/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Time End :</h4> 
                      </div>
                      <div class="col-sm-3">
                        <div class='input-group date' id='datetimepicker'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                            $('#datetimepicker3').datetimepicker({
                              format: 'LT'
                            });
                          });
                        </script>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2 col-sm-offset-3">
                        <h4 align="right">Day :</h4> 
                      </div>
                      <div class="col-sm-12">
                        <div>
                          <input type="radio" name="dayR" id="everyday" onchange="setDate();" value="SMTWHFA"/>Everyday
                          <input type="radio" name="dayR" id="someday" onchange="setDate();"/>Someday
                        </div>
                        <div>
                            <input type="checkbox" name="day[]" id="S" disabled="disabled" value="S" checked/>Sunday
                            <input type="checkbox" name="day[]" id="M" disabled="disabled" value="M"/>Monday
                            <input type="checkbox" name="day[]" id="T" disabled="disabled" value="T"/>Tuesday
                            <input type="checkbox" name="day[]" id="W" disabled="disabled" value="W"/>Wednesday
                            <input type="checkbox" name="day[]" id="H" disabled="disabled" value="H"/>Thursday
                            <input type="checkbox" name="day[]" id="F" disabled="disabled" value="D"/>Friday
                            <input type="checkbox" name="day[]" id="A" disabled="disabled" value="A"/>Saturday
                          </div> 
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
                          
                          echo '<tr>';
                                  table("  #  ");
                                  table('<a href=index.php?sort=name>Name</a>');
                                  table('<a href=index.php?sort=hw>URL</a>');
                                  table('<a href=index.php?sort=time>Block Time</a>');
                                  table('<a href=index.php?sort=time>Block Day</a>');
                                  table("Function");
                          echo '</tr>';
                          $i = 1;
                          while($my_row1=mysql_fetch_array($my_result))
                          {
                            echo '<tr>';
                            table("$i");
                            table($my_row1["name"]);
                            table($my_row1["url"]);
                            table($my_row1["time"]);
                            table($my_row1["day"]);
                            table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=/oak2/deleteDB/delete_url.php?url='.trim($my_row1["url"]).'>Delete</button>');
                            $i++;
                            echo '</tr>';
                          }
                          
                          mysql_close($con);
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


    <!--post modal
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
    </div>-->

    <?php include ("./script.php");?>
    <script>
      function setDate(){
        var el = document.getElementById("someday");
        if(el.checked)
          document.getElementById("S").disabled = false;
        else
         document.getElementById("S").disabled = true;
        if(el.checked)
          document.getElementById("M").disabled = false;
        else
         document.getElementById("M").disabled = true;
        if(el.checked)
          document.getElementById("T").disabled = false;
        else
         document.getElementById("T").disabled = true;
        if(el.checked)
          document.getElementById("W").disabled = false;
        else
         document.getElementById("W").disabled = true;
        if(el.checked)
          document.getElementById("H").disabled = false;
        else
         document.getElementById("H").disabled = true;
        if(el.checked)
          document.getElementById("F").disabled = false;
        else
         document.getElementById("F").disabled = true;
        if(el.checked)
          document.getElementById("A").disabled = false;
        else
         document.getElementById("A").disabled = true;            
      } 
    </script>
  
  </body>
</html>

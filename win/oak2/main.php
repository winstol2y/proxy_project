<?php
  session_start();
  if($_SESSION["login_ok"] != 1)
  {
    header( "location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Proxy Web UI</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>

	<body>
    <div class="wrapper">
      <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
          
          <?php include ("./sidebar.php");?>
        
          <!-- Main Right -->
          <div class="column col-sm-10 col-xs-11" id="main">
              
            <?php include ("./bluebar.php");?>

            
            <div class="padding">
              <div class="full col-sm-9">
                  
                <!-- Content -->                      
                <div class="row">
                  <!-- Content Left --> 
                  <div class="col-sm-5">

                    <div class="panel panel-default">
                      <div class="panel-body">
                        <p class="lead">Server Status</p>

                        <p>CPU Used:</p>
                        <div class="progress  progress-striped active">
                          <div class="progress-bar" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      
                        <p>Ram Used:</p>
                        <div class="progress  progress-striped active">
                          <div class="progress-bar" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>

                        <p>Storage Used:</p>
                        <div class="progress  progress-striped active">
                          <div class="progress-bar" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>


                        <!--
                        <p>
                          <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
                        </p>
                        -->
                      </div>
                    </div>
                    <!--
                    <div class="panel panel-default">
                      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
                      <div class="panel-body">
                        <div class="list-group">
                          <a href="http://bootply.com/tagged/modal" class="list-group-item">Modal / Dialog</a>
                          <a href="http://bootply.com/tagged/datetime" class="list-group-item">Datetime Examples</a>
                          <a href="http://bootply.com/tagged/datatable" class="list-group-item">Data Grids</a>
                        </div>
                      </div>
                    </div>
                       
                    <div class="well">
                      <form class="form-horizontal" role="form">
                        <h4>What's New</h4>
                        <div class="form-group" style="padding:14px;">
                          <textarea class="form-control" placeholder="Update your status"></textarea>
                        </div>
                        <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                      </form>
                    </div>
                       
                    <div class="panel panel-default">
                      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
                      <div class="panel-body">
                        <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
                          <div class="clearfix"></div>
                            There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
                            <hr>
                            <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
                      </div>
                    </div>
                       
                    <div class="panel panel-default">
                      <div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
                     	<div class="panel-body">
                      	Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp; intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable components for navigation, pagination, labels, alerts etc..                          </div>
                    </div>
                    -->
                  </div><!-- /Contern Left -->
                     
                  <!-- Contern Right -->
                  <div class="col-sm-7">
                    <!--      
                    <div class="well"> 
                       <form class="form">
                        <h4>Sign-up</h4>
                        <div class="input-group text-center">
                        <input type="text" class="form-control input-lg" placeholder="Enter your email address">
                          <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
                        </div>
                      </form>
                    </div>
                    -->
                  
                    <div class="panel panel-default">
                      <div class="panel-heading"><a href="./url_block.php" class="pull-right">View all</a> <h4>URL Block</h4></div>
                      <div class="panel-body">
                        <h5>Quick URL Block</h5>
                        <div class="input-group text-center">
                        <input type="text" class="form-control input-lg" placeholder="Enter URL">
                          <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
                        </div>
                        <hr>
                        <h5>The last 3 URL Block</h5>
                        <h6>URL 3</h6>
                        <h6>URL 2</h6>
                        <h6>URL 1</h6>
                      </div>
                    </div>
                        
                    <div class="panel panel-default">
                      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
                      <div class="panel-body">
                        <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                        <div class="clearfix"></div>
                        <hr>
                          <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
                        <hr>
                        <form>
                          <div class="input-group">
                            <div class="input-group-btn">
                              <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Add a comment..">
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
                      <div class="panel-body">
                        <ul class="list-group">
                          <li class="list-group-item">Modals</li>
                          <li class="list-group-item">Sliders / Carousel</li>
                          <li class="list-group-item">Thumbnails</li>
                        </ul>
                      </div>
                    </div>
                        
                    <div class="panel panel-default">
                      <div class="panel-thumbnail"><img src="/assets/example/bg_4.jpg" class="img-responsive"></div>
                      <div class="panel-body">
                        <p class="lead">Social Good</p>
                        <p>1,200 Followers, 83 Posts</p>
                        <p>
                          <img src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg" width="28px" height="28px">
                          <img src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg" width="28px" height="28px">
                          <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
                        </p>
                      </div>
                    </div>
                  </div><!-- /Contern Right -->
                </div><!--/Content-->
                  
                <?php include ("./underbar.php");?>

                <hr>
              </div><!-- /col-9 -->
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
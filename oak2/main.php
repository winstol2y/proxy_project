<?php
  function getBetween($content,$start,$end)
  {
      $r = explode($start, $content);
      if (isset($r[1]))
      {
          $r = explode($end, $r[1]);
          return $r[0];
      }
      return '';
  }
  $content = file_get_contents('http://158.108.207.113:55580/linfo/');
  $getOS = getBetween($content,"OS","Distribution");
  $getDIS = getBetween($content,"Distribution","Virtualization");
  $getUPT = getBetween($content,"Uptime",";");
  $content2File=fopen("Sysinfo.temp", "w");
  fwrite($content2File,$content);
  fclose($content2File);
  
  $getRAM = explode("/",trim(preg_replace('/([a-z]|A|L|[C-F]|[H-J]|L|[N-O]|[Q-S]|[U-Z]|<|>|=|"|:|;|Ph|To|_|\t|\n)/', '', shell_exec("grep -a -7 '<td>Physical</td>' /var/www/html/oak2/Sysinfo.temp"))));
  $cutRAMPer = intval(substr($getRAM[11], 0, -1));
  if ($cutRAMPer > 66)
  {
    $barRAMX = 33;
    $barRAMY = 33;
    $barRAMZ = $cutRAMPer - 66;
  }
  elseif ($cutRAMPer > 33 && $cutRAMPer <= 66)
  {
    $barRAMX = 33;
    $barRAMY = $cutRAMPer - 33;
    $barRAMZ = 0;
  }
  elseif ($cutRAMPer <= 33)
  {
    $barRAMX = $cutRAMPer;
    $barRAMY = 0;
    $barRAMZ = 0;
  }
  $getHDD = explode("/",trim(preg_replace('/([a-z]|A|L|[C-F]|[H-J]|L|[N-O]|[Q-S]|[U-Z]|<|>|=|"|:|;|Ph|To|_|\t|\n)/', '', shell_exec("grep -a -8 '>Totals: </td>' /var/www/html/oak2/Sysinfo.temp"))));
  $cutHDDPer = intval(substr($getHDD[11], 0, -1));
  if ($cutHDDPer > 66)
  {
    $barHDDX = 33;
    $barHDDY = 33;
    $barHDDZ = $cutHDDPer - 66;
  }
  elseif ($cutHDDPer > 33 && $cutHDDPer <= 66)
  {
    $barHDDX = 33;
    $barHDDY = $cutHDDPer - 33;
    $barHDDZ = 0;
  }
  elseif ($cutHDDPer <= 33)
  {
    $barHDDX = $cutHDDPer;
    $barHDDY = 0;
    $barHDDZ = 0;
  }
  $stat1 = file('/proc/stat'); 
  sleep(1); 
  $stat2 = file('/proc/stat'); 
  $info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0])); 
  $info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0])); 
  $dif = array(); 
  $dif['user'] = $info2[0] - $info1[0]; 
  $dif['nice'] = $info2[1] - $info1[1]; 
  $dif['sys'] = $info2[2] - $info1[2]; 
  $dif['idle'] = $info2[3] - $info1[3]; 
  $total = array_sum($dif); 
  $cpu = array(); 
  foreach($dif as $x=>$y) 
  {
    $cpu[$x] = round($y / $total * 100, 1);
  }

  $getCPUUsed = floor($cpu['user']);
  if ($getCPUUsed > 66)
  {
    $barCPUX = 33;
    $barCPUY = 33;
    $barCPUZ = $getCPUUsed - 66;
  }
  elseif ($getCPUUsed > 33 && $getCPUUsed <= 66)
  {
    $barCPUX = 33;
    $barCPUY = $getCPUUsed - 33;
    $barCPUZ = 0;
  }
  elseif ($getCPUUsed <= 33)
  {
    $barCPUX = $getCPUUsed;
    $barCPUY = 0;
    $barCPUZ = 0;
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
                  <div class="panel panel-default">
                  <div class="panel-body">
                    <p class="lead">Server Status</p>
                    <p>OS : <?php echo $getOS;?></p>
                    <p>Distribution : <?php echo $getDIS;?></p>
                    <p>Uptime : <?php echo $getUPT;?></p>
                    
                    <p>CPU Used : <?php if($getCPUUsed == 0){echo "~".$getCPUUsed."%";}else {echo $getCPUUsed."%";} ?></p>
                    <div class="progress  progress-striped active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo $barHDDX; ?>">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $barHDDY; ?>%">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $barHDDZ; ?>%">
                        <span class="sr-only"></span>
                      </div>
                    </div>
                  
                    <p>Ram Used : <?php echo $getRAM[11]." |";?> Size :  <?php echo $getRAM[7]." |";?> Used :  <?php echo $getRAM[8]." |";?> Free :  <?php echo $getRAM[9];?> </p>
                    <div class="progress  progress-striped active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo $barRAMX; ?>%">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $barRAMY; ?>%">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $barRAMZ; ?>%">
                        <span class="sr-only"></span>
                      </div>
                    </div>

                    <p>Storage Used : <?php echo $getHDD[11]." |";?> Size :  <?php echo $getHDD[7]." |";?> Used :  <?php echo $getHDD[8]." |";?> Free :  <?php echo $getHDD[9];?></p>
                    <div class="progress  progress-striped active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo $barHDDX; ?>%">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $barHDDY; ?>%">
                        <span class="sr-only"></span>
                      </div>
                      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $barHDDZ; ?>%">
                        <span class="sr-only"></span>
                      </div>
                    </div>
                    

                  </div>
                </div>
                  <!-- Content Left --> 
                  <div class="col-sm-5">

                    
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
                        <form action="add_url_main.php" method="post" name="frm_data">
                          <div class="input-group text-center">
                            <input type="text" class="form-control input-lg" name="qURL" placeholder="Enter URL">
                            <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">OK</button></span>
                          </div>
                        </form>
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
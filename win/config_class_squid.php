<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<meta content="list/html; charset=utf-8" http-equiv="Content-Type" />
<title>Config class of squid</title>
</head>
<body>
<center>
<style>
        form{
          text-align: center;
        }
 
        li a{
          font-size:16px;
        }
 
        h3 {
            color: blue;
            text-align: center;
        }
        table td, th, tr{
          color: #333;
          font-family: sans-serif;
          font-size: .9em;
          font-weight: 300;
          text-align: center;
          line-height: 25px;
          border: 0px solid navy;
          width: 800px;
        }
        th {
          height: 50px;
          border: 0px solid navy;
        }

        tr td{
          margin-left: auto;
          margin-right: auto;
        }

        div {
            font-weight:bold;
        }
</style>
 
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<a class="navbar-brand" href="#"></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="#">Menu</a></li>
<li><a href="http://localhost:1080/dhcp/index.php">DHCP and DNS</a></li>
<li><a href="http://localhost:1080/dhcp/config_subnet.php">Subnet</a></li>
<li><a href="http://localhost:1080/dhcp/config_zone_detail.php">Config Zone Detail</a></li>
</ul>
    
<ul class="nav navbar-nav navbar-right">
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<!-- Header modal -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Delete</h4>
</div>
<!-- END Header modal -->
<!-- Body modal -->
<div class="modal-body">
<div class="row">
<div class="col-md-6">
<a class="btn btn-danger" data-dismiss="modal">Close</a>
</div>
<div class="col-md-6">
<a id="ok" class="btn btn-primary" href="">Confirm</a>
</div>
</div>
</div>
<!-- End body modal -->
</div>
</div>
</div>
 
<table>
<tr>
<form action="add_class_delaypool.php" method="post" name="frm_data">
        <table width="700">
        <th>
        <caption><font size="5"><h3>Config class of squid</h3></font></caption>
        </th>
       
        <tr>
        <td align="right"><font size="3"><div>Range of IP Address :</div></font></td>
        <td><input class="form-control" name="range" type="text" /></td>
        </tr>
 
        <tr>
        <td align="right"><font size="3"><div>Bandwidth (Total/per Client) :</div></font></td>
        <td><input class="form-control" name="bandwidth" type="text" /></td>
        <td align="left">Example : 192.168.111.111 </td>
        </tr>
       
        <tr>
        <td align="right"><font size="3"><div>Class :</div></font></td>
        <td><input class="form-control" name="class" type="text" /></td>
        <td align="left">Example : yyyy-mm-dd  </td>
        </tr>
 
        <tr>
        <th><td><input class="btn btn-primary" type="submit" value="submit"></td></th>
        </tr>
 
</table>
</form>
 
<table width="800">
<form action="upload_csv_class1.php" method="post" enctype="multipart/form-data">
<br><br>
        <tr>
        <td align="right" style="width:100px">Import CSV file :</td>
        <td style="width:10px"><input class="btn btn-default" type="file" name="fileCSV" id="fileCSV" size="100"></td>
        <td style="width:10px"><input class="btn btn-default" type="submit" value="Import" name="submit" size="100"></td>
        <td style="width:300px"><div>  Format : MacAddress (xx:xx:xx:xx:xx:xx) , Zone , Hostname , ip , expire (yyyy-mm-dd)</td>
        </tr>
</form>
</table>
<br><br>
<table width="800">
        <h3>Display</h3>
<br><br>
</table>
 
 
<div class="container">
        <table class="table table-striped">
        <thead>
 
<?php

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "delay_pool";

$con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
        mysql_select_db($dbname) or die (mysql_error("Error database"));
 
function table($data){
       echo '<th><div>';
        echo "$data";
        echo '</th></div>';
}
 
echo '<tr>';
        table("  #  ");
        table('<a href=index.php?sort=hw>Pools</a>');
        table('<a href=index.php?sort=ip>Class</a>');
        table('<a href=index.php?sort=name>Range</a>');
        table('<a href=index.php?sort=expire>Bandwidth</a>');
        table("Function");
echo '</tr>';
 
$query_all_data = 'SELECT * FROM `class_squid`';
$my_result = mysql_query($query_all_data);
$i = 1;
 
while($my_row1=mysql_fetch_array($my_result)){
        echo '<tr>';
        table("$i");
        table($my_row1["pool"]);
        table($my_row1["class"]);
        table($my_row1["range"]);
        table($my_row1["bandwidth"]);
        table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=delete_class_squid.php?pool='.trim($my_row1["pool"]).'>Delete</button>');
        $i++;
        echo '</tr>';
}
 
mysql_close($con);
?>
</thead>
</table>
</caption>
</center>
 
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/win.js"></script>
   
</body>
</html>

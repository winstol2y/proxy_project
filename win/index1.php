<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<meta content="list/html; charset=utf-8" http-equiv="Content-Type" />
<title>Block URL</title>
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
<li><a href="http://158.108.207.113:55580/win/index.php">Block URL</a></li>
<li><a href="http://158.108.207.113:55580/win/config_port_squid.php">Open-Close Port</a></li>
<li><a href="http://158.108.207.113:55580/win/config_zone_detail.php">Unknow</a></li>
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
<form action="add_url.php" method="post" name="frm_data">
        <table width="700">
        <th>
        <caption><font size="5"><h3>Block URL</h3></font></caption>
        </th>
       
	<tr>
	<td align="right"><font size="3"><div>Name :</div></font></td>
	<td><input class="form-control" name="name_add" type="text" /></td>
	</tr>

        <tr>
        <td align="right"><font size="3"><div>URL :</div></font></td>
        <td><input class="form-control" name="url_add" type="text" /></td>
        </tr>

        <tr>
        <td align="right"><font size="3"><div>Expire :</div></font></td>
        <td><input class="form-control" name="time_add" type="text" /></td>
        <td align="left">Example : yyyy-mm-dd  </td>
        </tr>
 
        <tr>
        <th><td><input class="btn btn-primary" type="submit" value="submit"></td></th>
        </tr>
 
</table>
</form>
 
<br><br>
<table width="800">
        <h3>Display</h3>
<br><br>
</table>
 
 
<div class="container">
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
 
$query_all_data = 'SELECT * FROM `block_url`';
$my_result = mysql_query($query_all_data);
$i = 1;

while($my_row1=mysql_fetch_array($my_result)){
        table("$i");
	table($my_row1["name"]);
        table($my_row1["url"]);
        table($my_row1["expire"]);
        table('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever=delete.php?url='.trim($my_row1["url"]).'>Delete</button>');
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

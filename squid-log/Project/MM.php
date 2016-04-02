<form action="MM.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return chk();">
  <input type="file" name="file" id="file" />
  <input type="Submit" name="button" id="button" value="Upload" />
</form>
<?php
  $realname = $HTTP_POST_FILES['file']['name'];
  $tn = $HTTP_POST_FILES['file']['tmp_name'];
  if (is_uploaded_file($HTTP_POST_FILES['file']['tmp_name']))
  {
     copy($HTTP_POST_FILES['file']['tmp_name'], "./upload/access.log");
     echo "Upload Filename : " . $HTTP_POST_FILES['file']['name'];
  }
  else{
     echo "Upload not complete";
   }
?>
<?

$all = file_get_contents('upload/access.log');

$arr = explode ( "\r", $all );


$replace=str_replace("129240","<br>129240",$all);
$a=str_replace("98.136.49.25","www.google.com",$replace);
$b=str_replace("98.136.49.56","www.google.com",$a);
$c=str_replace("98.136.49.41","www.google.com",$b);
$d=str_replace("98.136.49.34","www.google.com",$c);
$e=str_replace("98.136.48.183","www.facebook.com",$d);
$f=str_replace("98.136.48.176","www.youtube.com",$e);
$g=str_replace("69.20.30.101","www.youtube.com",$f);


echo $g;
?>

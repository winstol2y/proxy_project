<?php
  $servername = "localhost";
  $username = "root";
  $password = "qwerty";
  $dbname = "test";
  $con = mysql_connect($servername,$username,$password) or die (mysql_error("Error connect"));
  mysql_select_db($dbname) or die (mysql_error("Error database"));

  $count = 0;
  $arr = array();

  $test = 'SELECT * FROM `test`';
  $testQ = mysql_query($test) or die(mysql_error());

  while($testF = mysql_fetch_assoc($testQ))
  {
    if($testF['x'] != 'x')
    {
      $arr[$count] = $testF['x'];
      $count++;
    }
  }
  echo $count;
  for ($i=0; $i < $count+1; $i++) 
  {
  	echo $i;
  	echo "===>";
  	echo $arr[$i];
  	echo "<br>";
  	
  }
?>
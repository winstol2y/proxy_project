<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="../index/Templates/template2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SQUID</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-attachment:fixed;
	background-image: url(../index/BG.jpg);
	background-repeat: repeat-x;
}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="806" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><img src="../index/head.gif" width="1024" height="116" /></td>
  </tr>
  <tr>
    <td width="124" rowspan="2" bgcolor="#4C4C4C">&nbsp;</td>
    <td width="900" height="545" align="left" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" -->
<?php
/*  $today = date("m.d.y-H.i"); 
  //$realname = $HTTP_POST_FILES['file']['name'];
  //$tn = $HTTP_POST_FILES['file']['tmp_name'];
  if (is_uploaded_file($HTTP_POST_FILES['file']['tmp_name']))
  {
     copy($HTTP_POST_FILES['file']['tmp_name'], "./upload/access.log");
	 copy($HTTP_POST_FILES['file']['tmp_name'], "./upload/history/$today.log");
     echo "Upload Filename : " . $HTTP_POST_FILES['file']['name'];
  }
  else{
     echo "Upload not complete";
   }*/
?>

<?


for($i=0;$i<count($_FILES['file']['name']);$i++)
{
$file = strtolower($_FILES['file']['name'][$i]);
$sizefile = $_FILES['file']['name'][$i]; 
$type[$i]= strrchr($_FILES['file']['name'][$i],".");
$error[$i] = $_FILES['file']['error'][$i];
}



for($k=0;$k<count($_FILES['file']['name']);$k++)
{
	for($j=($k+1);$j<5;$j++)
    {
	    if($_FILES['file']['name'][$k]==$_FILES['file']['name'][$j])
	    {
                   $error[0] = 1;
				   same();
	    }
	
    }
}



if($error[0] == 0 )
{

if(($type[0] == ".log" || $type[0] =="")&&($type[1] == ".log"|| $type[1] =="")&&($type[2] == ".log"|| $type[2] =="")&&($type[3] == ".log"|| $type[3] =="")&&($type[4] == ".log"|| $type[4] ==""))
{ 
	echo "Upload complete";
?>
<center>
<form action="test4.php" method="post" enctype="multipart/form-data">
<input type="submit" name="submit" value="Result" />
</form>
</center>
<?
for($i=0;$i<count($_FILES['file']['name']);$i++)
	{   $today = date("m.d.y-H.i"); 
		copy($_FILES['file']['tmp_name'][$i], "./upload/history/".$_FILES['file']['name']);
		if($_FILES['file']['name'][$i] != "")
		{
			
			copy($_FILES['file']['tmp_name'][$i],"upload/access.log");
			



?>

	<td><!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$tblname="domain";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }

?>
<?

$all = file_get_contents('upload/access.log');

$arr = explode ( "\r", $all );
?>
<?

for($q=0; $q < count($arr);$q++)
{
$count=0;
    if($arr[$q] == 0){break;}
	if($arr[$q]!= NULL)
	{
$arr2 = explode ( " ", $arr[$q] );

for($u=0; $u < count($arr2);$u++ )
{   
	if($arr2[$u] != NULL){
		$count++;
		if($count == 1 )
		{
			//$datetime = $arr2[$u];
			$datetime = date(" o-m-d h:i:s ",$arr2[$u]);
			$timestemp = date("H:i:s",$arr2[$u]);
			$date = date("o/m/d ",$arr2[$u]);
			$day = date("d",$arr2[$u]);
		}
		if($count == 2 )
		{
			$duration = $arr2[$u];
		}
		if($count == 3 )
		{
			$client_address = $arr2[$u];
		}
		if($count == 4 )
		{
			$result_codes = $arr2[$u];
		}
		if($count == 5 )
		{
			$bytes = $arr2[$u];
		}
		if($count == 6 )
		{
			$request_method = $arr2[$u];
		}
		if($count == 7 )
		{   $url =  $arr2[$u];
			

			$pattern = "/(www\.)([^\/]+)\:|(ftp:\/\/)([^\/]+)|(http(s)?:\/\/(www\.)?)?([^\/]+)\//i";


            //$pattern = "/(www\.)([^\/]+)\:|(http(s)?:\/\/(www\.)?)?([^\/]+)\//i";
			//$pattern = "/(www\.)([^\/]+)\:|(http(s)?:\/\/(www\.)?([^\/]+\.)?)?([^\/]+)\//i";
			preg_match($pattern,$arr2[$u], $matches );
            

			$exten = explode ( ".", end($matches) );

		$domain = "";
					if(strlen($exten[count($exten)-1])<3)
				    {   if(strlen($exten[count($exten)-2])<4)
						{
				        $domain = $exten[count($exten)-2];
						}
						else
						{
						$domain = $exten[count($exten)-1];
						}
					}
					if(strlen($exten[count($exten)-1])==3)
					{	 
	                    $domain = $exten[count($exten)-1];				  
					}
					if(strlen($exten[count($exten)-1])>3)
			        {   
						$evo = explode ( ":", end($matches) );
						$exe = explode ( ".", $evo[count($evo)-2]);
					    $domain = $exe[count($exe)-1];
					}
        if ( is_numeric($domain))
			{
                     $domain = "";
					
			}
            


		if (count($exten)==2 || strlen($exten[count($exten)-2])>=3)
			{
			$urlmain = $exten[count($exten)-2].".".$domain;
			//$urlmain = end($matches);
			}        
		else 
			{
            $urlmain = $exten[count($exten)-3].".".$exten[count($exten)-2].".".$exten[count($exten)-1];
			}
		if (strlen($exten[count($exten)-1])<3 && (strlen($exten[count($exten)-2])==3))
			{
			$urlmain = $exten[count($exten)-3].".".$domain;
			}


		}
		if($count == 8 )
		{
			$rfc931 = $arr2[$u];
		}
		if($count == 9 )
		{
			$hierarchy_code = $arr2[$u];
		}
		if($count == 10 )
		{
			$type = $arr2[$u];
		}
		
	
	}//end ifelse inner


}//end for






	}//end if




$result = mysql_db_query($dbname,"INSERT INTO report(day,datetime,date,times,duration,client_address,result_codes,bytes,request_method,url,urlmain,domain,rfc931,hierarchy_code,type) VALUES ('$day','$datetime','$date','$timestemp','$duration','$client_address','$result_codes','$bytes','$request_method','$url','$urlmain','$domain','$rfc931','$hierarchy_code','$type')")or die('Error insert1');



//$result = mysql_db_query($dbname,"INSERT INTO domain(date,times,client_address,urlmain) VALUES ('$date','$timestemp','$client_address','$urlmain')")or die('Error insert2');

if ($bytes != 0)
	{
$result = mysql_db_query($dbname,"INSERT INTO byte(day,date,times,bytes) VALUES ('$day','$date','$timestemp','$bytes')")or die('Error insert3');
	}
}//end for
			
			
		}
	  }   
}
else
{
    echo "Unknown/not permitted file type" ; 
?>
<center>
<form action="main.php" method="post" enctype="multipart/form-data">
<input type="submit" name="submit" value="back" />
</form>
</center>
<?
}
}
function same()
{
?>
<center>
<p align=center><font size = "4">There is same name/Not selected file </font></p>
<form action="main.php" method="post" enctype="multipart/form-data">
<input type="submit" name="submit" value="back" />
</form>
</center>
<?
die();
}


<?
$all = file_get_contents('upload/access.log');

$arr = explode ( "\r", $all );
?>
<?
$host="localhost";
$user="root";
$pw="root";
$dbname="logfiles";
$c = mysql_connect($host,$user,$pw);
if (!$c) {
            echo "<h4>ERROR : Can't connect database </h4>";
         }
mysql_select_db($dbname,$c) or die("äÁèÊÒÁÒÃ¶ãªé°Ò¹¢éÍÁÙÅ $dbname ä´é");
?>
<table border="1">
<tr>
<th>time</th>
<th>duration</th>
<th>client_address</th>
<th>result_codes</th>
<th>bytes</th>
<th>request_method</th>
<th>URL</th>
<th>7.1</th>
<th>7.2</th>
<th>rfc931</th>
<th>hierarchy_code</th>
<th>type</th>
</tr> 
<?
$i = 0;
$c = 0;
?>

<?
for($q=0; $q<count($arr);$q++)
{
	$count=0;

	if($arr[$q]!= NULL)
	{
?>
<tr>
<?
$arr2 = explode ( " ", $arr[$q] );

//echo $arr2[2];
for($x=0; $x < count($arr2); $x++)
		{
	
	
	if($arr2[$x] != " ")
		    {
                 $aab = $arr2[$x];


                /*     
				{
                     $abc[$y] = $arr2[$x];

					 
				}*/



                     //echo $ab = $abc[$y],"---"; 
				if($aab != NULL)	 
			
					 for($y=0; $y <= count($x);$y++)
				{
					 
				          {    
						       $aac[$y] = $aab;
				               //echo $aab,"( )";
							   
							   

						  }
//print_r ($aac);
				}      

					    //echo "<br/>";
					  // else if ($x) 

//echo "-",$arr2[$u],"-";
			}
					// ($abc);++++++++++++++++
					 //if($count == 10 )echo "<br/>";

             
		}//echo $cba ," ";++++++++++++++++++++


        
		     
		}



for($u=0; $u < count($arr2); $u++)
{
	if($arr2[$u] != NULL){
		$count++;

        if($count == 3)
		{
			echo $arr2[$u];
		}       
		if($count == 7 )
		{
			$pattern = "/http:\/\/([^\/]+)\//i";
			preg_match($pattern, $arr2[$u], $matches);
			
			$exten = explode ( ".", $matches[1] );
			
			
			?>
           		<td style="text-align:center"><?=$arr2[$u]?></td>
            	<td style="text-align:center"><?=$matches[1]?></td>
            <?
					if(strlen($exten[count($exten)-1])<3)
				    {
			?>
            			<td style="text-align:center"><?=$exten[count($exten)-2]?></td>
            <?      
				        $type = $exten[count($exten)-2];
					}
					else
					{
			?>
						<td style="text-align:center"><?=$exten[count($exten)-1]?></td>
            <? 	    				    
	                    $type = $exten[count($exten)-1];
			       $x = 0 ;
				    $db[$x] = $da[$y];
					$x++;
					}
$time = $arr2[0];



$result = mysql_db_query($dbname,"INSERT INTO report(times) VALUES ('$time')")or die('Error insert');
 




$timestamp = '1332513245.140';
//echo  date(" o-m-d-h:i:s A ", $timestamp);




 
 echo  $type = $exten[count($exten)];
                  
					

		}
		
		else		
		{
?>

		<td style="text-align:center"><?=$arr2[$u]?></td>
<?


		}//ifelse inner 
	}//end if 
}//end for




?>
</tr>
<?
	


	
	
}
?>
</table>
<?

$sql = mysql_db_query($dbname,'Select *,count(type) AS count from domain GROUP BY type')or die('Error conndting to mysql');
			
	                while($result = mysql_fetch_array($sql))
						{
		           //echo  $result['type']." : ".$result['count']."<br>";
				        } 

			 //echo  $count;


//$all = file_get_contents('upload/access.log');

$data = explode ( "\r", $all );

for($q=0; $q<count($arr);$q++)
{
	$count=0;

	if($arr[$q]!= NULL)
	{
         
         
				  
				$rr = explode(' ', $data[$q]);
		
			 
	}
}



for($x=0; $x < count($rr); $x++);
		          
		{
			//print_r ($rr);
	        if($rr[$x] != ' ')
				{ 
				$qa = $rr[$x];
				
				
		print_r ($qa);

				for( $y=0;$y < count($x);$y++);
						{
					
						$df[$y] = $qa[$x];
						
						//print_r ($df);
						//echo $df[$y],"( )";
						}

				}
		}
                  if($as != NULL)
					{
						
					}



				





	

	     


        
	
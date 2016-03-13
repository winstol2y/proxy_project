<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
define("UPLOAD_DIR", "./");
define("WRITE_FILE", "result/all.txt");
if(isset($_FILES["filUpload"])){
	foreach ($_FILES["filUpload"]["name"] as $i => $filename){
		if(!empty($filename)){
			echo $filename,' : ';

			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],UPLOAD_DIR.$filename)) echo "OK";
			else echo '<span style="color: red;">fail!</span>';

			echo '<br />';
		}			
	}
} //end of adding file into server

if(isset($_POST['merge'])){ //merging file
	if(
		is_file(UPLOAD_DIR.WRITE_FILE) && 
		is_writable(UPLOAD_DIR.WRITE_FILE)
		) unlink(UPLOAD_DIR.WRITE_FILE);
	foreach (glob(UPLOAD_DIR."*.txt") as $filename) {
	    echo basename($filename)," : ";
	    if(is_readable($filename)){
	    	echo "Read OK!, ";
	    	if(
	    		file_put_contents(
	    			UPLOAD_DIR.WRITE_FILE, 
	    			file_get_contents($filename), 
	    			FILE_APPEND | LOCK_EX
	    			)===FALSE
	    		) echo '<span style="color: red;">fail to write!</span>';
	    	else echo "Write OK!";
	    } else echo '<span style="color: red;">fail to read!</span>';

	    echo '<br />';
	}
} //end of merging file
?>

<form name="form1" method="POST" action="?" enctype="multipart/form-data">
	<input type="file" name="filUpload[]"><br>
	<input type="file" name="filUpload[]"><br>
	<input type="file" name="filUpload[]"><br>
	<input name="btnSubmit" type="submit" value="Submit file only">
	<input name="merge" type="submit" value="Submit file and merge file">
</form>
</body>
</html>
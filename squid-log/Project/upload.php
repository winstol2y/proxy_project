<?php
  $realname = $HTTP_POST_FILES['file']['name'];
  if (is_uploaded_file($HTTP_POST_FILES['file']['tmp_name']))
  {
     copy($HTTP_POST_FILES['file']['tmp_name'], "./upload/$realname");
     echo "Upload Filename : " . $HTTP_POST_FILES['file']['name'];
  }
  else{
     echo"Upload not complete";
   }
?>
<center>
<form action="test.php" method="post" enctype="multipart/form-data">
  <div align="center">
    <input type="submit" name="submit" value="Result" />
  </div>
</form>
</center



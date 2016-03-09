<?php
	session_start();
	$userD = $_SESSION['userD'];
	echo "<pre>";
	var_dump($userD);
	echo "</pre>";
	if(!isset($userD))
	{
		echo '<script type="text/javascript">alert("Please Login");window.location.href = "index.php";</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Info</title>
</head>
<body>
	<table border="1" width="100%">
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Password</th>
			<th>Change</th>
		</tr>
		<tr>
			<td><?php echo $userD["name"]; ?></td>
			<td><?php echo $userD["surname"]; ?></td>
			<td><?php echo $userD["username"]; ?></td>
			<td><?php echo $userD["passwd"]; ?>"></td>
			<!--<td><input type="text" name="passwd" value="<?php echo $userD["passwd"]; ?>"><br></td>
			<td><input type="submit" value="Change Passwd"></td>-->
		</tr>
	</table>
</body>
</html>
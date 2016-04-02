<?php
	session_start();
	$userD = $_SESSION['userD'];
	//echo "<pre>";
	//var_dump($userD);
	//echo "</pre>";
	if(!isset($userD))
	{
		echo '<script type="text/javascript">alert("Please Login");window.location.href = "index.php";</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Info</title>
</head>
<body>
	<table border="1" width="100%">
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<tr>
			<td><?php echo $userD["name"]; ?></td>
			<td><?php echo $userD["surname"]; ?></td>
			<td><?php echo $userD["username"]; ?></td>
			<td><?php echo $userD["passwd"]; ?>"></td>
	</table>
</body>
</html>
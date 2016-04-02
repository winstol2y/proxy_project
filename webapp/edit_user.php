<?php 
	//edit_user.php
	session_start();
	$userD = $_SESSION['userD'];
	if(!isset($userD))
	{
		echo '<script type="text/javascript">alert("Please Login");window.location.href = "index.php";</script>';
	}
	elseif($userD["type"] != 0)
	{
		echo '<script type="text/javascript">alert("Admin Only");window.location.href = "index.php";</script>';
	}

	require_once ('./m/m.connect.inc.php');
	require_once ('./m/m.member.inc.php');

	$edit_id = isset($_GET['id']) ? $_GET['id'] : "";

?>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
		<h1 align="center">Edit User</h1>
	<form action="c/c.edit_user.php" method="post">
		<input type="hidden" name="id" value="<?php echo $edit_id; ?>">
		<label>ID</label> <input class="text" type="text"  value="<?php echo $edit_id; ?>"  disabled/>
		<label>Name</label> <input class="text" name="name" type="text" />
		<label>Surname</label> <input class="text" name="surname" type="text" />
		<label>Passwd</label> <input class="text" name="passwd" type="text" />
		<label>Type of User</label>  <select name="type">
  							<option value="0">Admin</option>
  							<option value="1">User</option>
						</select>
		<input type="submit" value="Edit">
	</form>
</body>
</html>
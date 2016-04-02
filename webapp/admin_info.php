<?php
	require_once ('m/m.connect.inc.php');
	require_once ('m/m.member.inc.php');
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
	else
	{
		$get_m = get_Member();
		var_dump($get_m);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1 align="center">Admin Page</h1>
	<h2 align="center">All User Info</h1>
	<form>
		<table border="1" style="width:100%">
			<tr>
				<th>ID</th>
        		<th>Name</th>
        		<th>Surname</th>
        		<th>Username</th>
        		<th>Type of User</th>
        		<th>Function</th>
			</tr>
			<?php
				foreach ($get_m as $key => $value) 
				{
					echo "<tr>";
						echo "<td>".$value['id']."</td>";
						echo "<td>".$value['name']."</td>";
						echo "<td>".$value['surname']."</td>";
						echo "<td>".$value['username']."</td>";
						if($value['type'] == 0)
						{
							echo "<td>Admin</td>";
						}
						else
						{
							echo "<td>User</td>";
						}
						//echo "<td>".$value['type']."</td>";
						echo "<td>";
							echo "<a href= \"c/c.delete_user.php?id=".$value['id']."\">Delete</a>";
							echo "<a href= \"edit_user.php?id=".$value['id']."\">Edit</a>";
						echo "</td>";
					echo "</tr>";
				}
		  	?>
		</table>
	</form>

	<label>Add User :</label>
	<form action="c/c.add_user.php" method="post">
		Name : <input class="text" name="name" type="text" />
		Surname : <input class="text" name="surname" type="text" />
		Username : <input class="text" name="username" type="text" />
		Passwd : <input class="text" name="passwd" type="text" />
		Type of User :  <select name="type">
  							<option value="0">Admin</option>
  							<option value="1">User</option>
						</select>
		<input type="submit" value="Add">
	</form>
</body>
</html>
<?php
	//m.member.inc.php
	function login($user,$pass)
	{
		$connect = connecttoDB();
		$query = 'SELECT * FROM `member` WHERE `username` = :username AND `passwd` = :password';
		$stmt = $connect->prepare($query);
		$stmt->execute(array(':username' => $user,':password' => $pass ));
		$getD = $stmt->fetch(PDO::FETCH_ASSOC);
		return $getD;
	}
	function get_Member()
	{
		$connect = connecttoDB();
		$query = "SELECT * FROM `member`";
		$stmt = $connect->prepare($query);
		$stmt->execute();
		$re_getM = array();
		while($getM = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			array_push($re_getM, $getM);
		}
		return $re_getM;
	}

	function get_Member_ID($id)
	{
		$connect = connecttoDB();
		$query = "SELECT * FROM `member `WHERE `id`=".$id;
		$stmt = $connect->prepare($query);
		$param = array(
        	":id" => $id
    	);
		$stmt->execute();
		$getM = $stmt->fetch(PDO::FETCH_ASSOC);
		return $getM;
	}
	function add_user($name, $surname, $username, $passwd, $type) 
	{
    	$connect = connecttoDB();
    	$sqlCommand = "INSERT INTO `member`(`name`, `surname`, `username`, `passwd`, `type`) VALUES (:name,:surname,:username,:passwd,:type)";
    	$sth = $connect->prepare($sqlCommand);
    	$param = array(
    	    ":name" => $name,
    	    ":surname" => $surname,
    	    ":username" => $username,
    	    ":passwd" => $passwd,
    	    ":type" => $type
    	);
    	$sth->execute($param);

    	return $sth->rowCount() > 0;
	}

	function edit_user($id, $name, $surname, $passwd, $type) 
	{
	    $connect = connecttoDB();
	    $sqlCommand = "UPDATE `member` SET `name`=:name,`surname`=:surname,`passwd`=:passwd,`type`=:type WHERE  `id`=:id ";
	    $sth = $connect->prepare($sqlCommand);
	    $param = array(
	        ":id" => $id,
	        ":name" => $name,
	        ":surname" => $surname,
	        ":passwd" => $passwd,
	        ":type" => $type
	    );
	    $sth->execute($param);
	
	    return $sth->rowCount() > 0;
	}

	function delete_user($id) 
	{
	    $connect = connecttoDB();
	    $sqlCommand = "DELETE FROM `member` WHERE `id` = :id";
	    $sth = $connect->prepare($sqlCommand);
	    $param = array(
	        ":id" => $id
	    );
	    $sth->execute($param);
	
	    return $sth->rowCount() > 0;
	}
?>	
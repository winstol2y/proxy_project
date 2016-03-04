<?php
	require_once ('function.inc.php');
	class Member
	{
		
		protected $id;
		protected $name;
		protected $surname;
		protected $username;
		protected $passwd;
		public function __construct($id)
		{
			$connect = connecttoDB();
			$this->id = $id;
			$mData = array(':id' => $this->id);
			$memberQ = 'SELECT * FROM `member` WHERE `id` = :id';
			$stmt = $connect->prepare($memberQ);
			$stmt->execute($mData);
			$getM = $stmt->fetchAll();
			foreach ($getM as $key) 
			{
				$this->name = $key['name'];
				$this->surname = $key['surname'];
				$this->username = $key['username'];
				$this->passwd = $key['passwd'];
			}
		}
		public function __destruct()
		{
			$this->save();
		}
		public function toArray()
		{
			return array('name' => $this->name, 'surname' => $this->surname, 'username' => $this->username , 'passwd' => $this->passwd);
		}
		public function setProperty($mData)
		{
			if(isset($mData['name']))
			{
				$this->name = $mData['name'];
			}
			if(isset($mData['surname']))
			{
				$this->name = $mData['surname'];
			}
			if(isset($mData['passwd']))
			{
				$this->name = $mData['passwd'];
			}
		}
		public function save()
		{
			$connect = connecttoDB();
			$mData = array(':name' => $this->name, ':surname' => $this->surname, ':passwd' => $this->passwd ,':id' => $this->id);
			$saveQ = 'UPDATE `webapp`.`member` SET `name` = :name,`surname` = :surname,`passwd` = :passwd WHERE `member`.`id` = :id';
			$query = $connect->prepare($saveQ);
        	$query->execute($mData);
		}
	}
?>
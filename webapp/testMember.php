<?php 
	//test class.Member.inc.php
	require_once ('class.Member.inc.php');
	$test = new Member (6);
	echo "<pre>";
	var_dump($test);
	echo "</pre>";
	$test -> setProperty (array('name' => 'testMember'));
	echo "<pre>";
	var_dump($test);
	echo "</pre>";
	var_dump($test->toArray());
?>
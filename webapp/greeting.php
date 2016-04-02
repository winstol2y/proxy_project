<?php
session_start();
if (!isset($_SESSION['username'])){
	echo "No permission to view the page";
	exit();
}
echo "hello ".$_SESSION['username']."<br/>";
echo "Your password is ".$_SESSION['password']."<br/>";
print_r($_SESSION['arr']);
echo "<br/>";
?>

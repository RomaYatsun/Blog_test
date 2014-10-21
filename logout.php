<?php
require_once('config.php');
require_once('functions.php');
session_start();
if(!empty($_SESSION['username']) AND !empty($_SESSION['password']))
{ 

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	header("Location:index.php");

} 
else { 
echo 'PLEASE LOG IN'; 
echo "<a href='index.php'>HOME PAGE</a>";
} 
?>
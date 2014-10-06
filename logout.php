<?php
require_once('config.php');
require_once('functions.php');
session_start();
if(!empty($_SESSION['username']) AND !empty($_SESSION['password']))
{ 
if (!check($db, $_SESSION['username'])) {
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	session_destroy();
	header("Location:index.php");
}
} 
else { 
echo 'PLEASE LOG IN'; 
echo "<a href='index.php'>HOME PAGE</a>";
} 
?>
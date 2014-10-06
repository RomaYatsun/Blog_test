<?php

	require_once('../config.php');
	require_once('../functions.php');
	session_start();
	if (check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
	
	if (isset($_POST['title']) AND isset($_POST['content'])) 
	{
		
		
		if (articles_new($db, $_POST['title'], $_POST['content']))
		{
	header("Location:admin-panel.php");	
	die();
		}
		$title = $_POST['title'];
		$content = $_POST['content'];
	}
	else
	{
		$title = '';
		$content = '';
	}
	include('../theme/insert.php');
	}
	else
		header("Location:../index.php");
?>
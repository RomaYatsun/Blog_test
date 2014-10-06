<?php
require_once('functions.php');
require_once('config.php');
session_start();
if (empty($_SESSION['username'])) {
	$author = 'Guest';
}
else
$author = $_SESSION['username'];
$comments = get_comment($db, $_GET['id']);
if ($art = articles_get($db, $_GET['id']))
	{
		$title = $art["title"];
		$content = $art["content"];
	}
	else
	{
		echo mysql_error();
	}
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password']))
	{
		if(check_admin($db, $_SESSION['username'], $_SESSION['password']))
			{
				echo "<a href='admin/admin-panel.php'>ADMIN PANEL</a>";
			}
			else
				{
					echo "<a href='user-cabinet.php'>USER CABINET</a>";
				}
		echo "<br>";
		echo "<a href='logout.php'>LOGOUT</a><br>";
}
include('theme/article.php');
?>
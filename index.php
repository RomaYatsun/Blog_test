<?php
require_once('config.php');
require_once('functions.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BLOG_TEST</title>
		<meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	</head>
	<body>
<?php
session_start();
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
	else
		{
			echo "<form action='login.php' method='POST'>";
			echo "LOGIN <input name='login' type='text'><br>";
			echo "PASSWORD <input name='password' type='password'><br>";
			echo "<input name='submit' type='submit' value='LOG IN'>";
			echo "</form>";
			echo "<br>";
			echo '<a href="register.php">SING IN</a><br><br>';
		}
include('theme/main.php');

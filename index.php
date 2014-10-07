<?php
include('theme/header.php');
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
		echo "<p><a href='logout.php'>LOGOUT</a></p>";
	}
	else
		{
			include('login-form.php');
		}
include('theme/main.php');
include('theme/footer.php');
?>


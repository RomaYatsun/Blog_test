<?php
require_once('config.php');
require_once('functions.php');
session_start();
	if (isset($_SESSION['username']))
		{
		if(!check_admin($db, $_SESSION['username'], $_SESSION['password']))
			{
			if (isset($_FILES['file']))
				{
					upload_file($db, $_FILES['file'], $_SESSION['username']);
				}
				echo "<a href='index.php'>HOME PAGE</a><br>";
				echo "<a href='logout.php'>LOGOUT</a><br>";
				echo 'YOUR AVATAR: ';
				$sql = $db->prepare("SELECT * FROM users WHERE login=?");
				$sql->execute(array($_SESSION['username']));
				if (!$sql)
					{
						die(mysql_error());
					}
					$row = $sql->fetch();
					if ($row['avatar'] == '')
						{
							echo '<form method="post" enctype="multipart/form-data">';
							echo '<input type="file" name="file"/>';
							echo '<input type="submit" value="UPLOAD"/>';
							echo '</form>';
						}
						else
							{
								echo "<img src='". $row['avatar']."'/><br>";
								echo '<form method="post" enctype="multipart/form-data">';
							echo '<input type="file" name="file" />';
							echo '<input type="submit" value="CHANGE"/>';
							echo '</form>';
							}
			}
			else
				{
					header("Location:admin/admin-panel.php");
				}
		}
		else
			{
				echo lang('PLEASE LOG IN', $lang) .":<br>";
				echo "<form action='login.php' method='POST'>";
				echo lang('LOGIN', $lang) ." <input name='login' type='text'><br>";
				echo lang('PASSWORD', $lang) ." <input name='password' type='password'><br>";
				echo "<input name='submit' type='submit' value='".lang('LOGIN', $lang)."'>";
				echo "</form>";
				echo "<br>";
			}
?>

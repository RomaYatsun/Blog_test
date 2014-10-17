<?php
require_once('config.php');
require_once('functions.php');
session_start();
if (!empty($_SESSION['username'])) {
	$sql = $db->prepare("SELECT user_id FROM users WHERE login=?");
	$sql->execute(array($_SESSION['username']));
	if (!$sql) {
		die(mysql_error());
	}
	$row = $sql->fetch();
if (isset($_GET['vote'])) {
	if ($_GET['vote'] == 'up') {
		if (check_raiting($db, $row['user_id'], $_GET['id'])) {
			vote($db, 1, $_GET['id']);
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		else
			echo 'You have already voted';
	}
	elseif ($_GET['vote'] == 'down') {
		if (check_raiting($db, $row['user_id'], $_GET['id'])) {
			vote($db, -1, $_GET['id']);
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		else
			echo 'You have already voted';
	}
}
	else
	header("Location:index.php");
}
else
{
	echo "To vote you must be registered<br>";
echo "<a href=index.php>LOGIN</a><br>";
echo "<a href=register.php>SING UP</a><br>";}

?>

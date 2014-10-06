﻿	<!DOCTYPE html>
	<html>
	<head>
		<title>BLOG_TEST</title>
		<meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	</head>
	<body>
	<a href="./index.php">HOME PAGE</a>
	<h1><?=$title ;?></h1>
	<p><?=$content ;?></p>
	<form action='comments.php' method='POST'>
		USERNAME:<br><input type='text' name='username' value="<?=$author?>" required><br>
		COMMENT: <br><textarea type='text' name='comment' required></textarea><br>
		<input type='hidden' name='page_id' value="<?=$_GET['id']?>">
		<input type='submit' name='send' value='SEND'>
	</form>
<?php foreach ($comments as $comment): ?>
	<p>
		<?php
			$user = get_user($db, $comment['username']);
		?>
		AUTHOR: <?=$comment['username']?><img src="<?=$user['avatar']?>"><br>
		<?=$comment['text_comment']?><br>
		<?=$comment['date_time']?><br>
		<hr>
	<?php endforeach ?>
	<br>
</body>
</html>

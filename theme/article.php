<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
</head>
<body>
  <a href="./index.php">HOME PAGE</a>
  <h1><?=$title ;?></h1>
  <p><?=$content ;?></p>
  <em>Author - <?=$author?></em><br><br><br>
  <form action='comments.php' method='POST'>
  	USERNAME:<br><input type='text' name='username' value="<?=$username?>" required><br>
  	COMMENT: <br><textarea type='text' name='comment' required></textarea><br>
  	<input type='hidden' name='page_id' value="<?=$_GET['id']?>">
  	<input type='submit' name='send' value='SEND'>
  </form>
  <?php foreach ($comments as $comment): ?>
  <?php
  $user = get_user($db, $comment['username']);
  ?>
  <p>AUTHOR: <?=$comment['username']?>
  	 <img src="<?=$user['avatar']?>"><br>
  </p>
    <?=$comment['text_comment']?><br>
    <?=$comment['date_time']?><br>
 	<hr>
 <?php endforeach ?>
 <br>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
</head>
<body>
  <h1><?=$title ;?></h1>
  <p><?=$content ;?></p>
  <em><?=lang($db,$lang, 'Author')?> - <a href="view-profile.php?id=<?=$author?>"><?=$author?></a></em><br><br><br>
  <form action='comments.php' method='POST'>
    <input type='hidden' name='username' value="<?=$username?>">
  	<?=lang($db, $lang, 'Title')?>:<br>
    <input type='text' name='title' ><br>
  	<?=lang($db, $lang, 'Comment')?>: <br>
    <textarea type='text' name='comment' required></textarea><br>
  	<input type='hidden' name='page_id' value="<?=$_GET['id']?>">
  	<input type='submit' name='send' value='SEND'>
  </form>
  <?php foreach ($comments as $comment): ?>
  <?php
  $user = get_user($db, $comment['username']);
  ?>
  <p><?=lang($db, $lang, 'Author')?>: <a href="view-profile.php?id=<?=$user['login']?>"><?=$user['login']?></a>
  	 <img height="50" width="50" src="<?=$user['avatar']?>"><br>
  </p>
  Title: <?=$comment['title_comment']?><br>
    Comment: <?=$comment['text_comment']?><br>
    <?=$comment['date_time']?><br>
 	<hr>
 <?php endforeach ?>
 <br>
</body>
</html>

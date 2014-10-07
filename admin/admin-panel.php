<?php
require_once('../config.php');
require_once('../functions.php');
$articles = articles_all($db);
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  if (check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
  	echo "<h1>ADMIN PANEL</h1>";
  	echo "<br>";
  	echo "<a href='../logout.php'>LOGOUT</a><br>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?=$blog_title?></title>
</head>
<body>
  <a href="new.php"><?='ADD NEW ARTICLE'; ?></a>
  <a href="../index.php"><?='HOME PAGE'; ?></a>
  <?php
  foreach ($articles as $article): ?>
  <p>
  	<a href="./editor.php?id=<?=$article['id_article']; ?>">
  	  <?=$article['title']?>
  	</a>
  	>>>>>>>> RAITING: <?=$article['raiting'];?>
  	<a href="./editor.php?id=<?=$article['id_article']?>">CHANGE</a>
  </p>
<?php endforeach ?>
<?php }
  else {
  	echo 'YOU DONT HAVE PERMISSION<br>';
  	echo '<a href="../index.php">LOG IN</a><br><br>';
  }
}
else {
  echo 'YOU DONT HAVE PERMISSION<br>';
  echo '<a href="../index.php">LOG IN</a><br><br>';
}
?>
</body>
</html>
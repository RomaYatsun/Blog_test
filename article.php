<?php 
require_once('theme/header.php');

if (empty($_SESSION['username'])) {
  $username = 'Guest';
}
else
	$username = $_SESSION['username'];
$comments = get_comment($db, $_GET['id']);

if ($art = articles_get($db, $_GET['id'])) {
  $title = $art["title_$lang"];
  $content = $art["content_$lang"];
  $author = $art['author'];
}
else
  echo mysql_error();

include('theme/article.php');
?>
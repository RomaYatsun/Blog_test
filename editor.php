<?php
require_once('functions.php');
require_once('config.php');
require_once('theme/header.php');
if ($user['role']==2 or $user['role'] == 1) {
  if (isset($_GET['id'])) {
  	$articles = articles_get($db, $_GET['id']);
  	if (isset($_POST['upd'])) {
  	  if (articles_edit($db, $_POST['id'], $_POST['title'], nl2br($_POST['content']))) {
  	  	  header('Location: user-articles.php');
  	  }
  	  else {
  	  	$id = $_POST['id'];
  	  	$title = $_POST['title'];
  	  	$content = $_POST['content'];
  	  }
  	}
  	elseif (isset($_POST['del'])) {
  	  if (articles_delete($db, $_POST['id'])) {
  	  	header('Location: user-articles.php');
  	  }
  	}
  	else {
  	  $id = $articles['id_article'];
  	  $title = $articles['title'];
  	  $content = $articles['content'];
  	}
  	include('theme/user-editor.php');
  	$comments = get_comment($db, $_GET['id']);
  	foreach ($comments as $comment) {
  	  echo "Автор: ";
  	  echo $comment['username']."<br>";
  	  echo $comment['text_comment']."<br>";
  	  echo $comment['date_time']."<br>";
  	  
  	}
  }
}
else
  header("Location:index.php");
?>

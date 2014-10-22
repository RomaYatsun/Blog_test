<?php
require_once('functions.php');
require_once('config.php');
require_once('theme/header.php');
if ($user['role']==2 or $user['role'] == 1) {
    if (isset($_GET['id'])) {
    $articles = articles_get($db, $_GET['id']);
    if (isset($_POST['upd'])) {
      if (articles_edit_en($db, $_POST['id'], $_POST['title_en'], nl2br($_POST['content_en']))) {
       header('Location: user-articles.php');
        
      }
      else {
        $id = $_POST['id'];
        $title = $_POST['title_en'];
        $content = $_POST['content_en'];
      }
    }
    elseif (isset($_POST['add'])) {
     if (articles_edit_ua($db, $_POST['id'], $_POST['title_ua'], nl2br($_POST['content_ua']))) {
       header('Location: user-articles.php');
        
      }
      else {
        $id = $_POST['id'];
        $title = $_POST['title_ua'];
        $content = $_POST['content_ua'];
      }
    }
    elseif (isset($_POST['del'])) {
      if (articles_delete($db, $_POST['id'])) {
        header('Location: user-articles.php');
      }
    }
    else {
      $id = $articles['id_article'];
      $title = $articles["title_$lang"];
      $content = $articles["content_$lang"];
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

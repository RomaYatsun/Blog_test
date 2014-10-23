<?php
require('../functions.php');
require('../config.php');
session_start(); 
$lang = $_SESSION['lang_site'];

if(check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
  if (isset($_GET['id'])) {
  	$articles = articles_get($db, $_GET['id']);
  	if (isset($_POST['upd'])) {
  	  if (articles_edit_en($db, $_POST['id'], $_POST['title_en'], nl2br($_POST['content_en']))) {
        change_raiting($db, 'raiting_up', $_POST['id'], $_POST['raiting_up']);
        change_raiting($db, 'raiting_down', $_POST['id'], $_POST['raiting_down']);
       header('Location: admin-panel.php');
        
  	  }
  	  else {
  	  	$id = $_POST['id'];
  	  	$title = $_POST['title_en'];
  	  	$content = $_POST['content_en'];
  	  }
             change_raiting($db, 'raiting_up', $_POST['id'], $_POST['raiting_up']);
        change_raiting($db, 'raiting_down', $_POST['id'], $_POST['raiting_down']);
  	}
    elseif (isset($_POST['add'])) {
     if (articles_edit_ua($db, $_POST['id'], $_POST['title_ua'], nl2br($_POST['content_ua']))) {
        
       header('Location: admin-panel.php');
        
      }
      else {
        $id = $_POST['id'];
        $title = $_POST['title_ua'];
        $content = $_POST['content_ua'];
      }
    }
  	elseif (isset($_POST['del'])) {
  	  if (articles_delete($db, $_POST['id'])) {
  	  	header('Location: admin-panel.php');
  	  }
  	}
  	else {
  	  $id = $articles['id_article'];
  	  $title = $articles["title_$lang"];
  	  $content = $articles["content_$lang"];
  	}
  	include('../theme/editor.php');
  	$comments = get_comment($db, $_GET['id']);
  	foreach ($comments as $comment) {
  	  echo lang($db, $lang, 'Author') . ": ";
  	  echo $comment['username']."<br>";
  	  echo $comment['text_comment']."<br>";
  	  echo $comment['date_time']."<br>";
  	  echo "<a href='delete-comment.php?id_comment={$comment['id_comment']}'>". lang($db, $lang, 'Delete'). "</a><br><hr>";
  	}
  }
}
else
  header("Location:../index.php");
?>

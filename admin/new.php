<?php
require_once('../config.php');
require_once('../functions.php');
session_start();
$user = get_user($db, $_SESSION['username']);
if ($user['role'] == '1' or $user['role'] == '2') {
  if (isset($_POST['title']) AND isset($_POST['content'])) {
  	if (articles_new($db, $_POST['title'], nl2br($_POST['content']), $user['login'])) {
  	  header("Location:../index.php");
  	  die();
  	}
  	$title = $_POST['title'];
  	$content = $_POST['content'];
  }
  else {
    $title = '';
    $content = '';
  }
  include('../theme/insert.php');
}
else
  header("Location:../index.php");
?>
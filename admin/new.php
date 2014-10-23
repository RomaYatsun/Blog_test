<?php
require_once('../config.php');
require_once('../functions.php');
session_start();
if (isset($_SESSION['lang_site']))
  {
    $lang = $_SESSION['lang_site'];

  }
  else
    {
      $_SESSION['lang_site'] = 'en';
    }
if (isset($_GET['lang']))
  {
    $lang=$_GET['lang'];
    $_SESSION['lang_site'] = $lang;
  }
$user = get_user($db, $_SESSION['username']);
if ($user['role'] == '1' or $user['role'] == '2') {
  if (isset($_POST['add'])) {
    if ($_POST['title_en'] == '') {
      echo "ERROR: The title is NULL";
      $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];
    $title_ua = $_POST['title_ua'];
    $content_ua = $_POST['content_ua'];
    }
    else {
      if (articles_new_en_ua($db, $_POST['title_en'], $_POST['title_ua'], nl2br($_POST['content_en']), nl2br($_POST['content_ua']), $user['login'])) {
      header("Location:../index.php");
      die();
    }
    $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];
    $title_ua = $_POST['title_ua'];
    $content_ua = $_POST['content_ua'];
    }
  }
  else {
    $title_en = '';
    $content_en = '';
    $title_ua = '';
    $content_ua = '';
  }
  /*if (isset($_POST['en'])) {
   if (isset($_POST['title']) AND isset($_POST['content'])) {
    if (articles_new_en($db, $_POST['title'], nl2br($_POST['content']), $user['login'])) {
      header("Location:../index.php");
      die();
    }
    $title = $_POST['title'];
    $content = $_POST['content'];
  }
  
  }
  elseif (isset($_POST['ua'])) {
    if (isset($_POST['title']) AND isset($_POST['content'])) {
    if (articles_edit_ua($db, $_POST['title'], nl2br($_POST['content']), $user['login'])) {
      header("Location:../index.php");
      die();
    }
    $title = $_POST['title'];
    $content = $_POST['content'];
  }
  
  }
  else {
    $title = '';
    $content = '';
  }
  */
  include('../theme/insert.php');
}
else
  header("Location:../index.php");
?>
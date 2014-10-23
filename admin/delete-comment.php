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
if(check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
  if (isset($_GET)) {
  	if (delete_comment($db, $_GET['id_comment'])) {
  	  header("Location:{$_SERVER['HTTP_REFERER']}");
  	}
  	else
  	  echo "ERROR";
  }
  else
  	header('Location:$_SERVER["HTTP_REFERER"]');
}
else
  header("Location:../index.php");	
?>
<?php
/*login.php*/
require_once('config.php');
require_once('functions.php'); 
if (isset($_POST['login']) and isset($_POST['password'])) {
  if(check_login($db, $_POST['login'], $_POST['password'])) {
    session_start();
    $_SESSION['username'] = $_POST['login'];
    $_SESSION['password'] = md5(md5($_POST['password']));
    if (check_admin($db, $_POST['login'], $_POST['password'])) {
      header("Location:admin/admin-panel.php");
    }
    else {
      header("Location:{$_SERVER['HTTP_REFERER']}");
    }
  }
  else {
    echo 'YOUR LOGIN OR PASSWORD IS NOT CORRECT';
    echo "<a href='index.php'>TRY AGAIN</a>";
  }
}
else
  header("Location:index.php");
?>

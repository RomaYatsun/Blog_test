<?php
include_once('config.php');
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
if (isset($_POST) and $_SESSION['username'] == 'admin') {
  if ($_GET['del'] == 'admin') {
     header("Location:index.php");
  }
  elseif (isset($_POST['yes']) ) {
   $sql = $db->prepare("DELETE FROM users WHERE login = :login");
        $sql->execute(array(':login' => $_SESSION['username']));
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['last_login']);
        session_destroy();
        header("Location:index.php");
  }
  elseif (isset($_POST["no"])) {
      header("Location:index.php");
    }
}
    
?>
<form method='POST'>
  Do you really want delete your profile?<br>
  <input type='submit' name='yes' value='Yes' />
  <input type='submit' name='no' value='No' />
</form>
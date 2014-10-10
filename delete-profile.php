<?php
include_once('config.php');
session_start();

    if (isset($_POST['yes'])) {
      if ($_GET['del'] == $_SESSION['username']) {
        $sql = $db->prepare("DELETE FROM users WHERE login = :login");
        $sql->execute(array(':login' => $_SESSION['username']));
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['last_login']);
        session_destroy();
        header("Location:index.php");
      }
      else
        echo "Problem";
    }
    elseif (isset($_POST["no"])) {
      header("Location:index.php");
    }
?>
<form method='POST'>
  Do you really want delete your profile?<br>
  <input type='submit' name='yes' value='Yes' />
  <input type='submit' name='no' value='No' />
</form>
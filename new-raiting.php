<?php
require_once('config.php');
require_once('functions.php');
session_start();
if (!empty($_SESSION['username'])) {
  $sql = $db->prepare("SELECT user_id FROM users WHERE login=?");
  $sql->execute(array($_SESSION['username']));
  if (!$sql) {
    die(mysql_error());
  }
  else
    $row = $sql->fetch();
  if (isset($_POST)) {
    if (isset($_POST['delete'])) {
      //$e = delete_vote($db, $_POST['id'], $_SESSION['username']);

     if (delete_vote($db, $_POST['id'], $_SESSION['username'])) {
       header("Location: {$_SERVER['HTTP_REFERER']}");
      }
     else
        echo "ERROR";
    }
    elseif (isset($_POST['rating'])) {
      if (check_rating($db, $_POST['id'], $_SESSION['username'], $_POST['rating'])) {
        if (isset($_POST['rating'])  == 1) {
          vote($db, $_POST['id'], $_POST['rating']);
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        elseif (isset($_POST['rating']) == 2) {
          vote($db, $_POST['id'], $_POST['rating']);
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        elseif (isset($_POST['rating']) == 3) {
          vote($db, $_POST['id'], $_POST['rating']);
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        elseif (isset($_POST['rating']) == 4) {
          vote($db, $_POST['id'], $_POST['rating']);
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        elseif (isset($_POST['rating']) == 5) {
          vote($db, $_POST['id'], $_POST['rating']);
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
      }
      elseif (!check_rating($db, $_POST['id'], $_SESSION['username'], $_POST['rating'])) {
        echo 'You have already voted';
      }
    }
  }
}
else {
  echo "To vote you must be registered<br>";
  echo "<a href=index.php>LOGIN</a><br>";
  echo "<a href=register.php>SING UP</a><br>";
}

?>

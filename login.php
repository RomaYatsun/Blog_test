<?php
/*login.php*/
require_once('config.php');
require_once('functions.php'); 
if (isset($_POST['login']) and isset($_POST['password'])) {
  $user = get_user($db, $_POST['login']);
  if ($user['role'] == '2') {
      echo "You are BLOCKED";
    }
    else{
      if(check_login($db, $_POST['login'], $_POST['password'])) {
          session_start();
          $_SESSION['username'] = $_POST['login'];
          $_SESSION['password'] = md5(md5($_POST['password']));
          $_SESSION['last_login'] = date('Y-m-d H:i:s');
          $login = $_SESSION['username'];
          $last_login = $_SESSION['last_login'];
          $sql = $db->query("UPDATE users SET last_login = '". $last_login . "' WHERE login= '". $login . "'");
          if (!$sql) {
            die(mysql_error());
          
        }
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
      }}
}
else
  header("Location:index.php");
?>

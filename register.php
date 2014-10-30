<?php
require_once('functions.php');
require_once('config.php');
require_once('theme/header.php');
if (isset($_POST['submit'])) {
  $err = array();
  filter_var('example@mail.ru', FILTER_VALIDATE_EMAIL);

  if(preg_match("/[<>\/]/", $_POST['login']) || preg_match("/[<>\/]/",
  	  $_POST['password'])) {
    $err[] = 'Login and password must only be from the english alphabet and numbers';
  }
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err[] = "E-mail is not correct";
}

  if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
    $err[] = 'Login must be at least 3 characters';
  }

  if (!check($db, $_POST['login'], $_POST['email'])) {
  	$err[] = 'This login already exists';
  }

  if (!check_email($db, $_POST['email'])) {
    $err[] = 'This email already exists';
  }


  if ($_POST['password']!==$_POST['re-password']) {
    $err[] = 'Password not equal re-password';
  }

  if (count($err) == 0) {
    $date = date('Y-m-d');
    $email = $_POST['email'];
  	$login = $_POST['login'];
  	$password = md5(md5(trim($_POST['password'])));
    $avatar='img/default-avatar.gif';
  	$sql = $db->prepare("INSERT INTO users (email, login, password, avatar, date_time, role)
  	  VALUES (:email, :login, :password, :avatar, :date_time, :role)");
  	$result = $sql->execute(array(':email'=>$email, ':login'=>$login, ':password'=>$password, ':avatar'=>$avatar, ':date_time'=>$date, ':role'=>'3'));
  	if (!$result)
  		die(mysql_error());
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
  	header("Location: index.php");
  	exit();
  }
  else {
  	print "<b>When you register the following error:</b><br>";
  	foreach ($err as $error) {
  	  print $error. "<br>";
  	}
  }
}
?>
      <form method="POST" id='form' >
        <label for='login'>Login</label><input type="text" name="login" id="login" required><span></span><br>
        <label>Password</label><input name="password" type="password" id="password" required><span></span><br>
        <label>Re-password</label><input name="re-password" type="password" id="re-password" required><span></span><br>
        <label>E-mail</label><input name="email" type="email" id="email" required><span></span><br>
        <input name="submit" type="submit" value='Sing in'>
      </form>
  
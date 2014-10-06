<?php
require('config.php');
require_once('functions.php');
if (isset($_POST['submit'])) {
  $err = array();
  if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login']) || !preg_match("/^[a-zA-Z0-9]+$/",
  	  $_POST['password'])) {
    $err[] = 'LOGIN AND PASSWORD MUST ONLY BE FROM THE ENGLISH ALPHBET NAD NUMBERS';
  }
  if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
    $err[] = 'LOGIN MUST BE AT LEAST 3 CHARACTERS';
  }
  if (!check($db, $_POST['login'])) {
  	$err[] = 'THIS LOGIN ALREADY EXISTS';
  }
  if (count($err) == 0) {
  	$login = $_POST['login'];
  	$password = md5(md5(trim($_POST['password'])));
  	$sql = $db->prepare("INSERT INTO users (login, password, is_admin)
  	  VALUES (:login, :password, :is_admin)");
  	$result = $sql->execute(array(':login'=>$login, ':password'=>$password, ':is_admin'=>'0'));
  	if (!$result)
  		die(mysql_error());
  	header("Location: index.php");
  	exit();
  }
  else {
  	print "<b>WHEN YOU REGISTER THE FOLLOWING ERROR:</b><br>";
  	foreach ($err as $error) {
  	  print $error. "<br>";
  	}
  }
}
?>

<form method="POST">

LOGIN <input name="login" type="text" required><br>

PASSWORD <input name="password" type="password" required><br>

<input name="submit" type="submit" value="<?='SING IN'?>">

</form>
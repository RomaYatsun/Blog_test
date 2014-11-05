<?php

require_once('functions.php');
require_once('config.php');
session_start();
if (isset($_SESSION['lang_site'])) {
$lang = $_SESSION['lang_site'];
}
else {
$_SESSION['lang_site'] = 'en';
}
if (isset($_GET['lang'])) {
if ($_GET['lang'] =='ua' || $_GET['lang']=='en') {
$lang=$_GET['lang'];
$_SESSION['lang_site'] = $lang;
}
else {
$_GET['lang']= $_SESSION['lang_site'];
}
}
$request_page=explode("/", $_SERVER['REQUEST_URI']);
$req_page=$request_page[2];
if(strpos($req_page, "lang"))
{
$req_page_en=str_replace("ua", "en", $req_page);
$req_page_ua=str_replace("en", "ua", $req_page);
}
else
{
if(strpos($req_page, "?"))
{
$req_page_en=$req_page."&lang=en";
$req_page_ua=$req_page."&lang=ua";
}
else
{
$req_page_en=$req_page."?lang=en";
$req_page_ua=$req_page."?lang=ua";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>BLOG_TEST</title>
<meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.js"></script>


</head>
<body>

<div class = 'wrapper'>
<a href="<?=$req_page_ua;?>"><img src="img/Ukraine.gif" alt="ua"/></a>
<a href="<?=$req_page_en;?>"><img src="img/usa.gif" alt="en"/></a>
<div class='login'>
<?php
if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
header("Location:index.php");
}
else {
    echo "<a href='index.php'>". lang($db, $lang, 'Home page'). "</a>";

}
?>
<h1 style='text-align:center'>TEST-BLOG</h1>
</div>
<?php


if (isset($_POST['submit'])) {
  
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



?>
      <form method="POST" id='form' >
        <label for='login'>Login</label><input type="text" name="login" id="login" ><span></span><br>
        <label>Password</label><input name="password" type="password" id="password" ><span></span><br>
        <label>Re-password</label><input name="re-password" type="password" id="re-password" ><span></span><br>
        <label>E-mail</label><input name="email" type="text" id="email" ><span></span><br>
        <input name="submit" type="submit" value='Sing in' id='submit'>
      </form>
      <span></span>
  <?php }?>
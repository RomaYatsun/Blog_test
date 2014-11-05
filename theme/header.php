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
if(check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
echo "<a href='admin/admin-panel.php'>". lang($db, $lang, 'Admin panel'). "</a>";
echo "<a href='index.php'>". lang($db, $lang, 'Home page'). "</a>";
echo "<a href='admin/admin-language.php'>". lang($db, $lang, 'Language'). "</a>";
}
else {
$user = get_user($db, $_SESSION['username']);
echo "<a href='user-cabinet.php'>". lang($db, $lang, 'User cabinet'). "</a>";
echo "<a href='view-profile.php'>". lang($db, $lang, 'View profile'). "</a>";
if ($user['role']==2) {
echo "<a href='admin/new.php'>". lang($db, $lang, 'Add new article'). "</a>";
echo "<a href='user-articles.php'>". lang($db, $lang, 'My articles'). "</a>";
}
echo "<a href='index.php'>". lang($db, $lang, 'Home page'). "</a>";
}
echo "<a href='logout.php'>". lang($db, $lang, 'Logout'). "</a>";
}
else {
    echo "<a href='index.php'>". lang($db, $lang, 'Home page'). "</a>";
    echo "<a href='register.php'>". lang($db, $lang, 'Sing in'). "</a>";
echo "<form action='login.php' method='POST' class='login'>";
echo "<label>". lang($db, $lang, 'Login'). "</label><input name='login' type='text'><br />";
echo "<label>". lang($db, $lang, 'Password'). "</label><input name='password' type='password'><br />";
echo "<input name='submit' type='submit' value='Log in'>";
echo "</form>";

}
?>
<h1 style='text-align:center'>TEST-BLOG</h1>
</div>
<?php
require_once('functions.php');
require_once('config.php');
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
  </head>
  <body>
    <div class = 'wrapper'>
      <a href="<?=$req_page_ua;?>"><img src="img/Ukraine.gif" alt="ua"/></a>
<a href="<?=$req_page_en;?>"><img src="img/usa.gif" alt="en"/></a>
    <div class='login'>
    <?php
    
    
   if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
      if(check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
        echo "<a href='admin/admin-panel.php'>Admin panel</a><br>";
        echo "<a href='index.php'>Home page</a><br>";
        echo "<a href='admin/admin-language.php'>Language</a><br>";
      }
      else {
        $user = get_user($db, $_SESSION['username']);
        echo "<a href='user-cabinet.php'>User cabinet</a><br>";
        echo "<a href='view-profile.php'>View profile</a><br>";
        if ($user['role']==2) {
          echo "<a href='admin/new.php'>Add new article</a><br>";
          echo "<a href='user-articles.php'>My articles</a><br>";
        }
        echo "<a href='index.php'>Home page</a><br>";
      }
      echo "<a href='logout.php'>Logout</a>";
    }
    else {
      echo "<form action='login.php' method='POST'>";
      echo "<span>Login</span> <input name='login' type='text'>";
      echo "<span>Password</span> <input name='password' type='password'>";
      echo "<input name='submit' type='submit' value='Log in'>";
      echo "</form>";
      echo "<a href='register.php'>Sing in</a>";
    }
    ?>
  </div>
   
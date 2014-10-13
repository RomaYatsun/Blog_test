<?php
require_once('functions.php');
require_once('config.php');

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
    <div class='login'>
    <?php
    session_start();
    
   if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
      if(check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
        echo "<a href='admin/admin-panel.php'>Admin panel</a><br>";
        echo "<a href='index.php'>Home page</a>";
      }
      else {
        $user = get_user($db, $_SESSION['username']);
        echo "<a href='user-cabinet.php'>User cabinet</a><br>";
        echo "<a href='view-profile.php'>View profile</a><br>";
        if ($user['role']==2) {
          echo "<a href='admin/new.php'>Add new article</a><br>";
          echo "<a href='user-articles.php'>My articles</a><br>";
        }
        echo "<a href='index.php'>Home page</a>";
      }
      echo "<p><a href='logout.php'>LOGOUT</a></p>";
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
   
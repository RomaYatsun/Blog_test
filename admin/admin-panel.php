<?php   
require_once('../config.php');
require_once('../functions.php');
$articles = articles_all($db);
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?=$blog_title?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class='wrapper'>
    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
      if (check_admin($db, $_SESSION['username'], $_SESSION['password'])) {
        echo "<h1>Admin panel</h1>";
        echo "<br>";
        echo "<a href='../logout.php'>Logout</a><br>";
        ?>
        <a href="new.php"><?='Add new article'; ?></a>
        <a href="../index.php"><?='Home page'; ?></a>
        <?php
        foreach ($articles as $article): ?>
        <p>
<a href="./editor.php?id=<?=$article['id_article']; ?>">
          <?=$article['title']?>
        </a>
        >>>>>>>> Raiting: <?=$article['raiting'];?>
        <a href="./editor.php?id=<?=$article['id_article']?>">Change</a>
      </p>
      <?php endforeach ?>
      <?php 

if (isset($_POST['find_user'])) {
      if (get_user($db, $_POST['user'])){
        $user = get_user($db, $_POST['user']);
        echo "<a href='../view-profile.php?id=" . $user['login'] . "'>" . $user['login'] . "</a>";
      }
      else
        echo "There is no such User";
    }

echo "<br><form method='POST'>";
  echo "<input type='text' name='user'/>";
  echo "<input type='submit' name='find_user' value='Find user'/>";
echo "</form>";
echo "</div>";
echo "</body>";
echo "</html>";








    }
      else {
        echo 'You dont have permission<br>';
        echo '<a href="../index.php">Log in</a><br><br>';
      }
    }
    else {
      echo 'You dont have permission<br>';
      echo '<a href="../index.php">Log in</a><br><br>';
    }
    

?>

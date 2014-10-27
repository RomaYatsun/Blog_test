<?php   
require_once('../functions.php');
require_once('../config.php');
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

$articles = articles_all($db, $_SESSION['lang_site']);
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
        echo "<h1>". lang($db, $lang, 'Admin panel') ."</h1>";
        echo "<br>";
        echo "<a href='../logout.php'>". lang($db, $lang, 'Logout') ."</a><br>";
        ?>
        <a href="new.php"><?=lang($db, $lang, 'Add new article') ?></a><br>
        <a href="admin-language.php"><?=lang($db, $lang, 'Language') ?></a><br>
        <a href="../index.php"><?=lang($db, $lang, 'Home page')?></a>
        <?php
        foreach ($articles as $article): ?>
       <!-- <p>
<a href="./editor.php?id=<?=$article['id_article']; ?>">
          <?=$article["title_{$_SESSION['lang_site']}"]?>
        </a>
        >>>>>>>> Raiting like: <?=$article['raiting_up'];?>Raiting don't like: <?=$article['raiting_down'];?>
        <a href="./editor.php?id=<?=$article['id_article']?>">Change</a>
      </p>
-->

       <p>
    Українська версія:
    <?php if ($article['title_ua'] == '') {
      ?>
      <a href="./editor.php?id=<?=$article['id_article']; ?>">
        Добавить
      </a>
      <?php }
      else
      ?>
      <a href="./editor.php?id=<?=$article['id_article']; ?>">
        <?=$article['title_ua']?>
      </a>
      ---English version:
      <?php if ($article['title_en'] == '') {
        ?>
        <a href="./editor.php?id=<?=$article['id_article']; ?>">
         <?= lang($db, $lang, 'Add')?>
        </a>
        <?php }
        else
        ?>
          <a href="./editor.php?id=<?=$article['id_article']?>">
            <?=$article['title_en']?>
          </a> --- <?= lang($db, $lang, 'Raiting')?>: <?=$article['raiting'];?>
          ---<a href="./editor.php?id=<?=$article['id_article']?>">
          <?= lang($db, $lang, 'Change')?>
        </a>
        </p>
      <?php endforeach ?>
      <?php 

if (isset($_POST['find_user'])) {
      if (get_user($db, $_POST['user'])){
        $user = get_user($db, $_POST['user']);
        echo "<a href='../view-profile.php?id=" . $user['login'] . "'>" . $user['login'] . "</a>";
      }
      else
        lang($db, $lang, 'There is no such User');
    }

echo "<br><form method='POST'>";
  echo "<input type='text' name='user'/>";
  echo "<input type='submit' name='find_user' value='" . lang($db, $lang, 'Find user') ."'/>";
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

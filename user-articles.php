<?php
require_once('functions.php');
require_once('config.php');
require_once('theme/header.php');
if (isset($_SESSION['username'])) {
  $user = "'".$_SESSION['username']."'";
  $result = $db->query("SELECT * FROM articles WHERE author = $user ORDER BY id_article DESC");
if (!$result) {
  echo "ERROR";
}
while ($row = $result->fetch()):?>
<p>
          <a href="editor.php?id=<?=$row['id_article']; ?>">
          <?=$row['title']?>
        </a><br>
        <a href="editor.php?id=<?=$row['id_article']?>">Change</a><br>
        Raiting: <?=$row['raiting'];?>
        
      </p>

<?php endwhile ?>

<?php
}
?>
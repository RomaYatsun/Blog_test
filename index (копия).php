<?php
session_start();
include_once('theme/header.php');


include_once('theme/pagination.php');
while ($row = $result->fetch()):?> 
  echo "<div class='article'><div class='article-title'><h2>";
  echo "<a href='article.php?id=". $row['id_article'] ."'>";
  echo $row['title'];
  echo "</a>";
  echo "</h2></div>";
  echo "<div class='article-content'><p>". articles_intro($row, $row['id_article']). "</p>";
  echo "<div class='article-data'><p>". $row['author'] . " " . $row["date_time"];
  echo "RAITING ARTICLE ". $row['raiting'];
  echo "<a href='raiting.php?id=".$row['id_article']."&vote=up'>LIKE</a> ";
  echo "<a href='raiting.php?id=".$row['id_article']."&vote=down'>DONT LIKE</a>";
  echo "</p><hr>";
  <?php endwhile ?>
<?php
echo "<ul>";
    for ( $i=1; $i<=$total; $i++) {
      if ($posts<=$num) {
        return false;
      }
        echo "<li class='pagination'>";
        echo "<a href='index.php?page=$i'>$i</a></li>";
    }
    echo '</ul>';
include('theme/footer.php');
?>


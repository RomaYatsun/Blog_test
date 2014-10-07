<?php
$num = 3;
if (isset($_GET['page'])) {
$page = $_GET['page'];
}
else {
$page = 1;
}
$result = $db->query("SELECT COUNT(*) FROM articles");
$posts = $result->fetchColumn();
$total = intval(($posts - 1) / $num) + 1;
$page = intval($page);
if(empty($page) or $page < 0)
$page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
$result = $db->query("SELECT * FROM articles WHERE title != '' ORDER BY id_article DESC LIMIT $start, $num");
while ($row = $result->fetch()) {
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
}
for ($i=1;$i<=$total; $i++) {
if ($posts<=$num) {
return false;
}
else
echo "<a href='index.php?page=$i'>$i</a>";
}
?>
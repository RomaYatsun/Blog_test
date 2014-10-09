<?php
include_once('theme/header.php');
include_once('theme/pagination.php');
while ($row = $result->fetch()):?>
<div class='article'>
  <div class='article-title'>
  	<h2>
  	  <a href='article.php?id=<?=$row['id_article']?>'>
  	  	<?=$row['title'];?>
  	  </a>
  	</h2>
  </div>

  <div class='article-content'>
  	<p>
  	  <?=articles_intro($row, $row['id_article'])?>
  	</p>
  	<div class='article-data'>
  	  <p>
  	  	<a href="view-profile.php?id=<?=$row['author']?>"><?=$row['author']?></a> <?=$row["date_time"]?><br>
  	  	Raiting article <?=$row['raiting']?><br>
  	  	<a href='raiting.php?id=<?=$row['id_article']?>&vote=up'>Like</a>
  	  	<a href='raiting.php?id=<?=$row['id_article']?>&vote=down'>Dont like</a>
  	  </p>
  	</div>
  	<hr>
  </div>
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


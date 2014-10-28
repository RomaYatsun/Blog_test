<?php
include_once('theme/header.php');
include_once('theme/pagination.php');

while ($row = $result->fetch()):?>
<div class='article'>
  <div class='article-title'>
  	  <h2><a href='article.php?id=<?=$row['id_article']?>'>
  	  	<?=$row["title_$lang"];?>
  	  </a></h2>
  </div>

  <div class='article-content'>
  	<p>
  	  <?=articles_intro($row, $row['id_article'], $lang)?>
  	</p>
  	<div class='article-data'>
  	  <p>
  	  	<a href="view-profile.php?id=<?=$row['author']?>"><?=$row['author']?></a> <?=$row["date_time"]?><br>
        </div>
         </p>
        <?php 

        $vote = get_vote($db, $row['id_article']);
        if (isset($_SESSION['username'])) {
         $voteUser = get_vote_by_user($db, $row['id_article'], $_SESSION['username']);
        }
     else $voteUser = false;
        if ($vote['raiting'] == 0) {
          echo lang($db, $_SESSION['lang_site'], 'No one vote');
          ?>
  
      <form action='new-raiting.php'  method="POST">
      <input type='submit' name='rating' value='1' />
      <input type='submit' name='rating' value='2' />
      <input type='submit' name='rating' value='3' />
      <input type='submit' name='rating' value='4' />
      <input type='submit' name='rating' value='5' />
      <input type='hidden' value="<?=$row['id_article']?>" name='id' />
    </form>
          <?php
        }
        elseif ($vote['raiting']>0) {
          echo "Rating of article: ".$vote['raiting'];
          echo "<br>";
          if ($voteUser) {
            echo "<form action='new-raiting.php' method='POST'>";
          echo "<input type='submit' name='delete' value='Delete your rating' />";
          echo "<input type='hidden' name='id' value='". $row['id_article'] ."' />";
          echo "</form>";
          }
          else {
            ?>
  
      <form action='new-raiting.php'  method="POST">
      <input type='submit' name='rating' value='1' />
      <input type='submit' name='rating' value='2' />
      <input type='submit' name='rating' value='3' />
      <input type='submit' name='rating' value='4' />
      <input type='submit' name='rating' value='5' />
      <input type='hidden' value="<?=$row['id_article']?>" name='id' />
    </form>

            <?php
          }
          
        }
        ?>
  	  	<!--Raiting article 
        <?=$row['raiting_up']+$row['raiting_down']?><br>
  	  	<a href='raiting.php?id=<?=$row['id_article']?>&vote=up'><?=lang($db, $lang, 'Like')?></a>
  	  	<a href='raiting.php?id=<?=$row['id_article']?>&vote=down'><?=lang($db, $lang, "Dont like")?></a>-->
  	 
   </div>
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


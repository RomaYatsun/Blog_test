<?php
$num = 3;
// Извлекаем из URL текущую страницу
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
else {
  $page = 1;
}

// Определяем общее число сообщений в базе данных
$result = $db->query("SELECT COUNT(*) FROM articles");
$posts = $result->fetchColumn();
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = $db->query("SELECT * FROM articles WHERE title != '' ORDER BY id_article DESC LIMIT $start, $num");
// В цикле переносим результаты запроса в массив $postrow


?>
<?php
while ($row = $result->fetch()) {
	echo "<h2>";
		echo "<a href='article.php?id=". $row['id_article'] ."'>";
		echo $row['title'];
		echo "</a>";
		echo "</h2>";
		echo "<br/>";
		echo "<p>". articles_intro($row). "</p>";
		echo "<p>RAITING ARTICLE ". $row['raiting']."</p>";
		echo "<a href='raiting.php?id=".$row['id_article']."&vote=up'>LIKE</a> ";
		echo "<a href='raiting.php?id=".$row['id_article']."&vote=down'>DONT LIKE</a>";
		echo "<hr>";
}


	for ($i=1;$i<=$total; $i++)
		{
			if ($posts<=$num) {
				return false;
			}
			else
			echo  "<a href='index.php?page=$i'>$i</a>";
		}
		?>
	</body>
</html>

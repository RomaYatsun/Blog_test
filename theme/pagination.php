<?php


$num = 1;
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

?>
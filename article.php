<?php 
require_once('theme/header.php');

if (empty($_SESSION['username'])) {
  $username = 'Guest';
}
else
	$username = $_SESSION['username'];
$comments = get_comment_by_lang($db, $_GET['id'], $_SESSION['lang_site']);

if ($art = articles_get($db, $_GET['id'])) {
  $title = $art["title_$lang"];
  $content = $art["content_$lang"];
  $author = $art['author'];
}
else
 { echo lang($db, $_SESSION['lang_site'], 'There are no such address');
 return false;
 }




if (isset($_GET['num'])) {
$page = $_GET['num'];
}
else {
$page = 1;
}

$per_page = 10;
$result = $db->prepare("SELECT count(*) FROM comments WHERE lang = ? and page_id = ?");
$result->execute(array($lang, $_GET['id']));
$posts=$result->fetchColumn();
$total = intval(($posts - 1) / $per_page) + 1;
$page = intval($page);
if(empty($page) or $page < 0)
$page = 1;
if($page > $total) $page = $total;
$start = $page * $per_page - $per_page;

$result = $db->prepare("SELECT * FROM comments WHERE lang = ? and page_id = ?
	ORDER BY date_time DESC LIMIT $start, $per_page");
$sql = $result->execute(array($lang, $_GET['id']));

include('theme/article.php');
?>
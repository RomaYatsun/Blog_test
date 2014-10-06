<?php
function vote($db, $number, $id) {
  $sql = $db->prepare("UPDATE articles SET raiting = raiting + :numbers 
  	WHERE id_article = :id_article");
  $sql->execute(array(':numbers'=>$number, ':id_article'=>$id));
  if (!$sql)
  	die(mysql_error());
  else {
  	return true;
  }
}

function check_raiting($db, $id_user, $id_article){
  $sql = $db->prepare("SELECT * FROM raiting_art WHERE id_user=:id_user and id_article=:id_article");
  $sql->execute(array(':id_user'=>$id_user, ':id_article'=>$id_article));
  $row = $sql->fetch();
  if ($row['id_article'] == $id_article) {
  	return false;
  }
  else {
    $sql = $db->prepare("INSERT INTO raiting_art (id_user, id_article) VALUES (:id_user, :id_article)");
  	$sql->execute(array(':id_user'=>$id_user, ':id_article'=>$id_article));
	return true;
  }
}

function check($db, $login) {
  $result = $db->query("SELECT * FROM users WHERE login = '$login'");
  if (!$result) {
  	die(mysql_error());
  }
  else {
  	$row = $result->fetch();
  	if ($row['login'] == $login) {
      return false;
    }
    else {
      return true;
    }
  }
}

function get_user($db, $login) {
  $sql = $db->prepare("SELECT * FROM users WHERE login = ?");
  $sql->execute(array($login));
  if (!$sql)
  	die(mysql_error());
  elseif ($sql) {
  	$row = $sql->fetch();
  	return $row;
  }
  else
  	echo "string";
}

function delete_comment($db, $id) {
  $sql = $db->prepare("DELETE FROM comments WHERE id_comment=?");
  $sql->execute(array($id));
  if (!$sql)
  	die(mysql_error());
  return true;
}

function get_comment($db, $page_id) {
  $sql = $db->prepare("SELECT * FROM comments WHERE page_id = ? ORDER BY date_time DESC");
  $sql->execute(array($page_id));
  if (!$sql)
  	die(mysql_error());
  elseif ($sql) {
  	return $sql;
  }
  else
  	echo "Error";
}

function send_comment($db, $page_id, $username, $text_comment, $date_time) {
  $date_time = date('Y-m-d H:i:s');
  $sql = $db->prepare("INSERT INTO comments (page_id, username, text_comment, date_time)
  	VALUES (:page_id, :username, :text_comment, :date_time)");
  $sql->execute(array(':page_id'=>$page_id, ':username'=>$username,':text_comment'=>$text_comment,
  	':date_time'=>$date_time));
  if (!$sql)
  	die(mysql_error());
  else
  	header("Location:{$_SERVER['HTTP_REFERER']}");
}

function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100) {
  if (!file_exists($src))
  	return false;
  $size = getimagesize($src);
  if ($size === false)
  	return false;
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc))
  	return false;
  $x_ratio = $width / $size[0];
  $y_ratio = $height / $size[1];
  $ratio   = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);
  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($width, $height);
  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
  	$new_width, $new_height, $size[0], $size[1]);
  imagejpeg($idest, $dest, $quality);
  imagedestroy($isrc);
  imagedestroy($idest);
  return true;
}

function upload_file($db, $file, $login) {
  if ($file['name'] == '') {
    echo 'Файл не выбран!';
  	return;
  }
  elseif (!copy($file['tmp_name'], "img_big/".$file['name']))
  	echo 'Ошибка загрузки файла';
  elseif (copy($file['tmp_name'], "img_big/".$file['name'])) {
  	img_resize($file['tmp_name'], "img_small/".$file['name'], 100, 60);
  	$sql = $db->prepare("UPDATE users SET avatar=:avatar WHERE login = :login");
  	$sql->execute(array(':avatar'=>"img_small/".$file['name'], ':login'=>$login));
  	header("Location:{$_SERVER['PHP_SELF']}");
  }
  else
  	echo "ERRRORORO";
}

function check_admin($db, $login, $password) {
  $sql = $db->prepare("SELECT * FROM users WHERE login = :login and password=:password");
  $sql->execute(array(':login'=>$login, ':password'=>$password));
  $row = $sql->fetch();
  if (!$sql) {
  	die(mysql_error());
  }
  elseif ($row['is_admin'] == 1) {
  	return true;
  }
  elseif ($row['is_admin'] == 0) {
  	return false;
  }
}

function check_login($db, $login, $password) {
  $sql = $db->prepare("SELECT * FROM users WHERE login = ?");
  $sql->execute(array($login));
  $row = $sql->fetch();
  if (!$sql) {
  	die(mysql_error());
  }
  elseif ($row['password'] != md5(md5($password))) {
  	return false;
  }
  else {
  	return true;
  }
}

function articles_all($db)
{
	$result = $db->query("SELECT * FROM articles ORDER BY id_article DESC");
	if (!$result)
		die(mysql_error());
	elseif ($result) {
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
	
		return $row;
	}
	
}

function articles_get($db, $id_article)
{
	$sql = $db->prepare("SELECT * FROM articles WHERE id_article = ?");
	$sql->execute(array($id_article));
	if (!$sql)
		die(mysql_error());
	elseif ($sql) {
	 	$row = $sql->fetch();
		return $row;
	}
	else 
		return false;
}
function articles_new($db, $title, $content)
{
	$title = trim($title);
	$content = trim($content);
	if ($title == '')
		return false;
	$sql =  $db->prepare("INSERT INTO articles (title, content)
				VALUES (:title, :content)");
	$sql->execute(array(':title'=>$title, ':content'=>$content));
	if (!$sql)
		die(mysql_error());
	return true;
}




function articles_edit($db, $id_article, $title, $content)
{
	$title = trim($title);
	$content = trim($content);

	if (!$id_article) return false;


	$sql = $db->prepare("UPDATE articles SET title=:title, content = :content WHERE id_article = :id_article");
	$sql->execute(array(':title'=>$title, ':content'=>$content, ':id_article'=>$id_article));
	if (!$sql)
		die(mysql_error());
	elseif ($sql) {
		return true;
	}
	else
	return false;

}

function change_raiting($db, $id_article, $number)
{
	$sql = $db->prepare("UPDATE articles SET raiting=? WHERE id_article=?");
	$sql->execute(array($number, $id_article));
	if ($sql) {
		return true;
	}
	else
	return false;
}


function articles_delete($db, $id_article)
{
	if (!$id_article) return false;
	$sql = $db->prepare("DELETE FROM articles WHERE id_article=?");
	$sql->execute(array($id_article));
	if (!$sql)
		die(mysql_error());
	return true;
}

function articles_intro($article)
{
	$max_chars = 300;
	$quote = $article['content'];
	if (strlen($quote) <=$max_chars)
		return $quote;
	else
		return substr($quote, 0, $max_chars) . '...';
}
?>

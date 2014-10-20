<?php
function vote_up($db, $number, $id) {
  $sql = $db->prepare("UPDATE articles SET raiting_up = raiting_up + :numbers 
  	WHERE id_article = :id_article");
  $sql->execute(array(':numbers'=>$number, ':id_article'=>$id));
  if (!$sql)
  	die(mysql_error());
  else {
  	return true;
  }
}

function vote_down($db, $number, $id) {
  $sql = $db->prepare("UPDATE articles SET raiting_down = raiting_down + :numbers 
    WHERE id_article = :id_article");
  $sql->execute(array(':numbers'=>$number, ':id_article'=>$id));
  if (!$sql)
    die(mysql_error());
  else {
    return true;
  }
}
/* ДОРОБИТИ */
function check_raiting($db, $string, $id_user, $id_article){
  $sql = $db->prepare("SELECT * FROM raiting_art WHERE id_user=:id_user and id_article=:id_article");
  $sql->execute(array(':id_user'=>$id_user, ':id_article'=>$id_article));
  $row = $sql->fetch();
  if ($row['id_article'] == $id_article) {
    if ($string == 'vote_up') {
      if ($row['vote_up'] == 1) {
        return false;
      }
      elseif ($row['vote_up'] == 0) {
       $sql = $db->prepare ("UPDATE raiting_art SET vote_up = 1
           WHERE $id_user");
       $sql->execute();
       return true;
      }
    }
    elseif ($string == 'vote_down')
        {
      if ($row['vote_down'] == 1) {
        return false;
      }
      elseif ($row['vote_down'] == 0) {
        $sql = $db->prepare ("UPDATE raiting_art SET vote_down = 1
           WHERE $id_user");
       $sql->execute();
       return true;
      }
    }
    
  }
  
  else {
    $sql = $db->prepare("INSERT INTO raiting_art (id_user, $string, id_article) VALUES (:id_user, 1, :id_article)");
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

function check_email($db, $email) {
  $result = $db->query("SELECT * FROM users WHERE email = '$email'");
  if (!$result) {
    die(mysql_error());
  }
  else {
    $row = $result->fetch();
    if ($row['email'] == $email) {
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
  	$row = $sql->fetch(PDO::FETCH_ASSOC);
  	return $row;
  }
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
  $sql->execute(array(':page_id'=>$page_id, ':username'=>htmlspecialchars($username),':text_comment'=>htmlspecialchars($text_comment),
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
  	img_resize($file['tmp_name'], "img_small/".$file['name'], 150, 150);
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
  elseif ($row['role'] == 1) {
  	return true;
  }
  elseif ($row['role'] == 0) {
  	return false;
  }
}

function check_login($db, $login, $password) {
  $sql = $db->prepare("SELECT * FROM users WHERE login = ?");
  $sql->execute(array($login));
  $row = $sql->fetch(PDO::FETCH_ASSOC);
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
	else {
			return $result;
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


/**
 * Add new article
 *
 * @param object $db
 *   Connect to DataBase
 * @param sting $title
 *   Title of new article
 * @param string $content
 *   Content of new article
 * @param string $author
 *   Authir of new article
 * @return array $asdasd
 *   ASDasd asd asd.
 */
function articles_new($db, $title, $content, $author, $date_time) {
  $date_time = date('Y-m-d');
  $ALLOWABLE_TAGS = '<a><b><br><em><i><img><ul><li><ol><p><small><<strong><table><tbody><td><tfoot><th><thead>
                    <tr><tt><u>';
  $title = strip_tags($title, $ALLOWABLE_TAGS);
  $content = strip_tags($content, $ALLOWABLE_TAGS);
  if ($title == '')
    return false;
  $sql =  $db->prepare("INSERT INTO articles (title, content, author, date_time)
    VALUES (:title, :content, :author,:date_time)");
  $sql->execute(array(':title'=>$title, ':content'=>$content, ':author'=>$author, ':date_time'=>$date_time));
  if (!$sql)
    die(mysql_error());
  return true;
}

function articles_edit($db, $id_article, $title, $content) {
  $title = trim($title);
  $content = trim($content);
  if (!$id_article)
    return false;
  $sql = $db->prepare("UPDATE articles SET title=:title, content = :content
    WHERE id_article = :id_article");
  $sql->execute(array(':title'=>$title, ':content'=>$content, ':id_article'=>$id_article));
  if (!$sql)
    die(mysql_error());
  elseif ($sql) {
    return true;
  }
  else
    return false;
}

function change_raiting($db, $raiting, $id_article, $number) {
  $sql = $db->prepare("UPDATE articles SET $raiting = $number WHERE id_article=$id_article");
 $sql->execute();
  if ($sql) {
    return true;
  }
  else
    return false;
}

function articles_delete($db, $id_article) {
  if (!$id_article)
    return false;
  $sql = $db->prepare("DELETE FROM articles WHERE id_article=?");
  $sql->execute(array($id_article));
  if (!$sql)
    die(mysql_error());
  return true;
}

function articles_intro($article, $id) {
  $max_chars = 150;
  $quote = $article['content'];
  if (strlen($quote) <=$max_chars)
    return $quote;
  else
    return substr($quote, 0, $max_chars) . "<br><a href='article.php?id=". $id ."'>Read more</a>";
}

function profile_edit($db, $first_name, $last_name, $email, $password, $login) {
  $password = md5(md5($password));
  $sql = $db->prepare("UPDATE users SET first_name=:first_name, last_name = :last_name,
    email = :email, password = :password WHERE login = :login");
  $sql->execute(array(':first_name'=>$first_name, ':last_name'=>$last_name, 
    ':email'=>$email, ':password'=>$password, ':login'=>$login));
  if (!$sql)
    die(mysql_error());
  elseif ($sql) {
    return true;
  }
  else
    return false;
}

function delete_user($db, $id) {
 $sql = $db->prepare("DELETE  FROM users WHERE login = ?");
 if ($id == 'admin') {
   return false;
 }
 else
  $sql->execute(array($id));
if (!$sql)
  die(mysql_error());
else
 return true; 
}

function change_role($db, $role, $id) {
  $sql = $db->prepare("UPDATE users SET role = ? WHERE login = ?");
  if ($id == 'admin') {
   return false;
 }
 else
  $sql->execute(array($role, $id));
  if (!$sql)
    die(mysql_error());
  else
    return true; 
}
function print_form_login() {
   echo "<form action='login.php' method='POST'>";
      echo "<span>Login</span> <input name='login' type='text'>";
      echo "<span>Password</span> <input name='password' type='password'>";
      echo "<input name='submit' type='submit' value='Log in'>";
      echo "</form>";
      echo "<a href='register.php'>Sing in</a>";
}
?>

<?php
include_once('theme/header.php');
if (empty($_SESSION['username'])) {
}
else {
  	if (isset($_FILES['file'])) {
  	  upload_file($db, $_FILES['file'], $_SESSION['username']);
  	}
  	
  	echo 'YOUR AVATAR: ';
  	$sql = $db->prepare("SELECT * FROM users WHERE login=?");
  	$sql->execute(array($_SESSION['username']));
  	if (!$sql) {
  	  die(mysql_error());
  	}
  	$row = $sql->fetch();
  	if ($row['avatar'] == '') {
  	  echo '<form method="post" enctype="multipart/form-data">';
  	  echo '<input type="file" name="file"/>';
  	  echo '<input type="submit" value="UPLOAD"/>';
  	  echo '</form>';
  	}
  	else {
  	  echo "<img src='". $row['avatar']."'/><br>";
  	  echo '<form method="post" enctype="multipart/form-data">';
  	  echo '<input type="file" name="file" />';
  	  echo '<input type="submit" value="CHANGE"/>';
  	  echo '</form>';
  	}
  }


?>

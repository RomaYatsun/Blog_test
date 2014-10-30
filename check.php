<?php
require_once('config.php');
//$sql = $db->prepare("INSERT INTO users (email, login, password, avatar, date_time, role)
  //	  VALUES (:email, :login, :password, :avatar, :date_time, :role)");
//$result = $sql->execute(array(':email'=>$email, ':login'=>$login, ':password'=>$password, ':avatar'=>$avatar, ':date_time'=>$date, ':role'=>'3'));
if (isset($_POST['login'])) {
	$login = trim($_POST['login']);
	$query = "SELECT count(*) FROM users WHERE login = $login";
	$result = $db->query($query) or die(mysql_error());
	if ($result->fetchColumn()>0) {
		echo "yes";
	}
	elseif (!$result) {
		echo "no";
	}
	else {
		echo "no";
	}

}
else
		var_dump($_POST);
?>
http://www.youtube.com/watch?v=sRoXIZezt68
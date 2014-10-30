<?php
require_once('config.php');
//$sql = $db->prepare("INSERT INTO users (email, login, password, avatar, date_time, role)
  //	  VALUES (:email, :login, :password, :avatar, :date_time, :role)");
//$result = $sql->execute(array(':email'=>$email, ':login'=>$login, ':password'=>$password, ':avatar'=>$avatar, ':date_time'=>$date, ':role'=>'3'));
if ($_POST['check'] == 'login') {
	$login = "'".trim($_POST['name'])."'";
	$query = "SELECT count(*) FROM users WHERE login = $login";
	$result = $db->query($query);
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
if ($_POST['check'] == 'email') {
	$email = "'".trim($_POST['name'])."'";
	$query = "SELECT count(*) FROM users WHERE email = $email";
	$result = $db->query($query);
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



?>
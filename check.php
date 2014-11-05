<?php
require_once('config.php');
//$sql = $db->prepare("INSERT INTO users (email, login, password, avatar, date_time, role)
  //	  VALUES (:email, :login, :password, :avatar, :date_time, :role)");
//$result = $sql->execute(array(':email'=>$email, ':login'=>$login, ':password'=>$password, ':avatar'=>$avatar, ':date_time'=>$date, ':role'=>'3'));
function getUserByLogin($db, $login) {
	$login = "'".trim($_POST['login'])."'";
	$query = "SELECT count(*) FROM users WHERE login = $login";
	$result = $db->query($query);
	if ($result->fetchColumn()>0) {
		return false;
	}
	elseif (!$result) {
		return false;
		
	}
	else {
	return true;
		
	}
}
function getUserByEmail($db, $email) {
	$email = "'".trim($_POST['email'])."'";
	$query = "SELECT count(*) FROM users WHERE email = $email";
	$result = $db->query($query);
	if ($result->fetchColumn()>0) {
		return false;
	}
	elseif (!$result) {
		return false;
	}
	else {
		return true;
	}

}


if(getUserByLogin($db, $_POST['login']) && getUserByEmail($db, $_POST['email'])) {
	return true;
}
else
echo "ERROR";
/*if ($_POST['login']) {
	$login = "'".trim($_POST['login'])."'";
	$query = "SELECT count(*) FROM users WHERE login = $login";
	$result = $db->query($query);
	if ($result->fetchColumn()>0) {
		echo "Login is use";
	}
	elseif (!$result) {
		return true;
		
	}
	else {
	exit();
		
	}
}
if ($_POST['email']) {
	$email = "'".trim($_POST['email'])."'";
	$query = "SELECT count(*) FROM users WHERE email = $email";
	$result = $db->query($query);
	if ($result->fetchColumn()>0) {
		echo "Email is use";
	}
	elseif (!$result) {
		return true;
	}
	else {
		die(mysql_error());
	}

}*/



?>
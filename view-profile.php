<?php
include_once('theme/header.php');
if (isset($_GET['id'])) {
$user = $_GET['id'];
}
else
$user = $_SESSION['username'];
$user = get_user($db, $user);
?>
<?php
if (isset($_SESSION['username'])) {
?>
<img src="<?=$user['avatar']?>" /><span style="margin-left:20px"><?=$user['login']?></span>
<hr/>
<ul>
  <li>First name: <?=$user['first_name']?></li>
  <li>Last name: <?=$user['last_name']?></li>
  <li>E-mail: <?=$user['email']?></li>
  <li>Account was created: <?=$user['date_time']?></li>
  <li>Last login: <?=$user['last_login']?></li>
</ul>
<?php }
else
  {$user = get_user($db, $_GET['id']);?>
<img src="<?=$user['avatar']?>" /><span style="margin-left:20px"><?=$user['login']?></span>
<hr/>
<ul>
  <li>First name: <?=$user['first_name']?></li>
  <li>Last name: <?=$user['last_name']?></li>
  <li>Account was created: <?=$user['date_time']?></li>
  <li>Last login: <?=$user['last_login']?></li>
</ul>
<?php }

?>
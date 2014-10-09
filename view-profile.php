<?php
include_once('theme/header.php');
$sql = $db->prepare("SELECT * FROM users WHERE login=?");
$sql->execute(array($_GET['id']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
if (!$sql) {
  die(mysql_error());
}
?>
<img src="<?=$row['avatar']?>" /><span style="margin-left:20px"><?=$row['login']?></span>
<hr/>
<ul>
  <li>First name: <?=$row['first_name']?></li>
  <li>Last name: <?=$row['last_name']?></li>
  <li>E-mail: <?=$row['email']?></li>
  <li>Account was created: <?=$row['date_time']?></li>
  <li>Last login: <?=$row['last_login']?></li>
</ul>

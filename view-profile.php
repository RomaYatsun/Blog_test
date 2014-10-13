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
if (isset($_POST['change'])) {
      var_dump($_POST);
      echo "<br>";
      if ($_POST['delete'] == 'on') {
       // delete_user
      }
      elseif ($_POST['role']) {
        //change_role_user
      }
    }
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  if (check_admin($db, $_SESSION['username'], $_SESSION['password'])) {

?>
<form method='POST' style="width:300px;">
  <fieldset>
    <legend><span style="font-size:12px">change user profile</span></legend>
   Role of user:
   <p><select size="3" name="role">
    <option value="3">User</option>
    <option value="2">Moderator</option>
    <option value="0">Block</option>
   </select></p>
   Delete user:
  <input type='checkbox' name='delete' /><br>
  <input type='submit' name = 'change' value='Change' />
  </fieldset>
</form>
<?php
}}
?>
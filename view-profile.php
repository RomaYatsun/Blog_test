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
if (isset($_POST)) {

if (isset($_POST['change'])) {
      if (isset($_POST['role'])) {
        if(change_role($db, $_POST['role'], $_GET['id'])) {
          header("Location:admin/admin-panel.php");
        }
        else
          echo "ERROR";
      }
    }
    //elseif (isset($_POST['delete'])) {
      //echo "<a href='delete-profile.php?del='". $_SESSION['username'] . "'>Delete profile</a>";
       //if (delete_user($db, $_GET['id'])) {
//      header("Location:admin/admin-panel.php");
    //}
    //else
   //echo "ERROR";
      //}
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
  <input type='submit' name = 'change' value='Change' />
   <p><a href="delete-profile.php?del=<?=$_GET['id']?>">Delete profile</a></p>
  </fieldset>
</form>
<?php
}}
?>
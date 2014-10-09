<?php
include_once('theme/header.php');
if (empty($_SESSION['username'])) {
  header("Location:index.php");
}
else {
  $sql = $db->prepare("SELECT * FROM users WHERE login=?");
  $sql->execute(array($_SESSION['username']));
  $row = $sql->fetch(PDO::FETCH_ASSOC);
  if (!$sql) {
    die(mysql_error());
  }
  if (isset($_POST['change'])) {
    $err = array();
    filter_var('example@mail.ru', FILTER_VALIDATE_EMAIL);
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $err[] = "E-mail is not correct";
    }
    if ($_POST['password'] == '') {
      $_POST['password'] = $row['password'];
    }
    elseif ($_POST['password'] != '') {
      $_POST['password'] = md5(md5($_POST['password']));
    }
    if ($_POST['email'] == $row['email']) {
      $_POST['email'] = $row['email'];
    }
    elseif (!check_email($db, $_POST['email']))
      $err[] = 'This email already exists';
    if (count($err) == 0) {
      $sql = $db->prepare("UPDATE users SET first_name=:name, last_name = :lastname, 
        email = :email, password = :password WHERE login = :login");
      $result = $sql->execute(array(':name'=>$_POST['name'], ':lastname'=>$_POST['lastname'], 
        ':email'=>$_POST['email'], ':login'=>$_SESSION['username'], ':password'=>$_POST['password']));
      if (!$result) {
        die(mysql_error('errr'));
      }
      header("Location:$_SERVER[PHP_SELF]");
    }
    else {
      print "<b>When you register the following error:</b><br>";
      foreach ($err as $error) {
        print $error. "<br>";
      }
    }
  }
  elseif (isset($_FILES['file'])) {
    upload_file($db, $_FILES['file'], $_SESSION['username']);
  }
  else { ?>
  <form method='POST'>
    First name <input type='text' name='name' value = "<?=$row['first_name'];?>"/><br>
    Last name<input type='text' name='lastname' value = "<?=$row['last_name'];?>" /><br>
    E-mail <input type='text' name='email' value = "<?=$row['email'];?>" /><br>
    Password <input type='password' name='password' /><br>
    <input type='submit' name='change' value='Change'/><br>
  </form>
  Your avatar: 
  <img src='<?=$row['avatar']?>'/><br>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Change"/>
  </form>
  <?php
  } 
}
?>
<a href="delete-profile.php?del=<?=$_SESSION['username']?>">Delete profile</a>
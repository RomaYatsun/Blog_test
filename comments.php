<?php
require_once('functions.php'); 
require_once('config.php');
$dt = date('Y-m-d H:i:s');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
</head>
<body>
<?php
if (isset($_POST['send'])) {
  if ($_POST['title'] == '') {
    $comment = substr($_POST['comment'], 0, strripos(substr($_POST['comment'], 0, 15), ' '));
    if (send_comment($db, $_POST['page_id'], $_POST['username'], $comment, $_POST['comment'], $_SESSION['lang_site'], $dt)) {
     return true;
    }
  	else
      lang($db, $lang, 'An error has occured');
  }
  else {
    if (send_comment($db, $_POST['page_id'], $_POST['username'], $_POST['title'], $_POST['comment'], $_SESSION['lang_site'], $dt)) {
      return true;
    }
    else {
      lang($db, $lang, 'An error has occured');
    }
  }
}
else
  header("Location:index.php");
?>
</body>
</html>
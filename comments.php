<?php
require_once('functions.php');
require_once('config.php');
$dt = date('Y-m-d H:i:s');
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
  if (send_comment($db, $_POST['page_id'], $_POST['username'], $_POST['comment'], $dt)) {
  	return true;
  }
  else
  	echo 'AN ERROR HAS OCCURED';
}
else
  header("Location:index.php");
?>
</body>
</html>
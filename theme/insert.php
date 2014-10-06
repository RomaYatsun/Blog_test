<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>
<body>
  <h1><?='ADMIN PANEL'?> | <?='ADD NEW ARTICLE'?></h1>
  <a href="admin-panel.php"><?='BACK'?></a>
  <form  method="post">
    <?='TITLE'?>:<br>
    <input type="text" name="title" value="<?=$title;?>" /><br><br>
    <?='CONTENT'?>:<br>
    <textarea type="text" name="content" cols="40" rows="30"><?=$content;?></textarea><br>
    <input type="submit" value="<?='ADD'?>" />
</form>
</body>
</html>
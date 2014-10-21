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
    <fieldset>
        <legend><span style="font-size:12px">English</span></legend>
    Title:<br>
    <input type="text" name="title" value="<?=$title;?>" /><br><br>
    Content:<br>
    <textarea type="text" name="content" cols="100" rows="5"><?=$content;?></textarea><br>
    <input type="submit" name='en' value="Add" />
  </fieldset>
</form>
<!--<form  method="post">
    <fieldset>
        <legend><span style="font-size:12px">Українська</span></legend>
    Заголовок:<br>
    <input type="text" name="title" value="<?=$title;?>" /><br><br>
    Контент:<br>
    <textarea type="text" name="content" cols="100" rows="5"><?=$content;?></textarea><br>
    <input type="submit" name='ua' value="Додати" />
  </fieldset>
</form>-->
</body>
</html>
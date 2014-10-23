<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>
<body>
  <h1><?=lang($db, $lang, 'Admin panel')?> | <?=lang($db, $lang, 'Add new article')?></h1>
  <form  method="post">
    <fieldset>
        <legend><span style="font-size:12px">English</span></legend>
    Title:<br>
    <input type="text" name="title_en" value="<?=$title_en;?>" /><br><br>
    Content:<br>
    <textarea type="text" name="content_en" cols="100" rows="5"><?=$content_en;?></textarea><br>
    
  </fieldset>
    <fieldset>
        <legend><span style="font-size:12px">Українська</span></legend>
    Заголовок:<br>
    <input type="text" name="title_ua" value="<?=$title_ua;?>" /><br><br>
    Контент:<br>
    <textarea type="text" name="content_ua" cols="100" rows="5"><?=$content_ua;?></textarea><br>
    <!--<input type="submit" name='ua' value="Додати" />-->
  </fieldset>
  <input type="submit" name='add' value="Add" />
</form>
</body>
</html>
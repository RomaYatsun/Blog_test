<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>
<body>
  <h1><?=lang($db, $lang, 'Admin panel')?> | <?=lang($db, $lang, 'Add new article')?></h1>
  <a href="../index.php"><?=lang($db, $lang, 'Home page')?></a>
 <!-- <form  method="post">
  	Title:<br>
  	<input type="text" name="title" value="<?=$title?>"/><br><br>
  	Content:<br>
  	<textarea type="text" name="content"><?=$content?></textarea><br><br>
  	Raiting like:<br>
  	<input type='text' name='raiting_up' value="<?=$articles['raiting_up'];?>"><br>
    Raiting don't like:<br>
    <input type='text' name='raiting_down' value="<?=$articles['raiting_down'];?>"><br>
  	<input type="hidden" name = "id" value="<?=$id?>" />
  	<input type="submit" name = "upd" value="CHANGE" />
  	<input type="submit" name = "del" value="DELETE" />
    <input type="submit" name = "f" value="DELETE" />
  </form>
-->

  <form method='POST'>
    <fieldset>
      <legend><span style="font-size:12px">English</span></legend>
    Title:<br>
    <input type="text" name="title_en" value="<?=$articles['title_en']?>"/>
    <br><br>
    Content:<br>
    <textarea type="text" name="content_en"><?=$articles['content_en']?></textarea>
    <br>
      Raiting:<br>
    <input type='text' name='raiting' value="<?=$articles['raiting'];?>"><br>  
<input type="submit" name = "upd" value="<?=lang($db, $lang, 'Change')?>" />
    <input type="submit" name = "del" value="<?=lang($db, $lang, 'Delete')?>" />
    <br>
  



    <fieldset>
      <legend><span style="font-size:12px">Українська</span></legend>
    Назва:<br>
    <input type="text" name="title_ua" value="<?=$articles['title_ua']?>"/>
    <br><br>
    Контент:<br>
    <textarea type="text" name="content_ua"><?=$articles['content_ua']?></textarea>
    <br>
    <input type="submit" name = "add" value="<?=lang($db, $lang, 'Add Translate')?>" />
    <br>
    </fieldset>
   


        <input type="hidden" name = "id" value="<?=$_GET['id']?>" />
    
  </form>
</body>
</html>
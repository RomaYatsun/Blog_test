<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>
<body>
  <h1>User panel</h1>
  <a href="../index.php">HOME PAGE</a>
  <form method='POST'>
    <fieldset>
      <legend><span style="font-size:12px">English</span></legend>
    Title:<br>
    <input type="text" name="title_en" value="<?=$articles['title_en']?>"/>
    <br><br>
    Content:<br>
    <textarea type="text" name="content_en"><?=$articles['content_en']?></textarea>
    <br>
<input type="submit" name = "upd" value="Change" />
    <input type="submit" name = "del" value="Delete" />
    <br>
    </fieldset>
  



    <fieldset>
      <legend><span style="font-size:12px">Українська</span></legend>
    Title:<br>
    <input type="text" name="title_ua" value="<?=$articles['title_ua']?>"/>
    <br><br>
    Content:<br>
    <textarea type="text" name="content_ua"><?=$articles['content_ua']?></textarea>
    <br>
    <input type="submit" name = "add" value="Add translate" />
    <br>
    </fieldset>


        <input type="hidden" name = "id" value="<?=$_GET['id']?>" />
    
  </form>
</body>
</html> 
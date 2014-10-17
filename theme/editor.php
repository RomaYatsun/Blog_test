<!DOCTYPE html>
<html>
<head>
  <title><?=$blog_title?></title>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>
<body>
  <h1>ADMIN PANEL | ADD NEW ARTICLE</h1>
  <a href="../index.php">HOME PAGE</a>
  <form  method="post">
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
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Blog</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">	
</head>
<body>
	<h1>ADMIN PANEL | ADD NEW ARTICLE</h1>
	<a href="../index.php">HOME PAGE</a>
	<form  method="post">
		Title:<br>
		<input type="text" name="title" value="<?=$title?>"/>
		<br><br>
		Content:<br>
		<textarea type="text" name="content"><?=$content?></textarea>
		<br><br>
		RAITING:<br>
		<input type='text' name='raiting' value="<?=$articles['raiting'];?>">
<br>
		<input type="hidden" name = "id" value="<?=$id?>" />
		<input type="submit" name = "upd" value="CHANGE" />
		<input type="submit" name = "del" value="DELETE" />
	</form>
</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Blog</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">	
</head>
<body>
	<h1><?='ADMIN PANEL'?> | <?='ADD NEW ARTICLE'?></h1>
	<a href="admin-panel.php"><?='BACK'?></a>
	<form  method="post">
		<?='TITLE'?>:<br>
		<input type="text" name="title" value="<?=$title;?>" />
		<br><br>
		<?='CONTENT'?>:<br>
		<textarea type="text" name="content"><?=$content;?></textarea>
		<br>
		<input type="submit" value="<?='ADD'?>" />


	</form>
</body>
</html>


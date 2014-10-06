<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '123');

try {
  $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
  $db = new PDO($connect_str, DB_LOGIN, DB_PASSWORD);
}
catch(PDOException $e) {
  die("Error: " . $e->getMessage());
}
$blog_title = 'Blog_test';

///mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die('No connect');
///mysql_query('SET NAMES UTF-8');
///mysql_select_db(DB_NAME) or die('No data base');

/// Языковая настройка.
///setlocale(LC_ALL, 'ru_RU.UTF-8');
///date_default_timezone_get('Europe/Kyiv');
?>

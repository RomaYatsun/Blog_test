<?
require_once('config.php');

$sql1 = "CREATE TABLE
    `articles` (
        `id_article` INT(11) NOT NULL AUTO_INCREMENT,
        `title_ua` VARCHAR(32) NOT NULL,
        `title_en` VARCHAR(32) NOT NULL,
        `content_ua` TEXT NOT NULL,
        `content_en` TEXT NOT NULL,
        `raiting` INT(5) NOT NULL,
        PRIMARY KEY(`id_article`)
    )";
$result = mysql_query($sql1);
if (!$result) {
    die(mysql_error());
}
    else
    {
        echo "OK<br>";
    }


$sql2 = "CREATE TABLE
    `comments` (
        `id_comment` INT(11) NOT NULL AUTO_INCREMENT,
        `page_id` INT(11) NOT NULL,
        `username` VARCHAR(32) NOT NULL,
        `text_comment` TEXT NOT NULL,
        PRIMARY KEY(`id_comment`)
    )";
$result = mysql_query($sql2);
if (!$result) {
    die(mysql_error());
}
    else
    {
        echo "OK<br>";
    }
    $sql3 = "CREATE TABLE
    `raiting_art` (
        `id_raiting` INT(11) NOT NULL AUTO_INCREMENT,
        `id_user` INT(11) NOT NULL,
        `id_article` INT(11) NOT NULL,
        PRIMARY KEY(`id_raiting`)
    )";
$result = mysql_query($sql3);
if (!$result) {
    die(mysql_error());
}
    else
    {
        echo "OK<br>";
    }
        $sql4 = "CREATE TABLE
    `users` (
        `user_id` INT(11) NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(32) NOT NULL,
        `login` VARCHAR(32) NOT NULL,
        `password` VARCHAR(32) NOT NULL,
        `avatar` VARCHAR(32) NOT NULL,
        `is_admin` ENUM('0', '1') NOT NULL,
        PRIMARY KEY(`user_id`)
    )";
$result = mysql_query($sql4);
if (!$result) {
    die(mysql_error());
}
    else
    {
        echo "OK<br>";
    }

$login = 'admin';
$password = md5(md5('root'));
$isAdmin = 1;
$t = "INSERT INTO users (login, password, is_admin) VALUES ('%s', '%s', %s)";
    $query = sprintf($t, mysql_real_escape_string($login),
        mysql_real_escape_string($password),
        mysql_real_escape_string($isAdmin));
    $result = mysql_query($query);
if (!$result) {
    die(mysql_error());
}
else
echo "OK";
?>
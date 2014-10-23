<?php   
require_once('../functions.php');
require_once('../config.php');
session_start();
if (isset($_POST['add'])) {
  if (isset($_POST['en']) && isset($_POST['ua'])) {
  add_lang_string($db, $_POST['en'], $_POST['ua']);

}
else
  echo "ERROR";
}

if (isset($_SESSION['lang_site'])) {
  $lang = $_SESSION['lang_site'];
}
else {
  $_SESSION['lang_site'] = 'en';
}
if (isset($_GET['lang'])) {
  $lang=$_GET['lang'];
  $_SESSION['lang_site'] = $lang;
}
 echo "<a href='admin-panel.php'>". lang($db, $lang, 'Admin panel'). "</a><br>";
echo "<form method=POST>";
echo "English: <input type='text' name='en' >";
echo "Українська: <input type='text' name='ua' >";
echo "<br>";
echo "<input type='submit' name='add' value='". lang($db, $lang, 'Add') . "'>";
echo "</form>";
echo "<hr><br><br>";


  $lang_string = get_lang_string($db);
while ($row = $lang_string->fetch(PDO::FETCH_ASSOC)) {
	if (isset($_POST['change'])) {

change_string_lan($db, $_POST["key"], $_POST['value'] );

}
  echo "<form method = 'POST'>";
  echo "<span style='font-size:12px'>" . $row['en'] . "</span>";
  echo "<input type='hidden' name='key' value='". $row['en'] ."'>";
  echo "---";
  echo "<input type='text' name='value' value='". $row['ua'] ."'>";
  echo "<input type='submit' name='change' value='change'>";
  echo "<br>";
  echo "</form>";


}

?>

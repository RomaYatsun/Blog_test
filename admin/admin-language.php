<?php   
require_once('../functions.php');
require_once('../config.php');
session_start();

$file = parse_ini_file("../lang/ua.ini");

foreach ($file as $key => $value) {
  if (isset($_POST['change'])) {

change_string_lan($db);

}
  echo "<form method = 'POST'>";
  echo "<span style='font-size:12px'>" . $key . "</span>";
  echo "<input type='hidden' name='key' value='". $key ."'>";
  echo "---";
  echo "<input type='text' name='value' value='". $value ."'>";
  echo "<input type='submit' name='change' value='change'>";
  echo "<br>";
  echo "</form>";
}
?>

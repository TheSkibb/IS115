<!DOCTYPE html>
<html>
  <head>
    <title>Dine Meldinger</title>
    <link rel="stylesheet" href="./../static/stylesNavBar.css">
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./../lib/navbar.php');
//TODO: add actual user
$bruker = 1;
require_once('./../lib/meldinger.php');


echo getUserMeldinger(1);
?>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Dine Meldinger</title>
    <link rel="stylesheet" href="./../static/stylesNavBar.css">
    <link rel="stylesheet" href="./../static/stylesDineMeldinger.css">
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./../lib/navbar.php');
//TODO: add actual user
session_start();
if(key_exists('userId', $_SESSION)){
  $bruker= $_SESSION['userId'];
}
else{
  header('Location: ../assets/logginn.php');
}
require_once('./../lib/meldinger.php');


echo getUserMeldinger($bruker);
?>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Dine annonser</title>
    <link rel="stylesheet" href="../static/stylesNavBar.css" />
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("./../lib/navbar.php");

//TODO: use actual user id
$bruker = 1;

//filter for annonsene som skal vises
$searchFilter = ' where eier = ' . $bruker;

//hent alle annonser med filteret, eier er satt til true
include "./../lib/classes/hjemAnnonse.php";
HjemAnnonse::getAllAnnonser($searchFilter, true);
?>

  </body>
</html>

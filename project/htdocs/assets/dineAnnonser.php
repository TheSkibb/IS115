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
//sjekk om bruker er logget inn 
session_start();
if(key_exists('userId', $_SESSION)){
  $bruker = $_SESSION['userId'];
}
else{
  header('Location: ./logginn.php');
}

//kun utleiere kan lage nye annonser, sjekk om bruker er utleier
require_once('../lib/getUserInfo.php');
$userType = getUserTypeFromId($bruker);
if($userType == 1 || $userType == null){
  header('Location: ./hjem.php');
  exit();
}

//filter for annonsene som skal vises
$searchFilter = ' where eier = ' . $bruker;

//hent alle annonser med filteret, eier er satt til true
include "./../lib/classes/hjemAnnonse.php";
HjemAnnonse::getAllAnnonser($searchFilter, true);
?>

  </body>
</html>

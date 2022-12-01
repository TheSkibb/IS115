<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./../lib/classes/hjemAnnonse.php');
session_start();
if(key_exists('userId', $_SESSION)){
  $user = $_SESSION['userId'];
}
else{
  header('Location: ../assets/logginn.php');
}
$filter = "
  where annonser.id in (select annonseId from favoritter where brukerId = " . $user . ");
";
HjemAnnonse::getAllAnnonser($filter);
?>

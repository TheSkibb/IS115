<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require_once('./../lib/classes/hjemAnnonse.php');
  $filter = "
    where annonser.id in (select annonseId from favoritter where brukerId = 1);
  ";
  HjemAnnonse::getAllAnnonser($filter);
?>

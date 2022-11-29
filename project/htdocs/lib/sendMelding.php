<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require_once('./meldinger.php');
  $frabruker = $_REQUEST['frabruker'];
  $tilbruker = $_REQUEST['tilbruker'];
  $innhold = $_REQUEST['meldingInnhold'];
  sendMelding($tilbruker, $frabruker, $innhold);
?>

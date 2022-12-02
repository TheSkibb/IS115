<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//TODO check if owner owns the annonse
$annonse = $_GET['annonse'];

require('./../lib/database.inc.php');
$sql = 'delete from annonser where id=:annonse';
$pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
try{
  $sp = $pdo->prepare($sql);
}
catch(PDOException $e){
  echo 'noe feil skjedde';
}

$sp->bindParam(':annonse', $annonse, PDO::PARAM_INT);

try{
  $sp->execute();
  header("Location: ./../assets/dineAnnonser.php");
  exit();
}
  catch(PDOException $e){
  echo 'error' . $e;
  exit();
}

?>

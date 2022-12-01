<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./database.inc.php');

$favorite = $_GET['favorite'];
echo $favorite;

if($favorite == 0){
  $sql = "insert into favoritter (brukerId, annonseId) values (:bruker, :annonse)";
}
else{
  $sql = "delete from favoritter where brukerId = :bruker and annonseId = :annonse";
}

$pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
try{
  $sp = $pdo->prepare($sql);
}
catch(PDOException $e){
  echo 'noe feil skjedde';
}

$sp = $pdo->prepare($sql);
$sp->bindParam(':bruker', $bruker, PDO::PARAM_INT);
$sp->bindParam(':annonse', $annonse, PDO::PARAM_INT);

$annonse = $_GET['annonse'];
$bruker = $_GET['bruker'];

try{
  $sp->execute();
  $results = $sp->fetchAll(PDO::FETCH_OBJ);
  header("Location: ../assets/annonse.php?annonse=" . $annonse);
}
catch(PDOException $e){
  echo 'error' . $e;
  exit();
}

?>

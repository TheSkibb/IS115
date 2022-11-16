<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
define("DB_VERT", "172.17.0.2");
define("DB_BRUKER", "php");
define("DB_PASS", "123");
define("DB_NAVN", "project");

$dkn = "mysql:host=" . DB_VERT . "; dbname=" . DB_NAVN;

try{
  $pdo = new PDO($dkn, DB_BRUKER, DB_PASS);
}
catch(PDOException $e){
  echo "feil ved tilkobling til db
";
  echo $e->getMessage() . "

";
}
?>

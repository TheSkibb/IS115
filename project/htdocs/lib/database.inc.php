<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
$DB_VERT = "172.17.0.2";
$DB_BRUKER = "php";
$DB_PASS = "123";
$DB_NAVN = "project";

$dkn = "mysql:host=" . $DB_VERT . "; dbname=" . $DB_NAVN;

try{
  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
}
catch(PDOException $e){
  echo "feil ved tilkobling til db
";
  echo $e->getMessage() . "

";
}
?>

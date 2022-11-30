<!DOCTYPE html>
<html>
  <head>
    <title>Ny annonse</title>
    <link rel="stylesheet" href="./../static/stylesNavBar.css">
    <link rel="stylesheet" href="./../static/stylesNyAnnonse.css">
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./../lib/navbar.php');

session_start();
if(key_exists('userId', $_SESSION)){
}
else{
  header('Location: ./logginn.php');
}

if(isset($_REQUEST['registrerHybel'])){
  require_once("./../lib/database.inc.php");
  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }
  $sql = "
  insert into annonser (
    eier,
    gate,
    postnummer,
    leie,
    depositum,
    tittel,
    beskrivelse,
    startLeie,
    sluttLeie,
    kollektiv,
    dyrTillatt,
    roykingTillatt,
    stromInkl,
    internettInkl,
    tvInkl,
    moblert,
    boligtype,
    soveromAnt,
    badAnt,
    kvadrat,
    bildelenke
  ) values (
    :bruker,
    :addresse,
    :postnummer,
    :leie,
    :depositum,
    :tittelm
    :beskrivelse,
    :startLeie,
    :sluttLeie,
    :kollektiv,
    :dyrTillatt,
    :roykingTillatt,
    :stromInkl,
    :internettInkl,
    :tvInkl,
    :moblert,
    :boligtype,
    :soveromAnt,
    :badAnt,
    :kvadrat
    :bildelenke
    )";
}
?>

<div id="formContainer">

<h1>Registrer Ny annonse!</h1>
<form method="post" action="./nyAnnonse.php">

  <h4>Info:</h4>
  <p><input type="text" name="Gate" required> Gate</p>
  <p><input type="text" name="Postnummer" required> Postnummer</p>
  <p><input type="number" name="Leie" required> Leie</p>
  <p><input type="number" name="Depositum" required> Depositum</p>
  <p><input type="text" name="Tittel" required> Tittel</p>
  <p><input type="textarea" name="Beskrivelse" required> Beskrivelse</p>
  <p><input type="date" name="startLeie"> Start leie</p>
  <p><input type="date" name="sluttLeie"> Slutt leie</p>

  <h4>Preferanser:</h4>
  <p><input type="checkbox" name="kollektiv"> Kollektiv</p>
  <p><input type="checkbox" name="dyrTillatt"> Dyr tillatt</p>
  <p><input type="checkbox" name="roykingTillatt"> Røyking tillatt</p>
  <p><input type="checkbox" name="stromInkl"> Strøm inkludert</p>
  <p><input type="checkbox" name="internettInkl"> Internett inkludert</p>
  <p><input type="checkbox" name="tvInkl"> TV inkludert</p>
  <p><input type="checkbox" name="moblert"> Møblert</p>

  <p><input type="number" name="soveromAnt"> Antall soverom</p>
  <p><input type="number" name="badAnt"> Antall bad</p>
  <p><input type="number" name="kvadrat"> Kvadratmeter</p>
  <p><input type="file" name="bilde"> Bilde</p>

  <h4>Boligtype:</h4>
  <p><input type="radio" name="boligtype" value="1"> Enebolig</p>
  <p><input type="radio" name="boligtype" value="2"> Garasje/Parkering</p>
  <p><input type="radio" name="boligtype" value="3"> Hybel</p>
  <p><input type="radio" name="boligtype" value="4"> Leilighet</p>
  <p><input type="radio" name="boligtype" value="5"> Rekkehus</p>
  <p><input type="radio" name="boligtype" value="6"> Bofelleskap</p>

  <button name="registrerHybel">Registrer</button>

</form>

</div>

  </body>
</html>

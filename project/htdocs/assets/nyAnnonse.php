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

//check user is logged in
session_start();
if(key_exists('userId', $_SESSION)){
  $bruker = $_SESSION['userId'];
}
else{
  header('Location: ./logginn.php');
}

//if post request is sent
if(isset($_REQUEST['registrerHybel'])){

  require_once("./../lib/database.inc.php");

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
    :tittel,
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
    :kvadrat,
    :bildelenke
    )";

  echo 'test';
  echo $_REQUEST['startLeie'];
  echo $_REQUEST['sluttLeie'];

  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }
  
  $sp = $pdo->prepare($sql);

  $sp->bindParam(':bruker',   $bruker, PDO::PARAM_STR);
  $sp->bindParam(':addresse', $addresse, PDO::PARAM_STR);
  $sp->bindParam(':postnummer', $postnummer, PDO::PARAM_STR);
  $sp->bindParam(':leie', $leie, PDO::PARAM_INT);
  $sp->bindParam(':depositum', $depositum, PDO::PARAM_INT);
  $sp->bindParam(':tittel', $tittel, PDO::PARAM_STR);
  $sp->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
  $sp->bindParam(':startLeie', $startLeie, PDO::PARAM_STR);
  $sp->bindParam(':sluttLeie', $sluttLeie, PDO::PARAM_STR);
  $sp->bindParam(':kollektiv', $kollektiv, PDO::PARAM_BOOL);
  $sp->bindParam(':dyrTillatt', $dyrTillatt, PDO::PARAM_BOOL);
  $sp->bindParam(':roykingTillatt', $roykingTillatt, PDO::PARAM_BOOL);
  $sp->bindParam(':stromInkl', $stromInkl, PDO::PARAM_BOOL);
  $sp->bindParam(':internettInkl', $internettInkl, PDO::PARAM_BOOL);
  $sp->bindParam(':tvInkl', $tvInkl, PDO::PARAM_BOOL);
  $sp->bindParam(':moblert', $moblert, PDO::PARAM_BOOL);
  $sp->bindParam(':boligtype', $boligtype, PDO::PARAM_INT);
  $sp->bindParam(':soveromAnt', $soveromAnt, PDO::PARAM_INT);
  $sp->bindParam(':badAnt', $badAnt, PDO::PARAM_INT);
  $sp->bindParam(':kvadrat', $kvadrat, PDO::PARAM_INT);
  $sp->bindParam(':bildelenke', $bildelenke, PDO::PARAM_STR);

  $addresse = $_REQUEST['Gate'];
  $postnummer = $_REQUEST['Postnummer'];
  $leie = $_REQUEST['Leie'];
  $depositum = $_REQUEST['Depositum'];
  $tittel = $_REQUEST['Tittel'];
  $beskrivelse = $_REQUEST['Beskrivelse'];
  $startLeie = $_REQUEST['startLeie'];
  $sluttLeie = $_REQUEST['sluttLeie'];
  $kollektiv = $_REQUEST['kollektiv'];
  $dyrTillatt = $_REQUEST['dyrTillatt'];
  $roykingTillatt = $_REQUEST['roykingTillatt'];
  $stromInkl = $_REQUEST['stromInkl'];
  $internettInkl = $_REQUEST['internettInkl'];
  $tvInkl = $_REQUEST['tvInkl'];
  $moblert = $_REQUEST['moblert'];
  $boligtype = $_REQUEST['boligtype'];
  $soveromAnt = $_REQUEST['soveromAnt'];
  $badAnt = $_REQUEST['badAnt'];
  $kvadrat = $_REQUEST['kvadrat'];
  $bildelenke = 'bong';

  
  try{
    $sp->execute();
    $results = $sp->fetchAll(PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
  echo 'error' . $e;
  exit();
  }

}
?>

<div id="formContainer">

<h1>Registrer Ny annonse!</h1>
<form method="post" action="./nyAnnonse.php">

  <h4>Info:</h4>
  <p><input type="text" name="Gate" required> Gate</p>
  <p><input type="number" name="Postnummer" required min="1000" max="9999"> Postnummer</p>
  <p><input type="number" name="Leie" required> Leie</p>
  <p><input type="number" name="Depositum" required> Depositum</p>
  <p><input type="text" name="Tittel" required> Tittel</p>
  <p><input type="textarea" name="Beskrivelse" required> Beskrivelse</p>
  <p><input type="date" name="startLeie"> Start leie</p>
  <p><input type="date" name="sluttLeie"> Slutt leie</p>

  <h4>Preferanser:</h4>

  <p>Kollektiv<br>
    <input type="radio" name="kollektiv" value="1"> Ja
    <input type="radio" name="kollektiv" value="2"> Nei
  </p>

  <p> Dyr tillatt<br>
    <input type="radio" name="dyrTillatt" value="1"> Ja
    <input type="radio" name="dyrTillatt" value="2"> Nei
  </p>

  <p> Røyking tillatt<br>
    <input type="radio" name="roykingTillatt" value="1"> Ja
    <input type="radio" name="roykingTillatt" value="2"> Nei
  </p>

  <p> Strøm inkludert<br>
    <input type="radio" name="stromInkl" value="1"> Ja
    <input type="radio" name="stromInkl" value="2"> Nei
  </p>

  <p> Internett inkludert<br>
    <input type="radio" name="internettInkl" value="1"> Ja
    <input type="radio" name="internettInkl" value="2"> Nei
  </p>

  <p> TV inkludert<br>
    <input type="radio" name="tvInkl" value="1"> Ja
    <input type="radio" name="tvInkl" value="2"> Nei
  </p>

  <p> Møblert<br>
    <input type="radio" name="moblert" value="1"> Ja
    <input type="radio" name="moblert" value="2"> Nei
  </p>

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

<!DOCTYPE html>
<html>
  <head>
    <title>Rediger annonse</title>
    <link rel="stylesheet" href="./../static/stylesNavBar.css">
    <link rel="stylesheet" href="./../static/stylesNyAnnonse.css">
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./../lib/navbar.php');

//(disabled til loginn funker igjen)
//sjekk om bruker er logget inn 
/*session_start();
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
*/
if(isset($_REQUEST['redigerAnnonse'])){
  //initialiserer variabel som brukes på tvers av importene
  //var_dump($_FILES);
  $bildeNavn = "";
  $annonseId = $_GET['annonse'];
  if(is_uploaded_file($_FILES['bilde']['tmp_name'])){
    require_once('../lib/lastOppFil.php');
  }
  else{
    require_once('./../lib/getAnnonseInfo.php');
    $bildeNavn = getBildeId($annonseId);
  }
  require_once('../lib/oppdaterAnnonse.php');
  //var_dump($_REQUEST);
}

$bruker = 5;

require_once('./../lib/classes/annonse.php');

$annonse = new Annonse($_GET['annonse']);

?>

<div id="formContainer">

<h1>Rediger din annonse!</h1>
<form method="post" action="./redigerAnnonse.php?annonse=1" enctype="multipart/form-data">
  <h4>Info:</h4>
  <p><input type="text" name="Gate" required
    <?php echo "value='"; $annonse->getGate(); echo "'"?>
  > Gate</p>
  <p><input type="number" name="Postnummer" required min="1000" max="9999"
  <?php echo "value='"; $annonse->getPostNummer(); echo "'"?>
  > Postnummer</p>
  <p><input type="number" name="Leie" required
  <?php echo "value='"; $annonse->getLeie(); echo "'"?>
  > Leie</p>
  <p><input type="number" name="Depositum" required
  <?php echo "value='"; $annonse->getDepositum(); echo "'"?>
  > Depositum</p>
  <p><input type="text" name="Tittel" required
  <?php echo "value='"; $annonse->getTittel(); echo "'"?>
  > Tittel</p>
  <p><input type="textarea" name="Beskrivelse" required
  <?php echo "value='"; $annonse->getBeskrivelse(); echo "'"?>
  > Beskrivelse</p>
  <p><input type="date" name="startLeie"
  <?php echo "value='"; $annonse->getStartLeie(); echo "'"?>
  > Start leie</p>
  <p><input type="date" name="sluttLeie"
  <?php echo "value='"; $annonse->getSluttLeie(); echo "'"?>
  > Slutt leie</p>

  <h4>Preferanser:</h4>

  <?php 

    //$preferanse string, settes som navn på feltet
//printer ut radio buttons med riktig checket utifra hva som står i db
    function getPreferanser($preferanse){
    global $annonse;
      echo '<input type="radio" name="' . $preferanse . '"' .
      ($annonse->getInfo($preferanse) == 1 ? 'checked="true"' : '' ).' value="1"> Ja
      <input type="radio" name="' . $preferanse . '"' .'" value="0" '.
      ($annonse->getInfo($preferanse) == 0 ? 'checked="true"' : '' ) . '> Nei';
    }
  ?>
  <p>Kollektiv<br>
  <?php getPreferanser('kollektiv');?>
  </p>

  <p> Dyr tillatt<br>
  <?php getPreferanser('dyrTillatt');?>
  </p>

  <p> Røyking tillatt<br>
  <?php getPreferanser('roykingTillatt');?>
  </p>

  <p> Strøm inkludert<br>
  <?php getPreferanser('stromInkl');?>
  </p>

  <p> Internett inkludert<br>
  <?php getPreferanser('internettInkl');?>
  </p>

  <p> TV inkludert<br>
  <?php getPreferanser('tvInkl');?>
  </p>

  <p> Møblert<br>
  <?php getPreferanser('moblert');?>
  </p>

  <p><input type="number" name="soveromAnt" <?php echo 'value="'; echo $annonse->getSoveromAnt() . '"'?>> Antall soverom</p>
  <p><input type="number" name="badAnt" <?php echo 'value="'; echo $annonse->getBadAnt() . '"'?>> Antall bad</p>
  <p><input type="number" name="kvadrat" <?php echo 'value="'; echo $annonse->getKvadrat() . '"'?>> Kvadratmeter</p>

  <h4>Boligtype:</h4>
  <?php $boligtype = $annonse->getBoligtype(); echo $boligtype?>
  <p><input type="radio" name="boligtype" value="1" <?php echo $boligtype == 'Enebolig' ? 'checked="true"' : '' ?>> Enebolig</p>
  <p><input type="radio" name="boligtype" value="2" <?php echo $boligtype == "Garasje/Parkering" ? 'checked="true"' : '' ?>> Garasje/Parkering</p>
  <p><input type="radio" name="boligtype" value="3" <?php echo $boligtype == 'Hybel' ? 'checked="true"' : '' ?>> Hybel</p>
  <p><input type="radio" name="boligtype" value="4" <?php echo $boligtype == 'Leilighet' ? 'checked="true"' : '' ?>> Leilighet</p>
  <p><input type="radio" name="boligtype" value="5" <?php echo $boligtype == 'Rekkehus' ? 'checked="true"' : '' ?>> Rekkehus</p>
  <p><input type="radio" name="boligtype" value="6" <?php echo $boligtype == 'Bofelleskap' ? 'checked="true"' : '' ?>> Bofelleskap</p>

  <p>
    <b>Bilde:</b><br>
    <input type="file" name="bilde" size="20" accept="image/x-png,image/jpeg">
  </p>

  <button type="submit" name="redigerAnnonse" value="redigerAnnonse">redigerAnnonse</button>

</form>

</div>

  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>annonse</title>
    <link rel="stylesheet" href="../static/stylesAnnonser.css" />
    <link rel="stylesheet" href="../static/stylesNavBar.css" />
  </head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
require_once("../lib/classes/annonse.php");
require_once("./../lib/navbar.php");

session_start();

if(key_exists('userId', $_SESSION)){
  $bruker = $_SESSION['userId'];
}
else{
  header('Location: ./logginn.php');
  exit();
}

if(!key_exists( 'annonse', $_GET)){
  header("Location: 404.php");
}

$annonse = new Annonse($_GET['annonse']);

function getImage(){
  global $annonse;
  $annonse->getImage();
}

function getTittel(){
  global $annonse;
  $annonse->getTittel();
}

function getBruker(){
  global $annonse;
  $annonse->getBruker();
}

function getBeskrivelse(){
  global $annonse;
  $annonse->getBeskrivelse();
}

function getInfoListe(){
  global $annonse;
  $annonse->getInfoListe();
}

function getLeie(){
  global $annonse;
  $annonse->getLeie();
}

function getAddresse(){
  global $annonse;
  $annonse->getAddresse();
}

function getMeldingLink(){
  global $annonse;
  $id = $annonse->getBrukerId();
  echo 'href="./melding.php?bruker=' . '2"';
}

//check if the annonse is a favorite or not
$favorite = $annonse->isFavorite($bruker, $_GET['annonse']);

$favoriteLink = 
  '../lib/favorite.php' .
  '?annonse=' . $_GET['annonse'] .
  '&bruker=' . $bruker .
  '&favorite=' . $favorite
;
?>


  <body>
    <div id="annonseContainer">
      <div id="bildeContainer" class="containerItem">
        <img src=<?php getImage($annonse)?> height="300px">

      </div>
      <div id="tittelContainer" class="containerItem">
        <div id="tittel"><b><?php getTittel($annonse)?></b></div>
        <p><?php 
          echo "Leie: ";
          getLeie();
          echo '/mnd';
        ?></p>
        <p>
        <?php
          echo 'Addresse: ';
          getAddresse();
        ?>
        </p>
      </div>
      <div id="delContainer" class="containerItem">
        <div id="actionWrapper">
          <img id="shareIcon" class="clickable" src="../images/share.png" height="50px">
          <a href=<?php echo $favoriteLink?> id="favoriteLink" class="clickable" onclick="clickFavorite()">
              <?php echo $favorite == 0 ? '🤍' : '❤️️'?>
          </a>
        </div>
        <img id="brukerIcon" class="clickable" src="../images/userIcon.jpg" height="100px">
        <div id="brukerNavn" class="clickable"><?php getBruker($annonse) ?></div>
        <div id="sendMeldingKnapp" class="clickable">
          <a <?php getMeldingLink()?> id="meldingBtn">Send melding</a>
        </div>
      </div>

      <div class="infoContainer containerItem">
        <div>
          <b>info om denne hybelen</b><br />
        <ul id="infoListe">
          <?php getInfoListe()?>
          </ul>
        </div>
      </div>
      <div id="beskrivelseContainer" class="containerItem">
        <div id="beskrivelse">
          <b>Beskrivelse: </b><br/>
          <p id="beskrivelseText">
          <?php getBeskrivelse()?>
          </p>
        </div>
      </div>
    </div>
  <script>
    function clickFavorite(){
      const filledHeart = "❤️️"
      const emptyHeart = "🤍"
      const heartElement = document.getElementById("favoriteLink");
      if(heartElement.innerHTML == emptyHeart){
        heartElement.innerHTML = filledHeart
      }
      else{
        heartElement.innerHTML = emptyHeart
      }
    }
  </script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>annonse</title>
    <link rel="stylesheet" href="../static/stylesAnnonser.css" />
  </head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
include "../lib/classes/annonse.php";

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

?>

  <body>
    <div id="annonseContainer">
      <div id="bildeContainer" class="containerItem">
        <img src=<?php getImage($annonse)?> height="300px">

      </div>
      <div id="tittelContainer" class="containerItem">
        <div id="tittel"><b><?php getTittel($annonse)?></b></div>
      </div>
      <div id="delContainer" class="containerItem">
          <div><img id="shareIcon" class="clickable" src="../images/share.png" height="50px"></div>
          <div id="heartIcon" class="clickable" onclick="clickFavorite()">🤍</div>
      </div>
      <div class="infoContainer containerItem">
        <div>
          <b>info om denne hybelen</b><br />
        <ul id="infoListe">
          <?php getInfoListe()?>
          </ul>
        </div>
      </div>
      <div id="brukerContainer" class="containerItem">
        <div id="brukerInfo">
          <img id="brukerIcon" class="clickable" src="../images/userIcon.jpg" height="100px">
          <div id="brukerNavn" class="clickable"><?php getBruker($annonse) ?></div>
        </div>
        <div id="sendMeldingKnappWrapper">
          <div id="sendMeldingKnapp" class="clickable">
            Send melding
          </div>
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
      const heartElement = document.getElementById("heartIcon");
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

<!DOCTYPE html>
<html>
  <head>
    <title>Page Title</title>
    <link rel="stylesheet" href="styles.css" />
  </head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
$information = array(
  'bilde'=>"images/example.jpg",
  'tittel'=>"Koselig hybel for studenter",
  'bruker' => "Ola Jensen Rudolf Amunsen Sveinsson",
  'infoListe'=>array(
    "leie: 12 000kr",
    "depositum: 24 000kr",
    "strøm: inkludert",
    "internett: ikke inkludert",
    "dyr: ikke tillatt",
    "røyking: ikke tillatt",
  ),
  'beskrivelse'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
);

function getImage($information){
  echo $information['bilde'];
}

function getTittel($information){
  echo $information['tittel'];
}

function getBruker($information){
  echo $information['bruker'];
}

function getBeskrivelse($information){
  echo $information['beskrivelse'];
}

function getInfoListe($information){
  $output = "";
  foreach($information['infoListe'] as $info){
    $output .= "<li>" . $info . "</li>";
  }
  echo $output;
}

?>

  <body>
    <div id="annonseContainer">
      <div id="bildeContainer" class="containerItem">
        <img src=<?php getImage($information)?> height="300px">

      </div>
      <div id="tittelContainer" class="containerItem">
        <div id="tittel"><b><?php getTittel($information)?></b></b></div>
      </div>
      <div id="delContainer" class="containerItem">
          <div><img id="shareIcon" class="clickable" src=images/share.png height="50px"></div>
          <div id="heartIcon" class="clickable" onclick="clickFavorite()">🤍</div>
      </div>
      <div class="infoContainer containerItem">
        <div>
          <b>info om denne hybelen</b><br />
        <ul id="infoListe">
          <?php getInfoListe($information)?>
          </ul>
        </div>
      </div>
      <div id="brukerContainer" class="containerItem">
        <div id="brukerInfo">
          <img id="brukerIcon" class="clickable" src=images/userIcon.jpg height="100px">
          <div id="brukerNavn" class="clickable"><?php getBruker($information) ?></div>
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
          <?php getBeskrivelse($information)?>
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

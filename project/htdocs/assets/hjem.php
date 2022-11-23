<!DOCTYPE html> <html lang="en">
<head><title>Hjem</title>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Utseende til søkeikonet  /* */-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./../static/stylesHjem.css">

</head>
<body>
<!--Navigasjonsbar  -->
<?php require_once("./../lib/navbar.php");?>


<div class="rad">
  <div class="side">
    <h2>Prosjekt</h2>
    <p>Område</p>
    <ul class="list">
      <li>
        <input type="checkbox" id="agder"/> <label for="agder">
          Agder<!--location-0.22042 --></label> 
      </li>
      <li>
      <!--<div class="input-toggle">-->
        <input type="checkbox" id="innlandet"/>
        <label for="innlandet">Innlandet <!-- location-0.22034-->
        </label>
      </li>
      <li>
        <input type="checkbox" id="møre_og_romsdal"/>
          <label for="møre_og_romsdal">Møre og Romsdal<!--location-0.20015 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="nordland"/>
          <label for="nordland">Nordland<!--location-0.20018 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="oslo"/>
           <label for="oslo">Oslo<!--location-0.20061 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="rogaland"/>
          <label for="rogaland">Rogaland<!--location-0.20012 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="troms_og_finnmark"/>
          <label for="troms_og_finnmark">Troms og Finnmark<!--location-0.22054 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="trøndelag"/>
          <label for="trøndelag">Trøndelag<!--location-0.20016 -->
           </label>
      </li>
      <li>
        <input type="checkbox" id="vestfold_og_telemark"/>
          <label for="vestfold_og_telemark">Vestfold og Telemark<!--location-0.22038 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="vestland"/>
          <label for="vestland">Vestland<!--location-0.22046 -->
          </label>
      </li>
      <li>
        <input type="checkbox" id="viken"/>
          <label for="viken">Viken<!--location-0.22030 -->
          </label>
      </li>
    </ul>


    <p>Størrelse</p>
    <ul class="list">
      <li>
        <input type="checkbox" id="0-10"/> 
        <label for="0-10"> 
          0-10 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="10-20"/> 
        <label for="10-20"> 
          10-20 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="20-30"/> 
        <label for="20-30"> 
         20-30 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="30-40"/> 
        <label for="30-40"> 
        30-40 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="40-50"/> 
        <label for="40-50"> 
        40-50 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="50-60"/> 
        <label for="50-60"> 
        50-60 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="60-70"/> 
        <label for="60-70"> 
        60-70 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="70-80"/> 
        <label for="70-80"> 
        70-80 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="80-90"/> 
        <label for="80-90"> 
        80-90 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="90-100"/> 
        <label for="90-100"> 
        90-100 m<sup>2</sup>
        </label> 
      </li>
      <li>
        <input type="checkbox" id="100+"/> 
        <label for="100+"> 
        100+ m<sup>2</sup>
        </label> 
      </li>
    </ul>
    <p>Antall soverom </p>
    <ul class="list">
      <li>
        <input type="checkbox" id="soverom1"/> 
        <label for="soverom1"> 
          1
        </label> 
      </li>
      <li>
        <input type="checkbox" id="soverom2"/> 
        <label for="soverom2"> 
          2
        </label> 
      </li>
      <li>
        <input type="checkbox" id="soverom3"/> 
        <label for="soverom3"> 
          3
        </label> 
      </li>
      <li>
        <input type="checkbox" id="soverom4"/> 
        <label for="soverom4"> 
          4
        </label> 
      </li>
      <li>
        <input type="checkbox" id="soverom5"/> 
        <label for="soverom5"> 
          5+
        </label> 
      </li>
    </ul>
    <p>Boligtype</p>
    <ul class="list">
      <li>
        <input type="checkbox" id="enebolig"/> 
        <label for="enebolig"> 
        Enebolig
        </label> 
      </li>
      <li>
        <input type="checkbox" id="garasje/parkering"/> 
        <label for="garasje/parkering"> 
        Garasje/Parkering
        </label> 
      </li>
      <li>
        <input type="checkbox" id="hybel"/> 
        <label for="hybel"> 
        Hybel
        </label> 
      </li>
      <li>
        <input type="checkbox" id="leilighet"/> 
        <label for="leilighet"> 
        Leilighet
        </label> 
      </li>
      <li>
        <input type="checkbox" id="rekkehus"/> 
        <label for="rekkehus"> 
        Rekkehus
        </label> 
      </li>
      <li>
        <input type="checkbox" id="bofelleskap"/> 
        <label for="bofelleskap"> 
        Bofelleskap
        </label> 
      </li>
      <li>
        <input type="checkbox" id="tomannsbolig"/> 
        <label for="tomannsbolig"> 
        Tomannsbolig
        </label> 
      </li>
      <li>
        <input type="checkbox" id="andre"/> 
        <label for="andre"> 
        Andre
        </label> 
      </li>
    </ul>

  <!--  <div class="bilde" style="height:60px;">Tekst</div><br>-->
</div>


<!--hoved siden, på høyre siden  -->
<div class="hoved">
<?php
  include "./../lib/classes/hjemAnnonse.php";
  HjemAnnonse::getAllAnnonser();
?>

</div>

</body>
</html>

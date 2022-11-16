<!DOCTYPE html> <html lang="en">
<head><title>Hjem</title>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Utseende til søkeikonet  /* */-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

/* Utseende på "bodyen" */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Kolonne "container" */
.rad {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Lag to ulike kolonner som sitter ved siden av hverandre */
/* Sidefelt/venstre kolonne */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 15%;
  background-color: #FFF9EE;
  padding: 20px;
}

/* Hoved kolonne */
.hoved {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white; /* #FFFEFA; Forrige farge */
  padding: 20px;
  height: 100%; /* Fortsetter fargene videre */
}

/* Bilde */
.bilde {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Navigasjonsbar utseende*/
.topnav {
  overflow: hidden;
  background-color: #FFF4DA;
}

/* Navigasjonsbar utseende skrift, plassering etc.*/
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Navigasjonsbar hover utseende, alt annet enn hovedknappen*/
.topnav a:hover {
  background-color: #FFDBB7;
  color: black;
}

/* Navigasjonsbar hovedknapp utseende*/
.topnav a.active {
  background-color: #FFEAB7;
  color: black;
}

/* Navigasjonsbar søkeknapp plassering*/
.topnav .sokeknapp {
  float: right;
}

/* Navigasjonsbar str*/
.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}
/* Navigasjonsbar søkeknapp str*/
.topnav .sokeknapp button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #FFEAB7;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

/* Navigasjonsbar søkeknapp hover*/
.topnav .sokeknapp button:hover {
  background: #FFDBB7;
}

/* Navigasjonsbar str*/
@media screen and (max-width: 600px) {
  .topnav .sokeknapp {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .sokeknapp button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
/* */
/*Knapp uttsende */
.knapp {
  background-color: transparent;
        color: black;
        border: none;
        padding: 50px;
        /*margin: 0px;*/
        width: 100px;
        height: 100%;
        /* position: fixed;*/
}

.knapp:hover {
  /*Skygge effekt når du skal trykke på den */
  box-shadow: 0 2px 16px 0 rgba(0,0,0,0.24),0 17px 10px 0 rgba(0,0,0,0.19);
}

    
</style>
</head>
<body>
<!--Navigasjonsbar  -->
<div class="topnav">
  <a class="active" href="hjem.php">Hjem</a>
  <a href="profil.php">Profil</a>
  <a href="favoritt.php">♥</a>
  <a href="logginn.php">Logg inn</a>
  <div class="sokeknapp">
    <form action="sok.php">
      <input type="text" placeholder="Søk.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>


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
<button class="knapp" style="font-size : 15px; width: 100%; height: 40%;">
  <h2>Nydelig 3-roms leilighet til leie i Lund</h2>
  <h5>80m<sup>2</sup>, 14.000 kr</h5>
  <div class="bilde" style="height:200px;">Tekst</div>
  <p>Leilighet, rom i bofelleskap, 3 soverom, balkong, garasje, heis</p>
  <br>
</button>


<button class="knapp" style="font-size : 15px; width: 100%; height: 40%;">
  <h2>Pen sentrumsnær leilighet i Kristiansand</h2>
  <h5>60m<sup>2</sup>, 10.000 kr</h5>
  <div class="bilde" style="height:200px;">Tekst</div>
  <p>Hybel, 2 soverom, strøm</p>
  <br>
</button>

<button class="knapp" style="font-size : 15px; width: 100%; height: 40%;">
  <h2>Grim - lys og trivelig 2-roms med terrasse</h2>
  <h5>50m<sup>2</sup>, 11.000 kr</h5>
  <div class="bilde" style="height:200px;">Tekst</div>
  <p>Leilighet, 2 soverom, P-plass, terrasse,  fullt møblert, kabel, heis</p>
  <br>
</button>

  </div>
</div>

</body>
</html>

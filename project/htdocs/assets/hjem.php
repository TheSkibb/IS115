<!DOCTYPE html> <html lang="en">
<head><title>Hjem</title>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Utseende til søkeikonet  /* */-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./../static/stylesHjem.css">

<?php
if(isset($_REQUEST['filterSok'])){
  require_once("./../lib/createSearchFilter.php");
}
?>

</head>
<body>
<!--Navigasjonsbar  -->
<?php require_once("./../lib/navbar.php");?>


<div class="rad">
  <div class="side">
    <h2>Filtrer ditt søk</h2>

<form method="POST" action="./hjem.php">
    <p>
      <span>Pris:</span><br>
      <input 
        type="number" 
        name="minPris" 
        <?php echo 'value="' . $_REQUEST['minPris'] . '"'?>> 
      min pris:<br>
      <input 
        type="number" 
        name="maksPris"
        <?php echo 'value="' . $_REQUEST['maksPris'] . '"'?>> 
          maks pris<br>
    </p>

    <p>
      <span>Leieperiode</span><br>
      <input 
        type="date" 
        name="startLeie" 
        id="startDate"
        <?php echo 'value="' . $_REQUEST['startLeie'] . '"'?>
        onchange="validateDate()"> start leie<br>
      <input 
        type="date" 
        name="sluttLeie" 
        id="endDate"
        <?php echo 'value="' . $_REQUEST['sluttLeie'] . '"'?>
        onchange="validateDate()"> slutt leie<br>
      <span id="dateErrorText" style="color: red"></span>
    </p>
<script>
//script to validate date inputs
dateStart = document.getElementById("startDate")
dateEnd = document.getElementById("endDate")
errorText = document.getElementById("dateErrorText")
const currentDate = new Date().toISOString().split('T')[0];

//ikke mulig å velge datoer i fortiden
dateStart.setAttribute("min", currentDate);
dateEnd.setAttribute("min", currentDate);

//sjekk at startdatoen ikke er før sluttdatoen
function validateDate(){
  startDate = new Date(dateStart.value)
  endDate = new Date(dateEnd.value)
  if(startDate > endDate){
    errorText.innerText = "dato for start av leie kan ikke være etter dato for slutt"
  }
  else{Start
    errorText = ""
  }
}

</script>

    <p>Størrelse</p>
    <ul>
      <li>
        min: <input 
          type="range" 
          id="minSlider"
          default="5"
          name="minSize"
          oninput="updateSliders()">
        <br>
        <span id="minText">0</span>
      </li>
      <li>
        maks: <input 
          type="range" 
          id="maxSlider"
          default="60"
          name="maxSize"
          oninput="updateSliders()">
        <br>
        <span id="maxText">0</span>
      </li>
      <span id="errorText" style="color: red"></span>
<script>
//lite script for å kontrollere størrelsene for range inputene
minSlider = document.getElementById("minSlider")
maxSlider = document.getElementById("maxSlider")
minText = document.getElementById("minText")
maxText = document.getElementById("maxText")

minSlider.setAttribute("min", "1");
minSlider.setAttribute("max", "200");
maxSlider.setAttribute("min", "0");
maxSlider.setAttribute("max", "200");
minSlider.value = "15"
maxSlider.value = "60"

function updateSliders(){
  const min = minSlider.value
  const max = maxSlider.value
  if(min>max){
    document.getElementById("errorText").innerText = "maks kan ikke være mindre enn min";
  }
  else{
    document.getElementById("errorText").innerText = "";
  }
  minText.innerText = min
  maxText.innerText = max
  if(max>199){
    maxText.innerText += '+'
  }
}

updateSliders()
</script>
    </ul>

    <p>Boligtype</p>
    <ul class="list">
      <li>
        <input type="checkbox" checked="true" name="enebolig" id="enebolig"/> 
        <label for="enebolig"> 
        Enebolig
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="garasjeparkering" id="garasje/parkering"/> 
        <label for="garasje/parkering"> 
        Garasje/Parkering
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="hybel" id="hybel"/> 
        <label for="hybel"> 
        Hybel
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="leilighet" id="leilighet"/> 
        <label for="leilighet"> 
        Leilighet
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="rekkehus" id="rekkehus"/> 
        <label for="rekkehus"> 
        Rekkehus
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="bofelleskap" id="bofelleskap"/> 
        <label for="bofelleskap"> 
        Bofelleskap
        </label> 
      </li>
      <li>
        <input type="checkbox" checked="true" name="tomannsbolig" id="tomannsbolig"/> 
        <label for="tomannsbolig"> 
        Tomannsbolig
        </label> 
      </li>
    </ul>
    <p>
      <span>Andre Preferanser:</span><br>
      <ul>
        <li><input type="checkbox" checked="true" name="kollektiv">kollektiv</li>
        <li><input type="checkbox" checked="true" name="dyrTillatt">dyrTillatt</li>
        <li><input type="checkbox" checked="true" name="roykingTillatt">roykingTillatt</li>
        <li><input type="checkbox" checked="true" name="stromInkl">stromInkl</li>
        <li><input type="checkbox" checked="true" name="internettInkl">internettInkl</li>
        <li><input type="checkbox" checked="true" name="tvInkl">tvInkl</li>
        <li><input type="checkbox" checked="true" name="moblert">moblert<br></li>
      </ul>
    </p>
    <p>
      <span>Sorter etter:</span>
      <ul>
        <li><input type="radio" name="sortRadio" value="hiLo">pris: Lav - høy</li>
        <li><input type="radio" name="sortRadio" value="loHi">pris: Høy - lav</li>
      </ul>
    </p>
    <button type="submit" name="filterSok">Filtrer ditt søk!</button>
</form>
  <!--  <div class="bilde" style="height:60px;">Tekst</div><br>-->
</div>


<!--hoved siden, på høyre siden  -->
<div class="hoved">
<?php
  include "./../lib/classes/hjemAnnonse.php";
  HjemAnnonse::getAllAnnonser($searchFilter);
?>

</div>

</body>
</html>

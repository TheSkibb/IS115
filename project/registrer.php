<!DOCTYPE html>
<html lang="en">
<head>
<title>Hjem</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Utseende til søkeikonet -->
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

/* Hoved kolonne */
.hoved {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: #FFFEFA;
  padding: 20px;
  margin:0 auto; text-align:center;
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

/*Knapp uttsende */
.knapp {
    background-color: #FFEAB7;
        color: black;
        border: none;
        padding: 10px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        margin:10px;
        width: 90px;
        height: 40px;
}

.knapp:hover {
  background-color: #FFA74F;
  color: white;
}

a { text-decoration: none; 
    color: #FFA74F;}

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


<!--hoved siden-->
<div class="hoved">
<h2>Registrer ny bruker</h2>
  <form action="profil.php">
    <label for="navn">Navn:</label><br>
        <input type="text" id="navn" name="navn"><br><br>

    <label for="epost">E-post:</label><br>
        <input type="text" id="epost" name="epost"><br><br>
    
    <p>Hvilket kjønn?</p>
        <input type="radio" id="kvinne" value="kvinne">
        <label for="html">Kvinne</label><br>
        
        <input type="radio" id="mann" value="mann">
        <label for="css">Mann</label><br>

        <input type="radio" id="ikke_kjønn" value="ikke_kjønn">
        <label for="css">Ønsker ikke å oppgi</label><br>

    <p>Velg om du er en utleier eller leier:</p>
        <input type="radio" id="utleier" value="utleier">
        <label for="html">Utleier</label><br>
        
        <input type="radio" id="leier" value="leier">
        <label for="css">Leier</label><br> <br>
    
    <label for="beskrivelse_tekst">Beskrivelse av deg selv:</label></p>
        <textarea id="beskrivelse" name="beskrivelse" rows="4" cols="50">Skriv litt informasjon om deg selv...
        </textarea><br><br>
    
    <label for="passord">Passord</label><br>
    <input type="text" id="passord" name="passord"><br><br>

    <label for="passord_gjenta">Gjenta passord</label><br>
    <input type="text" id="passord_gjenta" name="passord_gjenta"><br><br>
        
    <button type=submit class="knapp">Send inn</button>

</form> <br><br>
<h3>Har du en konto? <a href="logginn.php" style="text-decoration: none">Logg inn </a></h3>

</div>





</body>
</html>

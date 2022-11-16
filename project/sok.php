<!DOCTYPE html>
<html lang="en">
<head>
<title>Søk</title>
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
  background-color: white; 
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

<!--hoved siden -->
<div class="hoved" >
<h2>Søk</h2>
  
</div>




</body>
</html>

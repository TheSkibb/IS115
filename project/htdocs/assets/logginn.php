<!DOCTYPE html>
<html lang="en">
<head>
<title>Hjem</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Ny -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

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
  height: 100px; /* Fortsetter fargene videre */
}

/* Hoved kolonne */
.hoved {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
  margin:0 auto; text-align:center;
  height: 100%; /* Fortsetter fargene videre */
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

/* Tekst dekorasjon str*/
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


<!--hoved siden, på høyre siden  -->
<div class="hoved">
    <h2>Logg inn</h2>
    <div class="login">
    <form name="f1" action = "godkjenning_logginn.php" onsubmit = "return validation()" method = "POST">  
            <label for="username">
                <i class="fas fa-user"></i><br>
            </label>
            <input type = "text" id = "bruker" name  = "bruker" placeholder="E-post" required/>  
            <br><br>
            <label for="password">
                <i class="fas fa-lock"></i><br>
            </label>
            <input type = "password" id = "passord" name  = "passord" placeholder= "Passord" required/>  
            <br><br><br>
            <input type= "submit" id = "submit" value= "Login" />
        </form>
        <br><br><br>
        <h3>Har du ikke en konto? <a href="registrer.php" style="text-decoration: none">Registrer deg </a></h3>
</div>
<script>  
            function validation()  
            {  
                var id=document.f1.bruker.value;  
                var ps=document.f1.passord.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Brukernavn og passord må fylles ut.");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Skriv inn brukernavn.");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Skriv inn passord.");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>
</html>

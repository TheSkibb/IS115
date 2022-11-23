<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrering</title>
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
  margin:0 auto; text-align:center;
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

<div class="hoved">
<h2>Registrer ny bruker</h2>
<?php
    require('../lib/forbindelse_logginn.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $kjonn    = stripslashes($_REQUEST['kjonn']);
        $kjonn    = mysqli_real_escape_string($con, $kjonn);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime, kjonn)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', '$kjonn')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='logginn.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registrer.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <input type="text" class="login-input" name="username" placeholder="Fullt navn" required />
        <input type="text" class="login-input" name="email" placeholder="E-post">
        <input type="password" class="login-input" name="password" placeholder="Passord">
        
        <label for="Gender">Kjønn</label>
      <label class="radio-inline">
        <input type="radio" name="kjonn"  value="mann" checked>
        Mann </label>
      <label class="radio-inline">
        <input type="radio" name="kjonn"  value="kvinne">
        Kvinne </label>
        <label class="radio-inline">
        <input type="radio" name="ikke_kjonn"  value="ikke_kjonn">
        Ønsker ikke å oppgi </label>

   

        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="logginn.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</div>


</div>





</body>
</html>

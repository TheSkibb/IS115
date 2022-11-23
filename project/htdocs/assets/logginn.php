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

<div class="hoved">
    <h2>Logg inn</h2>
    <?php
    require('../lib/forbindelse_logginn.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: godkjenning_logginn.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='logginn.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registrer.php">New Registration</a></p>
  </form>
<?php
    }
?>
</div>


</body>
</html>

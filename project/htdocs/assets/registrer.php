<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrering</title>
<meta content="text/html; charset=UTF-8' http-equiv='Content-Type"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include("../static/utforming.php");
include("../lib/database.php");

#include("../lib/godkjenning.php");
#include("../lib/sesjon.php");

#require('../lib/sesjon.php');
?>
<div class="hoved">
<?php
#$remarks = isset($_GET["remarks"]) ? $_GET["remarks"] : '';
#if ($remarks==null and $remarks=="") {
#echo " <h2> Registrer her </h2> ";
#
#if ($remarks=='success') {
#echo " <p> Du er registrert. </p>";
#}
#if ($remarks=='failed') {
#echo " <p> Registrering mislyktes, brukernavnet finnes </p>";
#}
#if ($remarks=='error') {
#echo " <p> Registrering feilet! <br> Feil: ".$_GET["value"]." </p> ";
#}
#echo " <h2> Registrer her </h2> ";

#if (isset($_REQUEST["brukernavn"])) { 
  
  

if (isset($_REQUEST["brukernavn"])) {
  $fornavn    = stripslashes($_REQUEST["fornavn"]);
  $fornavn    = mysqli_real_escape_string($con, $fornavn);

  $etternavn    = stripslashes($_REQUEST["fornavn"]);
  $etternavn    = mysqli_real_escape_string($con, $etternavn);

  $brukernavn = stripslashes($_REQUEST["brukernavn"]);
  $brukernavn = mysqli_real_escape_string($con, $brukernavn);

  $epost    = stripslashes($_REQUEST["epost"]);
  $epost    = mysqli_real_escape_string($con, $epost);

  $kjonnId    = stripslashes($_REQUEST["kjonnId"]);
  $kjonnId    = mysqli_real_escape_string($con, $kjonnId);

  $passord = stripslashes($_REQUEST["passord"]);
  $passord = mysqli_real_escape_string($con, $passord);

  $beskrivelse = stripslashes($_REQUEST["beskrivelse"]);
  $beskrivelse = mysqli_real_escape_string($con, $beskrivelse);

  $brukerTypeId = stripslashes($_REQUEST["brukerTypeId"]);
  $brukerTypeId = mysqli_real_escape_string($con, $brukerTypeId);

  $query    = "INSERT into `bruker` (fornavn, etternavn, brukernavn, passord, epost, kjonnId, beskrivelse, brukerTypeId)
               VALUES ('$fornavn', '$etternavn', '$brukernavn', '" . md5($passord) . "', '$epost', '$kjonnId', '$beskrivelse', '$brukerTypeId')";
  $result   = mysqli_query($con, $query);
} if ($result) {
  echo "<div class='form'>"; 
        "<h3>Du er registert.</h3><br/>
        <p class='link'>Klikk her for å  <a href='logge inn.php'>Login</a></p>
        </div>";
} else {
  echo "<div class='form'>
        <h3>Required fields are missing.</h3><br/></div>";
}
?>
<!-- 
<form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    action="../lib/forbindelse.php"
-->
<form class="form" action="" onsubmit="return validateForm()" method="post" >
<table border="0" align="center" cellpadding="2" cellspacing="0">

<!--Fornavn input   name="reg"-->
<tr>
<td><div align="left">Fornavn:</div></td>
<td width="171"><input type="text" class="login-input" name="fornavn" /></td>
</tr>
<!--Etternavn input  -->
<tr>
<td><div align="left">Etternavn:</div></td>
<td><input type="text" name="etternavn" class="login-input" /></td>
</tr>
<!--Epost  -->
<tr>
<td><div align="left" >E-post:</div></td>
<td><input type="text" class="login-input"  name="epost" /></td>
</tr>
<!--Brukernavn  -->
<tr>
<td><div align="left">Brukernavn:</div></td>
<td><input type="text" class="login-input" name="brukernavn" /></td>
</tr>
<!--Passord  class="t-1"-->
<tr>
<td><div align="left">Passord:</div></td>
<td><input class="login-input" type="password" name="passord" /></td>
</tr>
</table><br>

<!--<label for="Gender">Kjønn</label>-->
<label class="radio-inline">
      <input type="radio" class="login-input" name="kjonnId"  value="1" checked>
      Mann </label>
      
    <label class="radio-inline">
      <input type="radio" class="login-input" name="kjonnId"  value="2">
      Kvinne </label>
    
    <label class="radio-inline">
      <input type="radio" class="login-input" name="kjonnId"  value="3">
      Ønsker ikke å oppgi </label> <p>
    
    <label class="radio-inline">
      <input type="radio" class="login-input" name="brukerTypeId"  value="1" checked>
      Utleier </label>
    
    <label class="radio-inline">
      <input type="radio" class="login-input" name="brukerTypeId"  value="2">
      Leietaker </label> <p>
     
    <label for="beskrivelse">Beskrivelse om deg selv:</label></p>
    <textarea id="beskrivelse" class="login-input" name="beskrivelse" rows="4" cols="50">Er du en utleier/leietaker, hva er du på utkikk etter etc...</textarea><br><br>
  
<!--Knapp  -->
<input type="submit" name="submit"  value="Register" class="login-button">

</form>



</div>
</div>
</body>
</html>

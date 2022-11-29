<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrering</title>
<meta content="text/html; charset=UTF-8' http-equiv='Content-Type"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include("../static/utforming.php");
include("../lib/godkjenning.php");

#require('../lib/sesjon.php');
?>
<div class="hoved">
<?php
$remarks = isset($_GET["remarks"]) ? $_GET["remarks"] : '';
if ($remarks==null and $remarks=="") {
echo " <h2> Register here </h2> ";
}
if ($remarks=='success') {
echo " <p> Du er registrert. </p>";
}
if ($remarks=='failed') {
echo " <p> Registrering mislyktes, brukernavnet finnes </p>";
}
if ($remarks=='error') {
echo " <p> Registrering feilet! <br> Feil: ".$_GET["value"]." </p> ";
}
?>

<form form name="reg" action="../lib/forbindelse.php" onsubmit="return validateForm()" method="post" >
<!--Fornavn input  class="form"-->
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<td class="login-input" >
<div align="left">Fornavn:</div>
</td>
<td width="171">
<input type="text" name="fornavn" id="tb-box"/>
</td>
</tr>
<!--Etternavn input  -->
<tr>
<td class="login-input" ><div align="left" id="tb-name">Etternavn:</div></td>
<td><input type="text" name="etternavn" id="tb-box"/></td>
</tr>
<!--Epost  -->
<tr>
<td class="login-input" ><div align="left" id="tb-name">E-post:</div></td>
<td><input type="text" id="tb-box" name="epost" /></td>
</tr>
<!--Brukernavn  -->
<tr>
<td class="login-input" ><div align="left" id="tb-name">Brukernavn:</div></td>
<td><input type="text" id="tb-box" name="brukernavn" /></td>
</tr>
<!--Passord  class="t-1"-->
<tr>
<td class="login-input"><div align="left" id="tb-name">Passord:</div></td>
<td><input id="tb-box" type="password" name="passord" /></td>
</tr>
</table><br>

<!--<label for="Gender">Kjønn</label>-->
<label class="radio-inline">
      <input type="radio" name="kjonnId"  value="1" checked>
      Mann </label>
      
    <label class="radio-inline">
      <input type="radio" name="kjonnId"  value="2">
      Kvinne </label>
    
    <label class="radio-inline">
      <input type="radio" name="kjonnId"  value="3">
      Ønsker ikke å oppgi </label> <p>
    
    <label class="radio-inline">
      <input type="radio" name="brukerTypeId"  value="1" checked>
      Utleier </label>
    
    <label class="radio-inline">
      <input type="radio" name="brukerTypeId"  value="2">
      Leietaker </label> <p>
     
    <label for="beskrivelse">Beskrivelse om deg selv:</label></p>
    <textarea id="beskrivelse" name="beskrivelse" rows="4" cols="50">Er du en utleier/leietaker, hva er du på utkikk etter etc...</textarea><br><br>
  
<!--Knapp  -->
<div id="st"><input type="submit" name="submit"  value="Register" class="login-button"/>

</div>
</form>



</div>
</div>
</body>
</html>

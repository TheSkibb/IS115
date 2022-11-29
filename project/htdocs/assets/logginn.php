<!DOCTYPE html>
<html lang="en">
<head>
<title>Logg inn</title>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<?php
include("../static/utforming.php");
include("../lib/godkjenning.php");

#require('../lib/sesjon.php');
?>
<div class="hoved">
<form action="" method="POST">
<?php
$remarks = isset($_GET["remark_login"]) ? $_GET["remark_login"] : '';
if ($remarks==null and $remarks=="") {
echo " <h2>Logg inn</h2> ";
}
if ($remarks=="failed") {
echo " <p> Innlogging feilet!, feil brukernavn eller passord</p> ";
}

?>

<form class="form" method="post" name="login">
    <input type="text" class="login-input" name="brukernavn" placeholder="Brukernavn" autofocus="true"/><p>
    <input type="password" class="login-input" name="passord" placeholder="Passord"/><p>
    <input type="submit" value="Logg inn" name="submit" class="login-button" />
    <p class="link"><a href="registrer.php"><br>Register deg</a></p>
</form>
</form>
</div>


</form>


</body>
</html>

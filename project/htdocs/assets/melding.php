<!DOCTYPE html>
<html>
  <head>
    <title>meldinger</title>
  <link rel="stylesheet" href="./../static/stylesMelding.css">
  <link rel="stylesheet" href="./../static/stylesNavBar.css">
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("./../lib/navbar.php");
require_once('./../lib/meldinger.php');

$user = 1;
if(!key_exists('bruker', $_GET)){
  header('Location: hjem.php');
  exit();
}
else if($_GET['bruker'] == $user){
  header('Location: hjem.php');
  exit();
}

?>

<div id="meldingContainer">
  <h1>Meldinger med Bruker</h1>
  <div id="senderDiv">avsender</div>
  <div id="receiverDiv">Deg</div>
  <div id="chatDiv">
<?php
  getMeldinger($user, $_GET['bruker']);
?>
  </div>
  <form method="post" action="./../lib/sendMelding.php">
    <input type="text" name="meldingInnhold" placeholder="...">
    <button type="submit" name="lastOppMelding">Send melding</button>
<?php
    echo '<input type=hidden value=1 name=frabruker>';
    echo '<input type=hidden value=2 name=tilbruker>';
?>
  </form>
</div>

<script>
//js for at meldingene skal starte på bunnen
  let scroll_to_bottom = document.getElementById('chatDiv');
  scroll_to_bottom.scrollTop = scroll_to_bottom.scrollHeight;
</script>

  </body>
</html>

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

session_start();
if(key_exists('userId', $_SESSION)){
  $user = $_SESSION['userId'];
}
else{
  header('Location: ../assets/logginn.php');
}

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
  <h1>Meldinger med <?php require_once('./../lib/getUserInfo.php'); getUserNameFromId($_GET['bruker']); ?></h1>
<div id="chatDiv">
<?php
  getMeldinger($user, $_GET['bruker']);
?>
  </div>
  <div>
  <form method="post" action="./../lib/sendMelding.php" id="meldingForm">
    <input type="text" name="meldingInnhold" placeholder="..." id="innholdInp">
    <button type="submit" name="lastOppMelding" id="submitBtn">Send melding</button>
  </div>
<?php
    echo '<input type=hidden value="' . $user . '" name=frabruker>';
    echo '<input type=hidden value="' . $_GET['bruker'] . '" name=tilbruker>';
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

<!DOCTYPE html>
<html lang="en">
<head>
<title>Profil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include("../static/utforming.php");
include("../lib/sesjon.php");
?>

<!--hoved siden -->
<div class="hoved" >
<script type="text/javascript">
function countdown() {
 var i = document.getElementById('timecount');
 if (parseInt(i.innerHTML)<=1) {
  location.href = 'profil.php';
 }
 i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
<?php
$id=$loggedin_id;
$sql="DELETE FROM bruker WHERE id='$id'";
$result=mysqli_query($con,$sql);
if($result){
 echo " <div align='center'>";
 echo "Din konto har blitt slettet.";
 echo " <a href='registrer.php' >Klikk her</a> for å registrere deg på nytt. ";
 echo "</div> ";
} elseif(!isset($loggedin_session) || $loggedin_session==NULL) {
 header("Location: profil.php");
} else {
 echo "Kan ikke slette kontoen din";
}
?>

</body>
</html>

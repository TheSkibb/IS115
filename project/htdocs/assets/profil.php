<!DOCTYPE html>
<html lang="en">
<head>
<title>Profil</title>
<meta charset="utf8mb4">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include("../static/utforming.php");
include("../lib/sesjon.php");

?>

<!--hoved siden -->
<div class="hoved" >
<form action="../lib/sesjon.php" method="POST">

<h1>Velkommen <?php echo $loggedin_session; ?>,</h1>
Du er nå logget inn.
<?php
$sql="SELECT * FROM bruker where id=$loggedin_id";
$result=mysqli_query($con,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
</form>
<form action="../lib/sesjon.php" method="POST"><br>
<table border="0" align="center" cellpadding="2" cellspacing="0">

<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Brukernavn:</div></td>
<td class="tl-4"><?php echo $rows['brukernavn']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Fullt navn:</div></td>
<td class="tl-4"><?php echo $rows['fornavn']; ?> <?php echo $rows['etternavn']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">E-post:</div></td>
<td class="tl-4"><?php echo $rows['epost']; ?></td>
</tr>
</table>
</form>
<br>
<div id="st"><a href="loggut.php" id="st-btn">Logg ut</a></div><br>
<div id="st"><a href="slett_konto.php" id="st-btn">Slett konto</a></div>
</div>
</div>
<?php 
// lukker while loop-en
}
?>

</body>
</html>

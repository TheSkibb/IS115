<!DOCTYPE html>
<html lang="en">
<head>
<title>Favoritter</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Utseende til søkeikonet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./../static/stylesFavoritter.css">

</head>
<body>
<!--Navigasjonsbar  -->
<?php require_once("./../lib/navbar.php");?>

<h1>Dine favoritter</h1>
  <br>
  <br>

<div id="annonser">
  <?php require_once("./../lib/getFavoritter.php")?>
</div>



</body>
</html>

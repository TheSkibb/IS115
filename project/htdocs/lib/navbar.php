<?php
echo '
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

';
?>

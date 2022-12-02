<?php
class HjemAnnonse{
  static function getAllAnnonser($filter = null, $eier=false){
    require_once('./../lib/database.inc.php');
    $sql = "
    select annonser.id, tittel, kvadrat, leie, bildelenke, boligtype.boligtype, eier
    from annonser
    left join boligtype on annonser.boligtype = boligtype.id " . 
    $filter;
    //var_dump($sql);

    $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
    try{
      $sp = $pdo->prepare($sql);
    }
    catch(PDOException $e){
      echo 'noe feil skjedde';
    }
    $sp = $pdo->prepare($sql);
    try{
      $sp->execute();
      $results = $sp->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
      echo 'noe feil har skjedd' . $e;
      exit();
    }

    if(sizeof($results) > 0){
      foreach ($results as $result) {
        self::getAnnonse(
          $result->id,
          $result->tittel,
          $result->leie,
          $result->boligtype,
          $result->bildelenke,
          $result->kvadrat
        );
        if($eier==true){
          echo '<a href="./redigerAnnonse.php';
          echo '?annonse=' . $result->id;
          echo '">Rediger Annonse</a><br>';
          echo '<a href="./../lib/slettAnnonse.php';
          echo '?annonse=' . $result->id;
          echo '" class="confirm">Slett annonse</button>';
          echo "<script>
            var links = document.getElementsByClassName('confirm');
            for (var i = 0; i < links.length; i++) {
                links[i].onclick = function() {
                    return confirm('Er du sikker på at du vil slette denne annonsen? Denne handlingen kan ikke angres.');
                };
            }
          </script>";
        }
      }
    }
    else{
      echo 'fant ingen resultater';
    }
  }
  
  static function getAnnonse($id, $tittel, $leie, $boligtype, $bilde, $kvadrat=null){
    echo '
      <a href="../assets/annonse.php?annonse=' . $id .'">
        <button class="knapp" style="font-size : 15px; width: 100%; height: 40%;">
          <h2> ' . $tittel . '</h2>
          <h5>'. $kvadrat . 'm<sup>2</sup> ' . $leie . 'kr</h5>
          ' . $boligtype . '
          <div class="bilde" style="height:200px;">
            <img src="./../images/' . $bilde . '" height="150px">
          </div >
          <br>
        </button>
      </a>
    ';
  }
}
?>

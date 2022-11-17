<?php
class HjemAnnonse{
  static function getAllAnnonser($filter = null){
    require_once('./../lib/database.inc.php');
    $sql = "select tittel, kvadrat, leie from annonser";
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
          $result->tittel,
          $result->leie,
          $result->kvadrat
        );
      }
    }
    else{
      echo 'finner ingen resultater som møter dine søkeparametre';
    }
  }
  
  static function getAnnonse($tittel, $leie, $kvadrat=null){
    echo '
      <button class="knapp" style="font-size : 15px; width: 100%; height: 40%;">
      <h2> ' . $tittel . '</h2>
      <h5>'. $kvadrat . 'm<sup>2</sup> ' . $leie . 'kr</h5>
      <div class="bilde" style="height:200px;">Tekst</div>
      <br>
      </button>
    ';
  }
}
?>

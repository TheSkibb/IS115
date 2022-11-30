<?php
class HjemAnnonse{
  static function getAllAnnonser($filter = null){
    require_once('./../lib/database.inc.php');
    $sql = "
    select annonser.id, tittel, kvadrat, leie, bildelenke, boligtype.boligtype
    from annonser
    inner join boligtype on annonser.boligtype = boligtype.id " . 
    $filter;
    //var_dump($sql);
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

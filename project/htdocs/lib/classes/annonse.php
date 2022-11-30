<?php
class Annonse {
 private $information;
  function __construct($annonseId){
    require('./../lib/database.inc.php');

    //hent alt fra annonser table
    $sql ="select *, 
    boligtype.boligtype,
    bruker.fornavn,
    bruker.etternavn
    from annonser 
    inner join boligtype on annonser.boligtype = boligtype.id
    inner join bruker on annonser.eier = bruker.id
    where annonser.id=:id";

    $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
    try{
      $sp = $pdo->prepare($sql);
    }
    catch(PDOException $e){
      echo 'noe feil skjedde';
    }

    $sp = $pdo->prepare($sql);
    $sp->bindParam(':id', $id, PDO::PARAM_INT);
    $id = $annonseId;

    try{
      $sp->execute();
      $results = $sp->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
    echo 'error' . $e;
    exit();
    }

    //var_dump($results);

    //put informasjonen fra sql query i array
    if(sizeof($results) > 0){
      $this->information = array(
        'bilde'=>"./../images/" . $results[0]->bildelenke,
        'tittel'=>$results[0]->tittel,
        'bruker' =>$results[0]->fornavn . ' ' . $results[0]->etternavn,
        'infoListe'=>array(
          self::displayInfo($results[0]->startLeie, "start leie: "),
          self::displayInfo($results[0]->sluttLeie, "slutt leie: "),
          self::displayBoolInfo($results[0]->kollektiv, "kollektiv: "),
          self::displayBoolInfo($results[0]->dyrTillatt, "dyr tillatt: "),
          self::displayBoolInfo($results[0]->roykingTillatt, "røyking tillatt: "),
          self::displayBoolInfo($results[0]->stromInkl, "strøm inkludert: "),
          self::displayBoolInfo($results[0]->internettInkl, "internett inkludert: "),
          self::displayBoolInfo($results[0]->tvInkl, "tv inkludert: "),
          self::displayBoolInfo($results[0]->moblert, "møblert: "),
          self::displayInfo($results[0]->boligtype, "boligtype: "),
          self::displayInfo($results[0]->soveromAnt, "antall soverom: "),
          self::displayInfo($results[0]->badAnt, "antall bad: "),
          self::displayInfo($results[0]->kvadrat, "kvadratmeter: ")
        ),
        'beskrivelse'=>$results[0]->beskrivelse,
        'leie'=>$results[0]->leie,
        'gate'=>$results[0]->gate,
        'postnummer'=>$results[0]->postnummer,
        'brukerId'=>$results[0]->eier
      );

      //var_dump($this->information);
    }
    else{
    }

  }

  static function displayInfo($info, $message = null){
    if($info != null){
      return $message . $info;
    }
    return null;
  }

  static function displayBoolInfo($info, $message){
   if($info != null){
      if($info == 0){
        return $message . '✓';
      }
      return $message . '𐄂';
    }
    return null;
  }

  function getImage(){
    echo $this->information['bilde'];
  }

  function getTittel(){
    echo $this->information['tittel'];
  }

  function getBruker(){
    echo $this->information['bruker'];
  }

  function getBrukerId(){
    return $this->information['brukerId'];
  }

  function getBeskrivelse(){
    echo $this->information['beskrivelse'];
  }

  function getLeie(){
    echo $this->information['leie'];
  }
  
  function getAddresse(){
    echo $this->information['gate'] . ' ' . $this->information['postnummer'];
  }

  function getInfoListe(){
    $output = "";
    foreach($this->information['infoListe'] as $info){
      if($info != null){
        $output .= "<li>" . $info . "</li>";
      }
    }
    echo $output;
  }
  function isFavorite($bruker, $annonse){
    require("../lib/database.inc.php");
    $sql = "select * from favoritter where brukerId = :brukerId and annonseId = :annonseId ";
    $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
    try{
      $sp = $pdo->prepare($sql);
    }
    catch(PDOException $e){
      echo 'noe feil skjedde';
    }

    $sp = $pdo->prepare($sql);
    $sp->bindParam(':brukerId', $brukerId, PDO::PARAM_INT);
    $sp->bindParam(':annonseId', $annonseId, PDO::PARAM_INT);
    $brukerId = $bruker;

    $annonseId = $annonse;

    try{
      $sp->execute();
      $results = $sp->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
      echo 'error' . $e;
      exit();
    }
    if(sizeof($results) > 0){
      return 1;
    }
    else{
      return 0;
    }
  }
}
?>

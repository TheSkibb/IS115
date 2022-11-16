<?php
class Annonse {
 private $information;
  function __construct($annonseId){
    require_once('./../lib/database.inc.php');

    $sql = "select * from annonser where id = :id";
    $sp = $pdo->prepare($sql);
    $sp->bindParam(':id', $id, PDO::PARAM_INT);
    $id = $annonseId;

    try{
      $sp->execute();
      $results = $sp->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
    echo '{"quotes":"null", "error":"' . $e->getMessage . '"}';
    exit();
    }
    if(sizeof($results) > 0){
      $this->information = array(
        'bilde'=>"./../images/example.jpg",
        'tittel'=>$results[0]->tittel,
        'bruker' =>$results[0]->eier,
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
        'beskrivelse'=>$results[0]->beskrivelse
      );
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

  function getBeskrivelse(){
    echo $this->information['beskrivelse'];
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
}
?>

<?php
//$receiver int, brukeren som er logget inn
//sender int, brukeren som den innloggede brukeren vil se meldingene mellom
//printer liste med meldinger mellom $receiver og $sender
function getMeldinger($receiver, $sender){
  require_once('./../lib/database.inc.php');
  $sql = 'select * from meldinger where 
  (frabruker = :sender and tilbruker = :receiver) or 
  (frabruker = :receiver and tilbruker = :sender) 
  order by dato asc';
  $sp = $pdo->prepare($sql);

  $sp->bindParam(':sender', $sender, PDO::PARAM_INT);
  $sp->bindParam(':receiver', $receiver, PDO::PARAM_INT);

  try{
    $sp->execute();
    $results = $sp->fetchAll(PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
    echo 'error' . $e;
    exit();
  }

  if(sizeof($results) > 0){
    foreach($results as $melding){
      $outputStr = '<div class="meldingDiv ';
      if($melding->tilbruker == $receiver){
        $outputStr .= 'meldingLeft">';
      }
      else{
        $outputStr .= 'meldingRight">';
      }
      $outputStr .= $melding->innhold . '</div>';
      echo $outputStr;
    }
  }
  else{
    echo 'du har ingen meldinger med denne brukeren';
  }
}

//$tilbruker int, brukeren meldingen skal sendes til
//$frabruker int, brukeren som sender meldingen (den innloggede brukeren)
//$innhold string, innholdet meldingen skal inneholde
function sendMelding($tilbruker, $frabruker, $innhold){
  require_once('./../lib/database.inc.php');
  $sql = 'insert into meldinger(
    frabruker,
    tilbruker,
    innhold
  ) values (
    :frabruker,
    :tilbruker,
    :innhold
  )';

  $sp = $pdo->prepare($sql);

  $sp->bindParam(':frabruker', $frabruker, PDO::PARAM_INT);
  $sp->bindParam(':tilbruker', $tilbruker, PDO::PARAM_INT);
  $sp->bindParam(':innhold', $innhold, PDO::PARAM_STR);

  try{
    $sp->execute();
    header('Location: ./../assets/melding.php?bruker=' . $tilbruker);
    exit();
  }
  catch(PDOException $e){
    echo 'error' . $e;
    exit();
  }

}

?>

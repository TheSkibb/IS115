<?php
//$receiver int, brukeren som er logget inn
//sender int, brukeren som den innloggede brukeren vil se meldingene mellom
//printer liste med meldinger mellom $receiver og $sender
function getMeldinger($receiver, $sender){
  require('./../lib/database.inc.php');
  $sql = 'select * from meldinger where 
  (frabruker = :sender and tilbruker = :receiver) or 
  (frabruker = :receiver and tilbruker = :sender) 
  order by dato asc';
  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }
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
//legger til en ny melding i databasen
function sendMelding($tilbruker, $frabruker, $innhold){
  require('./../lib/database.inc.php');
  $sql = 'insert into meldinger(
    frabruker,
    tilbruker,
    innhold
  ) values (
    :frabruker,
    :tilbruker,
    :innhold
  )';

  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }

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

//$userId int
//henter nyest meldingen som brukeren har sendt til de 
//brukeren har sendt meldinger med
function getUserMeldinger($userId){
  require('./../lib/database.inc.php');
  $sql = '
    select max(dato), tilbruker, frabruker, b1.fornavn as fra, b2.fornavn as til, innhold
    from meldinger
    INNER JOIN bruker as b1
    ON meldinger.frabruker = b1.id
    INNER JOIN bruker as b2
    ON meldinger.tilbruker = b2.id
    where tilbruker = :userId or frabruker = :userId
    group by frabruker, tilbruker
    order by dato asc
  ';
  //var_dump($sql);

  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }

  $sp = $pdo->prepare($sql);

  $sp->bindParam(':userId', $userId, PDO::PARAM_INT);

  try{
    $sp->execute();
    $results = $sp->fetchAll(PDO::FETCH_OBJ);
  }
  catch(PDOException $e){
    echo 'error' . $e;
    exit();
  }

  if(sizeof($results) > 0){
    $outputStr = "";
    //noen av brukerene kommer dobbelt fra queryen, dette 
    //arrayet brukes for å samle opp og sjekke om meldinger
    //med en bruker er listet opp fra før
    $brukere = array();
    foreach($results as $result){
      $andreBruker = $result->frabruker == $userId ? $result->tilbruker : $result->frabruker;
      if(!key_exists($andreBruker, $brukere)){
        $resultArray = get_object_vars($result);
        $outputStr .= '<a href="./melding.php?bruker=' . $andreBruker . '">';
        $outputStr .= '<div class="melding"><div class="meldingBruker">';
        $outputStr .= $resultArray['frabruker'] == $userId ? $resultArray['til'] : $resultArray['fra'];
        $outputStr .= '</div><div class="meldingInnhold">';
        $outputStr .= $resultArray['innhold'];
        $outputStr .= "</div></div>";
        $outputStr .= '</a>';
        $brukere[$andreBruker] = "";
      }
    }
    return $outputStr;
  }
  else{
    return "Du har ikke sendt noen meldinger";
  }

}

?>

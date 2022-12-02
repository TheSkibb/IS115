<?php
//returnerer int
//finner den høyeste id-en i databasen og legger til 1
function getUnusedId(){
  require('./../lib/database.inc.php');
  $sql = 'select max(id) from annonser';
  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }

  try{
    $sp->execute();
    $results = $sp->fetchAll(PDO::FETCH_OBJ);
  }
    catch(PDOException $e){
    echo 'error' . $e;
    exit();
  }

  if(sizeof($results) > 0){
    //var_dump($results[0]);
    //echo '<br><br>';
    return get_object_vars($results[0])["max(id)"]+ 1;
  }
  else{
    return null;
  }
}

function getBildeId($id){
  require('./../lib/database.inc.php');
  $sql = 'select bildeLenke from annonser where id = :id';
  $pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
  try{
    $sp = $pdo->prepare($sql);
  }
  catch(PDOException $e){
    echo 'noe feil skjedde';
  }

  $sp->bindParam(':id', $id, PDO::PARAM_INT);

  try{
    $sp->execute();
    $results = $sp->fetchAll(PDO::FETCH_OBJ);
  }
    catch(PDOException $e){
    echo 'error' . $e;
    exit();
  }

  if(sizeof($results) > 0){
    //var_dump($results[0]);
    //echo '<br><br>';
    return $results[0]->bildeLenke;
  }
  else{
    return null;
  }
}
?>

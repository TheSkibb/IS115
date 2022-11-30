<?php
function getUser($id){
  require('./../lib/database.inc.php');
  $sql = 'select fornavn, etternavn from bruker where id = :id';
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
    echo $results[0]->fornavn . ' ' . $results[0]->etternavn;
  }
  else{
    echo '';
  }
  
}

getUser(1);
?>

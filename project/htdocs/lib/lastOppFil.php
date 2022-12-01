<?php
  if(is_uploaded_file($_FILES['bilde']['tmp_name'])){
    $suksess = true;

    //sjekk at fil er riktig type
    $filtyper = array('jpg'=>"image/jpeg", 'png'=>"image/png");
    $filtype = $_FILES['bilde']['type'];
    if(!in_array($filtype, $filtyper)){
      echo 'kun jpg og png er tillatt <br>';
      $suksess = false;
    }
    //max størrelse er 2mb
    $maxStr = 2 * 1024 * 1024;
    $filStr = $_FILES['bilde']['size'];
    if($filStr > $maxStr){
      echo 'filen er for stor maks størrelse er ' . $maxStr . ' din fil er ' . $_FILES['bilde']['size'] . ' bytes<br>';
      $suksess = false;
    }

    
    //om ikke noe feil har skjedd så prøv å laste opp filen
    if($suksess){
      if($_FILES['bilde']['type'] == 'image/jpeg'){
        $bildeNavn = 'annonse' . $annonseId . '.jpg';
      }
      else{
        $bildeNavn = 'annonse' . $annonseId . '.png';
      }
      //move_uploaded_file returnerer en boolean som viser om flyttingen av filen var en suksess
      $opplastetFil = move_uploaded_file($_FILES['bilde']['tmp_name'], "./../images/" . $bildeNavn);

      if($opplastetFil){
        //echo 'filen din har blitt lastet opp';
      }
      else{
        echo 'noe feil sjedde, bilde har ikke blitt lastet opp';
        exit();
      }
    }
    else{
      exit();
    }
  }
?>

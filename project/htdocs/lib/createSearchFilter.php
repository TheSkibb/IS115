<?php
//searchfilter variablen brukes i hjemannonser for å filtrere
//hvilke annonser man får opp
//starter som where true=true, fordi da vil alltid andre starte
//med "and"
$searchFilter = "where true=true";

//add filters based on what is sent in filterForm
if($_REQUEST["minPris"] != ""){
  $searchFilter .= " and leie > " . $_REQUEST['minPris'];
}

if($_REQUEST["maksPris"] != ""){
  $searchFilter .= " and leie < " . $_REQUEST["maksPris"];
}

if($_REQUEST["startLeie"] != ""){
  $searchFilter .= " and startLeie > '" . $_REQUEST['startLeie'] . "'";
}

if($_REQUEST["sluttLeie"]){
  $searchFilter .= " and sluttLeie < '" . $_REQUEST['sluttLeie'] . "'";
}

if($_REQUEST["minSize"]){
  $searchFilter .= " and kvadrat > " . $_REQUEST['minSize'];
}

if($_REQUEST["maxSize"]){
  $searchFilter .= " and kvadrat < " . $_REQUEST['maxSize'];
}

if(key_exists('enebolig', $_REQUEST)){
  echo 'test';
}

$boligtyper = array(
  "enebolig",
  "garasjeparkering",
  "hybel",
  "leilighet",
  "rekkehus",
  "bofelleskap",
  "tomannsbolig");

foreach($boligtyper as $boligtype){
  if(!key_exists($boligtype, $_REQUEST)){
    $searchFilter .= " and annonser.boligtype != (
      select id from boligtype where boligtype='" . $boligtype . "')";
  }
}

$preferanser = array(
  "kollektiv",
  "dyrTillatt",
  "roykingTillatt",
  "stromInkl",
  "internettInkl",
  "tvInkl",
  "moblert",
  "filterSok");

foreach($preferanser as $preferanse){
  if(!key_exists($preferanse, $_REQUEST)){
    $searchFilter .= " and annonser." . $preferanse . " is false";
  }
}
?>


<?php
//searchfilter variablen brukes i hjemannonser for å filtrere
//hvilke annonser man får opp
//starter som where true=true, fordi da vil alltid andre starte
//med "and"
$searchFilter = "where true=true";

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

?>

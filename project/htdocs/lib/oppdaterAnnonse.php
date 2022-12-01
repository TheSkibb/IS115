<?php
//if post request is sent

require("./../lib/database.inc.php");
//var_dump($_REQUEST);

$sql = "
update annonser set
  gate = :addresse,
  postnummer = :postnummer,
  leie = :leie,
  depositum = :depositum,
  tittel = :tittel,
  beskrivelse = :beskrivelse,
  startLeie = :startLeie,
  sluttLeie = :sluttLeie,
  kollektiv = :kollektiv,
  dyrTillatt = :dyrTillatt,
  roykingTillatt = :roykingTillatt,
  stromInkl = :stromInkl,
  internettInkl = :internettInkl,
  tvInkl = :tvInkl,
  moblert = :moblert,
  boligtype = :boligtype,
  soveromAnt = :soveromAnt,
  badAnt = :badAnt,
  kvadrat = :kvadrat,
  bildelenke = :bildelenke
where id = :id
";

$pdo = new PDO($dkn, $DB_BRUKER, $DB_PASS);
try{
  $sp = $pdo->prepare($sql);
}
catch(PDOException $e){
  echo 'noe feil skjedde';
}

$sp = $pdo->prepare($sql);

//TODO: put back actual eier
$brukerTemp = 5;
$sp->bindParam(':addresse', $addresse, PDO::PARAM_STR);
$sp->bindParam(':postnummer', $postnummer, PDO::PARAM_STR);
$sp->bindParam(':leie', $leie, PDO::PARAM_INT);
$sp->bindParam(':depositum', $depositum, PDO::PARAM_INT);
$sp->bindParam(':tittel', $tittel, PDO::PARAM_STR);
$sp->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
$sp->bindParam(':startLeie', $startLeie, PDO::PARAM_STR);
$sp->bindParam(':sluttLeie', $sluttLeie, PDO::PARAM_STR);
$sp->bindParam(':kollektiv', $kollektiv, PDO::PARAM_BOOL);
$sp->bindParam(':dyrTillatt', $dyrTillatt, PDO::PARAM_BOOL);
$sp->bindParam(':roykingTillatt', $roykingTillatt, PDO::PARAM_BOOL);
$sp->bindParam(':stromInkl', $stromInkl, PDO::PARAM_BOOL);
$sp->bindParam(':internettInkl', $internettInkl, PDO::PARAM_BOOL);
$sp->bindParam(':tvInkl', $tvInkl, PDO::PARAM_BOOL);
$sp->bindParam(':moblert', $moblert, PDO::PARAM_BOOL);
$sp->bindParam(':boligtype', $boligtype, PDO::PARAM_INT);
$sp->bindParam(':soveromAnt', $soveromAnt, PDO::PARAM_INT);
$sp->bindParam(':badAnt', $badAnt, PDO::PARAM_INT);
$sp->bindParam(':kvadrat', $kvadrat, PDO::PARAM_INT);
$sp->bindParam(':bildelenke', $bildelenke, PDO::PARAM_STR);
$sp->bindParam(':id', $annonseId, PDO::PARAM_INT);

//var_dump($sp);

$addresse = $_REQUEST['Gate'];
$postnummer = $_REQUEST['Postnummer'];
$leie = $_REQUEST['Leie'];
$depositum = $_REQUEST['Depositum'];
$tittel = $_REQUEST['Tittel'];
$beskrivelse = $_REQUEST['Beskrivelse'];

if($_REQUEST['startLeie'] != ""){
  $startLeie = $_REQUEST['startLeie'];
}
else{
  $startLeie = null;
}

if($_REQUEST['sluttLeie'] != ""){
  $sluttLeie = $_REQUEST['sluttLeie'];
}
else{
  $sluttLeie = null;
}

if(key_exists('kollektiv', $_REQUEST)){
  $kollektiv = $_REQUEST['kollektiv'];
}
else{
  $kollektiv = null;
}

if(key_exists('dyrTillatt', $_REQUEST)){
  $dyrTillatt = $_REQUEST['dyrTillatt'];
}

else{
  $dyrTillatt = null;
}

if(key_exists('roykingTillatt', $_REQUEST)){
  $roykingTillatt = $_REQUEST['roykingTillatt'];
}
else{
  $roykingTillatt = null;
}

if(key_exists('stromInkl', $_REQUEST)){
  $stromInkl = $_REQUEST['stromInkl'];
}
else{
  $stromInkl = null;
}

if(key_exists('internettInkl', $_REQUEST)){
  $internettInkl = $_REQUEST['internettInkl'];
}
else{
  $internettInkl = null;
}

if(key_exists('tvInkl', $_REQUEST)){
  $tvInkl = $_REQUEST['tvInkl'];
}
else{
  $tvInkl = null;
}

if(key_exists('moblert', $_REQUEST)){
  $moblert = $_REQUEST['moblert'];
}
else{
  $moblert = null;
}

if(key_exists('boligtype', $_REQUEST)){
  $boligtype = $_REQUEST['boligtype'];
}
else{
  $boligtype = null;
}

if(key_exists('$_REQUEST', $_REQUEST)){
  $soveromAnt = $_REQUEST['soveromAnt'];
}
else{
  $soveromAnt = null;
}

if(key_exists('badAnt', $_REQUEST)){
  $badAnt = $_REQUEST['badAnt'];
}
else{
  $badAnt = null;
}

if(key_exists('kvadrat', $_REQUEST)){
  $kvadrat = $_REQUEST['kvadrat'];
}
else{
  $kvadrat = null;
}

if($bildeNavn != ""){
  $bildelenke = $bildeNavn;
}
else{
  $bildelenke = null;
}

try{
  $sp->execute();
  $results = $sp->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
echo 'error' . $e;
exit();
}

echo '
<script>
alert("Din annonse er blitt lastet opp")
</script>
';
?>

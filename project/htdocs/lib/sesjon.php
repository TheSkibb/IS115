<?php
include("database.php");
if(!isset($_SESSION["brukernavn"])) {
} else

// Sjekk tilkoblingen
#if (mysqli_connect_errno()){
   # echo "Kunne ikke koble til MySQL: " . mysqli_connect_error();
#}
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"select brukernavn, id from bruker where brukernavn='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['brukernavn'];
$loggedin_id=$row['id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
echo "Go back";
header("Location: ../assets/logginn.php"); #logginn.php
} else


?>


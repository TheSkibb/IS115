<?php

// Sjekk tilkoblingen
if (mysqli_connect_errno()){
    echo "Kunne ikke koble til MySQL: " . mysqli_connect_error();
}
    session_start();
 
      if (isset($_REQUEST["brukernavn"])) {
        $fornavn    = stripslashes($_REQUEST["fornavn"]);
        $fornavn    = mysqli_real_escape_string($con, $fornavn);

        $etternavn    = stripslashes($_REQUEST["fornavn"]);
        $etternavn    = mysqli_real_escape_string($con, $etternavn);

        $brukernavn = stripslashes($_REQUEST["brukernavn"]);
        $brukernavn = mysqli_real_escape_string($con, $brukernavn);

        $epost    = stripslashes($_REQUEST["epost"]);
        $epost    = mysqli_real_escape_string($con, $epost);

        $kjonnId    = stripslashes($_REQUEST["kjonnId"]);
        $kjonnId    = mysqli_real_escape_string($con, $kjonnId);

        $passord = stripslashes($_REQUEST["passord"]);
        $passord = mysqli_real_escape_string($con, $passord);

        $beskrivelse = stripslashes($_REQUEST["beskrivelse"]);
        $beskrivelse = mysqli_real_escape_string($con, $beskrivelse);

        $brukerTypeId = stripslashes($_REQUEST["brukerTypeId"]);
        $brukerTypeId = mysqli_real_escape_string($con, $brukerTypeId);

        $query    = "INSERT into `bruker` (fornavn, etternavn, brukernavn, passord, epost, kjonnId, beskrivelse, brukerTypeId)
                     VALUES ('$fornavn', '$etternavn', '$brukernavn', '" . md5($passord) . "', '$epost', '$kjonnId', '$beskrivelse', '$brukerTypeId')";
        $result   = mysqli_query($con, $query);
    } else 

    #session_start();
   # $user_check=$_SESSION['brukernavn'];
   # $ses_sql=mysqli_query($con,"select brukernavn, id from bruker where brukernavn='$user_check'");
   # $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   # $loggedin_session=$row['brukernavn'];
   # $loggedin_id=$row['id'];
   # if(!isset($loggedin_session) || $loggedin_session==NULL) {
   #  echo "Go back";
   #  header("Location: ../assets/logginn.php");
   # }

include('database.php');
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"select brukernavn, id from bruker where brukernavn='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['brukernavn'];
$loggedin_id=$row['id'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
	echo "Go back";
	header("Location: ../assets/logginn.php");
}
?>
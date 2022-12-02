<!DOCTYPE html>
<head>
<meta charset="utf8mb4" >
<?php      
   #$host = "localhost";  
  # $bruker = "root";  
  # $passord = "";  
  # $db_navn = "prosjekt";  
      
   # $con = mysqli_connect($host, $bruker, $passord, $db_navn);  
  #  if(mysqli_connect_errno()) {  
  #      die("Kunne ikke koble til MySQL:  ". mysqli_connect_error());   }  
   // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    //$con = mysqli_connect("localhost","root","","prosjekt");
    // Check connection
  # if (mysqli_connect_errno()){
 #   echo "Kunne ikke koble til MySQL: " . mysqli_connect_error();
 #  }

 #forbindelse logginn
#session_start();
#include('sesjon.php');
#$brukernavn=$_POST['brukernavn'];
#$result = mysqli_query($con,"SELECT * FROM bruker WHERE brukernavn='$brukernavn'");
#$num_rows = mysqli_num_rows($result);
##header("location: ../assets/logginn.php?remarks=failed"); 
#}else {
# $fornavn=$_POST['fornavn'];
 #$etternavn=$_POST['etternavn'];
 #$epost=$_POST['epost'];
 #$brukernavn=$_POST['brukernavn'];
 #$passord=$_POST['passord'];
 #if(mysqli_query($con,"INSERT INTO bruker(fornavn, etternavn, epost ,brukernavn, passord)VALUES('$fornavn', '$etternavn','$epost', '$brukernavn', '$passord')")){ 
 #header("location: ../assets/logginn.php?remarks=success");
 #}else{
  #$e=mysqli_error($con);
 #header("location: ../assets/logginn.php?remarks=error&value=$e");  
 #}
#}

#if($_SERVER["REQUEST_METHOD"] == "POST") {
 # $brukernavn=mysqli_real_escape_string($con,$_POST['brukernavn']);
  #$passord=mysqli_real_escape_string($con,$_POST['passord']);
  #$result = mysqli_query($con,"SELECT * FROM bruker");
  #$c_rows = mysqli_num_rows($result);
  #if ($c_rows!=$brukernavn) {
   #header("location: ../assets/logginn.php?remark_login=failed");
  #}
  #$sql="SELECT id FROM bruker WHERE brukernavn='$brukernavn' and passord='$passord'";
  #$result=mysqli_query($con,$sql);
  #$row=mysqli_fetch_array($result);
  #$active=$row['active'];
  #$count=mysqli_num_rows($result);
  #if($count==1) {
  # $_SESSION['id']=$brukernavn;
   #header("location: ../assets/profil.php");
  #}
 #}

session_start();
include('database.php');
$brukernavn=$_POST['brukernavn'];
$result = mysqli_query($con,"SELECT * FROM bruker WHERE brukernavn='$brukernavn'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 header("location: ../assets/logginn.php?remarks=failed"); 
}else {
 $fornavn=$_POST['fornavn'];
 $etternavn=$_POST['etternavn'];
 $epost=$_POST['epost'];
 $brukernavn=$_POST['brukernavn'];
 $passord=password_hash($_POST['passord'], PASSWORD_DEFAULT);

 #$hash_passord = password_hash($passord, PASSWORD_DEFAULT);
 #$passord = password_verify($passord, $hash_passord);

 $kjonnId=$_POST['kjonnId'];
 $beskrivelse=$_POST['beskrivelse'];
 $brukerTypeId=$_POST['brukerTypeId'];
 if(mysqli_query($con,"INSERT INTO `bruker`(fornavn, etternavn, epost,brukernavn, passord, kjonnId, beskrivelse, brukerTypeId)
 VALUES('$fornavn', '$etternavn','$epost', '$brukernavn', '$passord', '$kjonnId', '$beskrivelse', '$brukerTypeId')")){ 
	header("location: ../assets/logginn.php?remarks=success");
 }else{
	 $e=mysqli_error($con);
	header("location: ../assets/logginn.php?remarks=error&value=$e");	 
 }
}

#BASE64_ENCODE
?>  
</head>
</html>

  <?php 
session_start();
include("../lib/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$brukernavn=mysqli_real_escape_string($con,$_POST['brukernavn']);
	$passord=mysqli_real_escape_string($con,$_POST['passord']);
	
	$sql="SELECT passord FROM bruker WHERE brukernavn='$brukernavn' LIMIT 1";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	#$active=$row['active'];
	$count=mysqli_num_rows($result);
	$passord_hash = $row['passord'];
	if (password_verify($passord, $passord_hash)) {
		header("location: ../assets/profil.php");
	} else {
		header('location: ../assets/logginn.php?remarks=failed');
		echo "<p>Feil passord eller brukernavn </p>";
	}
	if($count==1) {
	#$_SESSION['brukernavn']=$brukernavn;
    #$_SESSION['userId']=$row["id"];
		#header("location: ../assets/profil.php");
	}
}

?>
    
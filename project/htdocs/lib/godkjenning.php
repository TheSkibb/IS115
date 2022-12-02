<!--
<!DOCTYPE html>
<html lang="en">
<head>
<title>Godkjenning logg inn</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
#include("../static/utforming.php");
include("../lib/database.php");
#include("forbindelse.php");

#require('../lib/sesjon.php');  password_verify($password, $hashed_password)
?>

<div class="hoved" >
  
<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$brukernavn=mysqli_real_escape_string($con,$_POST['brukernavn']);
	$passord=mysqli_real_escape_string($con,$_POST['passord']);
	$result = mysqli_query($con,"SELECT * FROM bruker");
	$c_rows = mysqli_num_rows($result);

	$hash_passord = password_hash($passord, PASSWORD_DEFAULT);
	$passord = password_verify($passord, $hash_passord);


	if ($c_rows!=$brukernavn) {
		header("location: ../assets/logginn.php?remark_login=failed");
	}
	$sql="SELECT id FROM bruker WHERE brukernavn='$brukernavn' and passord='$passord'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$active=$row['active'];
	$count=mysqli_num_rows($result);
	if($count==1) {
		$_SESSION['login_user']=$brukernavn;
    $_SESSION['userId']=$row["id"];
		header("location: ../assets/profil.php");
	}
}

?>
    

</div>
</body>
</html>
-->
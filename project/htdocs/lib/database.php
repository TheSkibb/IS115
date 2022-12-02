<?php 
#$host = "localhost";  
#$bruker = "root";  
#$passord = "";  
#$db_navn = "prosjekt"; 

#$con = mysqli_connect($host, $bruker, $passord, $db_navn);
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "prosjekt";
$errors = array();

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

#$con = mysqli_connect("localhost","root","","prosjekt");
?>

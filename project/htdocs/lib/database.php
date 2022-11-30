<?php 
#$host = "localhost";  
#$bruker = "root";  
#$passord = "";  
#$db_navn = "prosjekt"; 

#$con = mysqli_connect($host, $bruker, $passord, $db_navn);
$mysql_hostname = "172.17.0.2";
$mysql_user = "php";
$mysql_password = "123";
$mysql_database = "project";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

#$con = mysqli_connect("localhost","root","","prosjekt");
?>

<?php      
    $host = "localhost";  
    $bruker = "root";  
    $passord = "";  
    $db_navn = "prosjekt";  
      
    $con = mysqli_connect($host, $bruker, $passord, $db_navn);  
    if(mysqli_connect_errno()) {  
        die("Kunne ikke koble til MySQL:  ". mysqli_connect_error());  
    }  
?>  
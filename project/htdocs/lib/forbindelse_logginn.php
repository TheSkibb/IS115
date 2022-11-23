<?php      
   # $host = "localhost";  
   # $bruker = "root";  
   # $passord = "";  
   # $db_navn = "prosjekt";  
      
   # $con = mysqli_connect($host, $bruker, $passord, $db_navn);  
  #  if(mysqli_connect_errno()) {  
  #      die("Kunne ikke koble til MySQL:  ". mysqli_connect_error());   }  
   // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","LoginSystem");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>  
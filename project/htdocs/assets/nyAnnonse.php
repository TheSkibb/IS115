<!DOCTYPE html>
<html>
  <head>
    <title>Ny annonse</title>
  </head>
  <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
if(key_exists('userId', $_SESSION)){
}
else{
  header('Location: ./logginn.php');
}
?>
  </body>
</html>

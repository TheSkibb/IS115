<?php
    session_start();
    #include("forbindelse_logginn.php");
   # if(!isset($_SESSION["username"])) {
      #  header("Location: ../assets/logginn.php");
      #  exit();
      if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $kjonn    = stripslashes($_REQUEST['kjonn']);
        $kjonn    = mysqli_real_escape_string($con, $kjonn);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime, kjonn)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', '$kjonn')";
        $result   = mysqli_query($con, $query);
    } else 

?>
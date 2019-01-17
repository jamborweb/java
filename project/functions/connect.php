<?php
  $servername = "localhost";
  $username = "root";
  $userpassword = "";
  $dbname = "jscore";

  $connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");
  
  if($connection->connect_error){
    die("Błąd połączenia z bazą danych! " . $connection->connect_error);
  }

mysqli_set_charset($connection,"utf8");

?>
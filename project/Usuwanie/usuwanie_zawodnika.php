<?php
    $servername = "localhost";
    $username = "root";
    $userpassword = "";
    $dbname = "jscore";

$connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");

  if($connection->connect_error){
    die("Błąd połączenia z bazą danych! " . $connection->connect_error);
  }
    else{
        $playerId = $_GET['playerId'];
        $sql = "DELETE FROM zawodnicy WHERE id_zawodnicy=$playerId";
        $result = $connection->query($sql);
        header("Location: ../adminzawodnicy.php");  
    }
                          
?>
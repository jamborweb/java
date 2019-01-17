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
        $id_klubu = $_GET['clubId'];
        $sql = "DELETE FROM kluby WHERE id_kluby=$id_klubu";
        $result = $connection->query($sql);
        header("Location: ../adminkluby.php");  
    }
                          
?>
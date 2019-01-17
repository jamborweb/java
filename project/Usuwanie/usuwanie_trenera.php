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
        $coachId = $_GET['coachId'];
        $sql = "DELETE FROM trenerzy WHERE id_trenerzy=$coachId";
        $result = $connection->query($sql);
        header("Location: ../admintrenerzy.php");  
    }
                          
?>
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
        $stadionId = $_GET['stadionId'];
        $sql = "DELETE FROM stadiony WHERE id_stadiony=$stadionId";
        $result = $connection->query($sql);
        header("Location: ../adminstadiony.php");  
    }
                          
?>
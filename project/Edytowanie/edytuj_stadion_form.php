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
      if(isset($_POST['edytujbutton']))
      {
        $stadionId = $_POST['idStadionedit'];
        $stadionName = $_POST['stadionNameedit']; 
        $stadionCapacity = $_POST['stadionCapacityedit'];
        $clubId = $_POST['editStadionId'];
          
        $updatesql=sprintf("UPDATE stadiony SET id_stadiony='%s', nazwa_stadionu='%s', ilosc_miejsc='%s', id_klub='%s'
        WHERE id_stadiony='$stadionId'",
        mysqli_real_escape_string($connection,$stadionId),
        mysqli_real_escape_string($connection,$stadionName),
        mysqli_real_escape_string($connection,$stadionCapacity),
        mysqli_real_escape_string($connection,$clubId));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($updatesql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminstadiony.php");
  ?>


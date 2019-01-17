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
      if(isset($_POST['dodajstadionbutton']))
      {
        $stadionName = $_POST['stadionNameedit'];
        $stadionCapcity = $_POST['stadionCapacityedit'];
        $stadionClubName = $_POST['stadionClubedit'];
        
          
        $insertsql=sprintf("INSERT INTO stadiony (id_stadiony, nazwa_stadionu, ilosc_miejsc, id_klub) VALUES (NULL, '%s','%s','%s')",
        mysqli_real_escape_string($connection,$stadionName),
        mysqli_real_escape_string($connection,$stadionCapcity),
        mysqli_real_escape_string($connection,$stadionClubName));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($insertsql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminstadiony.php");
  ?>


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
      if(isset($_POST['dodajtrenerabutton']))
      {
        $coachFirstName = $_POST['coachFirstNameedit'];
        $coachLastName = $_POST['coachLastNameedit'];
        
          
        $insertsql=sprintf("INSERT INTO trenerzy (id_trenerzy, trener_imie, trener_nazwisko) VALUES (NULL, '%s','%s')",
        mysqli_real_escape_string($connection,$coachFirstName),
        mysqli_real_escape_string($connection,$coachLastName));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($insertsql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../admintrenerzy.php");
  ?>


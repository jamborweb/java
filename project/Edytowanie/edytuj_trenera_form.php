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
        $coachId = $_POST['idCoachedit'];
        $coachFirstName = $_POST['coachFirstNameedit']; 
        $coachLastName = $_POST['coachLastNameedit'];
          
        $updatesql=sprintf("UPDATE trenerzy SET id_trenerzy='%s', trener_imie='%s', trener_nazwisko='%s' WHERE id_trenerzy='$coachId'",
        mysqli_real_escape_string($connection,$coachId),
        mysqli_real_escape_string($connection,$coachFirstName),
        mysqli_real_escape_string($connection,$coachLastName));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($updatesql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../admintrenerzy.php");
  ?>


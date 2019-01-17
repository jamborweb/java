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
      if(isset($_POST['dodajzawodnikabutton']))
      {
        $playerId = $_POST['idPlayeredit'];
        $playerName = $_POST['playerNameedit'];
        $playerLastName = $_POST['playerLastNameedit'];
        $playerCountry = $_POST['playerCountryedit'];
        $playerBorn = $_POST['playerBornedit'];
        $playerStature = $_POST['playerStatureedit'];
        $playerWeight = $_POST['playerWeightedit'];
        $playerNumber = $_POST['playerNumberedit'];
        $clubId = $_POST['idClubedit'];
        $sezonId = $_POST['idSezonedit'];
        
          
        $insertsql=sprintf("INSERT INTO zawodnicy (id_zawodnicy, imie, nazwisko, kraj, data_urodzenia, wzrost, waga, nr_koszulki, Kluby_id_kluby, Sezony_id_sezony) VALUES (NULL, '%s','%s','%s','%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($connection,$playerName),
        mysqli_real_escape_string($connection,$playerLastName),
        mysqli_real_escape_string($connection,$playerCountry),
        mysqli_real_escape_string($connection,$playerBorn),
        mysqli_real_escape_string($connection,$playerStature),
        mysqli_real_escape_string($connection,$playerWeight),
        mysqli_real_escape_string($connection,$playerNumber),
        mysqli_real_escape_string($connection,$clubId),
        mysqli_real_escape_string($connection,$sezonId));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($insertsql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminzawodnicy.php");
  ?>


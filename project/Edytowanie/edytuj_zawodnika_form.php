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
          
        $updatesql=sprintf("UPDATE zawodnicy SET id_zawodnicy='%s', imie='%s', nazwisko='%s', kraj='%s', data_urodzenia='%s', wzrost='%s', waga='%s', nr_koszulki='%s', Kluby_id_kluby='%s', Sezony_id_sezony='%s' WHERE id_zawodnicy='$playerId'",
        mysqli_real_escape_string($connection,$playerId),
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
        $result = $connection->query($updatesql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminzawodnicy.php");
  ?>


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
      if(isset($_POST['dodajklubbutton']))
      {
        $clubId = $_POST['idClubedit'];
        $clubName = $_POST['clubNameedit']; 
        $clubAddress = $_POST['clubAddressedit'];
        $clubAddressCode = $_POST['clubAddressCodeedit'];
        $clubProvince = $_POST['clubProvinceedit'];
        $clubColors = $_POST['clubColorsedit'];
        $clubCreateDate = $_POST['clubCreateDateedit'];
        $clubImg = $_POST['clubImgedit'];
          
        $insertsql=sprintf("INSERT INTO kluby (id_kluby, nazwa, adres, kod_pocztowy, wojewodztwo, barwy, data_powstania, herb_img) VALUES (NULL, '%s','%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($connection,$clubName),
        mysqli_real_escape_string($connection,$clubAddress),
        mysqli_real_escape_string($connection,$clubAddressCode),
        mysqli_real_escape_string($connection,$clubProvince),
        mysqli_real_escape_string($connection,$clubColors),
        mysqli_real_escape_string($connection,$clubCreateDate),
        mysqli_real_escape_string($connection,$clubImg));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($insertsql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminkluby.php");
  ?>


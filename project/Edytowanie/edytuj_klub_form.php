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
        $clubId = $_POST['idClubedit'];
        $clubName = $_POST['clubNameedit']; 
        $clubAddress = $_POST['clubAddressedit'];
        $clubAddressCode = $_POST['clubAddressCodeedit'];
        $clubProvince = $_POST['clubProvinceedit'];
        $clubColors = $_POST['clubColorsedit'];
        $clubCreateDate = $_POST['clubCreateDateedit'];
        $clubImg = $_POST['clubImgedit'];
          
        $updatesql=sprintf("UPDATE kluby SET id_kluby='%s', nazwa='%s', adres='%s', kod_pocztowy='%s', wojewodztwo='%s', barwy='%s', data_powstania='%s', herb_img='%s'
        WHERE id_kluby='$clubId'",
        mysqli_real_escape_string($connection,$clubId),
        mysqli_real_escape_string($connection,$clubName),
        mysqli_real_escape_string($connection,$clubAddress),
        mysqli_real_escape_string($connection,$clubAddressCode),
        mysqli_real_escape_string($connection,$clubProvince),
        mysqli_real_escape_string($connection,$clubColors),
        mysqli_real_escape_string($connection,$clubCreateDate),
        mysqli_real_escape_string($connection,$clubImg));
        mysqli_set_charset($connection,"utf8");
        $result = $connection->query($updatesql);
      } 
    }
    if ($connection->connect_errno!=1){
      $connection->close();
    }
  header("Location: ../adminkluby.php");
  ?>


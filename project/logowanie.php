 <?php

    if(isset($_SESSION['isLogin'])){
      header('Location: index.php');
      exit();
    }
    require_once('functions/connect.php');
  ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jScore - Baza rozgrywek</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container container-logowanie">
    <div class="row row-logowanie text-center">
       <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
        Logowanie
    </div>
  
    <div class="row login-form text-center">
        <form action="logowanie.php" method="post">
         <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login: 
        <input type="text" name="username" required/> <br/>
         <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Hasło:
        <input type="password" name="password" required/> <br/>
        <button type="submit" name="submit" class="zaloguj_btn">Zaloguj się</button>
        <hr>
        </form>
    </div>
</div>
<?php include('includes/footer.php'); ?>  
    
<?php
    if(isset($_POST['submit'])){
      $connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");

      if($connection->connect_error){
        die("Błąd połączenia z bazą danych! " . $connection->connect_error);
      }

      $userLogin = $_POST['username'];
      $userPassword = $_POST['password'];
      $login = htmlentities($userLogin, ENT_QUOTES, "UTF-8");
      $password = htmlentities($userPassword, ENT_QUOTES, "UTF-8");

      $sql = "SELECT * FROM users WHERE userLogin = $userLogin AND userHaslo = $userPassword";

      if($result = $connection->query(sprintf("SELECT * FROM users WHERE userLogin='$userLogin'
          AND userHaslo='$userPassword'",
          mysqli_real_escape_string($connection, $userLogin),
          mysqli_real_escape_string($connection, $userPassword)))){

            $howManyUsers = $result->num_rows;

            if($howManyUsers > 0){
              $_SESSION['isLogin'] = true;

              $row = $result->fetch_assoc();
              $_SESSION['userId'] = $row['userId'];
              $_SESSION['userLogin'] = $row['userLogin'];

              $result->close();
              header('Location: admin.php');
            }
          } 
          echo "<script>alert('Błąd logowania, sprawdź hasło oraz login!')</script>";
          echo "<script>window.open('logowanie.php', '_self')</script>";
          $connection->close();
            
    }
  ?>
    
</body>
</html>
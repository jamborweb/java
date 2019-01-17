<?php
  session_start();
  if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
  {
    header('Location: logowanie.php');
  }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jScore - Baza rozgrywek</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <?php
    require_once('functions/connect.php');
?>
<?php include('includes/header.php'); ?>

<div class="container container-main">
<div class="row row-logowanie text-center row-admins">
       <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        <a href="adminkluby.php">KLUBY</a>
    </div>
<div class="row row-logowanie text-center row-admins">
       <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        <a href="adminstadiony.php">STADIONY</a>
    </div>
<div class="row row-logowanie text-center row-admins">
       <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        <a href="admintrenerzy.php">TRENERZY</a>
    </div>
<div class="row row-logowanie text-center row-admins">
       <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        <a href="adminzawodnicy.php">ZAWODNICY</a>
    </div>
<!--
<div class="row row-logowanie text-center row-admins">
       <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
        <a href="adminmecze.php">MECZE</a>
    </div
-->
</div>
    
    


            
<?php include('includes/footer.php'); ?>  
</body>
</html>


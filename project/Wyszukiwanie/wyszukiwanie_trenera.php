<?php session_start(); ?>
<?php
    require_once('../functions/connect.php');
    mysqli_set_charset($connection,"utf8");
     if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: ../logowanie.php');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jScore - Baza rozgrywek</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/custom.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>  
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Nawigacja</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-brand-custom" href="../index.php">jScore - Baza rozgrywek piłkarskich</a>
    </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.php">Strona główna</a></li>
        <li><a href="../kontakt.php">Kontakt</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
             <?php
            if(isset($_SESSION['isLogin'])){
              echo "<li><a href='../admin.php'>Panel admina</a></li>";
              echo "<li class='active'><a href='../logout.php'>Wyloguj <b>[ ".$_SESSION["userLogin"]." ]</b>"."</a></li>";
            } else echo '<li class="active"><a href="logowanie.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Logowanie</a></li>';
          ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>

<div class="container-fluid">
    <div class="row">
        <img src="../img/header.jpg" class="img-responsive"/>
    </div>
</div>
</header>
    
<body>
<div class="container container-main">
    <div class="row row-logowanie text-center">Wyszukiwanie rekordu</div>
    <div class="row row-form">
    <?php
        echo "<form action='wyszukaj_trenera_form.php' method='post'>";
                    echo "<table>";
                    echo "<tr><td>Imie trenera: </td><td><textarea name='coachFirstNameedit' required></textarea></td></tr>";
                    echo "<tr><td>Nazwisko trenera: </td><td><textarea name='coachLastNameedit' required></textarea></td></tr>";
                    echo "</table>";
                    echo "<br>";
                    echo "<tr><td><button name='wyszukajbutton' class='btn btn-info'>Wyszukaj trenera</button></td></tr>
                    <tr><td><a href='../admintrenerzy.php' class='btn btn-danger' role='button'>Wstecz</a></td></tr>";
        echo "</form>";
?>
    </div>
</div>
    
    


            
<?php include('../includes/footer.php'); ?>  
</body>
</html>


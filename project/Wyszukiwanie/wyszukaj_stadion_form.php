<?php session_start(); ?>
<?php
    require_once('../functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    if(isset($_POST['wyszukajbutton']))
    {
      $stadionName = $_POST['stadionNameedit'];
    }
    $getStadions = "SELECT * FROM stadiony 
    LEFT JOIN kluby ON kluby.id_kluby = stadiony.id_klub
    WHERE nazwa_stadionu LIKE '$stadionName%'";
    $result = $connection->query($getStadions);
    
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
    <div class="row row-logowanie text-center">Wyszukany rekord</div>
    <div class="row">
         <a href='../adminstadiony.php' class='btn btn-success btn-wstecz' role='button'>Wstecz</a>
            <div class="clubs-table-admins">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nazwa stadionu</th>
                            <th>Pojemność stadionu</th>
                            <th>Klub</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                    </thead>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $stadionId = $row['id_stadiony'];
        $stadionName = $row['nazwa_stadionu']; 
        $stadionCapacity = $row['ilosc_miejsc'];
        $clubId = $row['id_kluby'];
        $clubName = $row['nazwa']; 
        $clubLink = "<a href='kluby_detale.php?clubId=$clubId'>$clubName</a>";
        echo "<tr>";
        echo "<td>$stadionName</td>";
        echo "<td>$stadionCapacity</td>";
        echo "<td>$clubLink</td>";
        echo "<td><a href='../Edytowanie/edytowanie_stadionu.php?stadionId=$stadionId' class='btn btn-info' role='button'>Edytuj</a></td>";
        echo "<td><a href='../Usuwanie/usuwanie_stadionu.php?stadionId=$stadionId' class='btn btn-danger' role='button'>Usuń</a></td>";
        echo "</tr>";
    }
} else {
    echo "<p><b>BRAK TAKIEGO KLUBU W BAZIE!</b></p>";
}
$connection->close();
?>
                </table>
        </div>
    </div>     
</div>
    
    


            
<?php include('../includes/footer.php'); ?>  
</body>
</html>


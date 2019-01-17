
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
<?php
    $playerId = $_GET['playerId'];
    $getPlayers = "SELECT id_zawodnicy, imie, nazwisko, kraj, data_urodzenia, wzrost, waga, nr_koszulki, id_kluby, nazwa, herb_img FROM zawodnicy 
    LEFT JOIN kluby ON kluby.id_kluby = zawodnicy.Kluby_id_kluby
    WHERE id_zawodnicy = $playerId";
    $result = $connection->query($getPlayers);  
    
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $playerId = $row['id_zawodnicy'];
        $playerName = $row['imie'];
        $playerLastName = $row['nazwisko'];
        $playerCountry = $row['kraj'];
        $playerBorn = $row['data_urodzenia'];
        $playerStature = $row['wzrost'];
        $playerWeight = $row['waga'];
        $playerNumber = $row['nr_koszulki'];
        $clubId = $row['id_kluby'];
        $clubName = $row['nazwa'];
        $clubImg = $row['herb_img'];
        //$coachName = $row['trener_imie'];
        //$coachLastName = $row['trener_nazwisko'];
        /*breadcrumbs*/
        echo "<ol class='breadcrumb'>";
        echo "<li><a href='./index.php'>Strona Główna</a></li>";
        echo "<li><a href='./index.php'>Kluby</a></li>";
        echo "<li><a href='./kluby_detale.php?clubId=$clubId'>$clubName</a></li>";
        echo "<li class='active'>$playerName $playerLastName</li>";
        echo "</ol>";    
    }
} else {
    echo "Brak zawodników w bazie";
}
$connection->close(); 
    
?>  
<div class="szczegoly_klubu">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><img src="img/herby/<?php echo $clubImg?>" class="img-responsive"/></div>
            <div class="col-md-10">
            <p class="nazwa-klubu"><?php echo $playerName .' '. $playerLastName; ?></p>
            <p class="szczegoly">Data urodzenia: <span style="font-weight: bold"><?php echo $playerBorn; ?></span></p>   
            <p class="szczegoly">Kraj pochodzenia: <span style="font-weight: bold"><?php echo $playerCountry; ?></span></p>
            <p class="szczegoly">Wzrost: <span style="font-weight: bold"><?php echo $playerStature; ?> cm</span></p>   
            <p class="szczegoly">Waga: <span style="font-weight: bold"><?php echo $playerWeight; ?> kg</span></p>  
            <p class="szczegoly">Numer na koszulce: <span style="font-weight: bold"><?php echo $playerNumber; ?></span></p>  
            </div>
        </div>
    </div>
</div>

</div>
<div class="sklady_klubu">
<div class="container">
  <p>Kliknij na panel, aby dowiedzieć się więcej</p>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Statystyki zawodnika</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"><?php include('zawodnicy_staty.php'); ?></div>
        <div class="panel-footer"><a data-toggle="collapse" href="#collapse1">Zwiń panel</a></div>
      </div>
    </div>
  </div>
</div>
</div>

            
<?php include('includes/footer.php'); ?>  
</body>
</html>


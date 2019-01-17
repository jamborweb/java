
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
    
   $clubId = $_GET['clubId'];
    $getClubs = "SELECT id_kluby, nazwa, adres, kod_pocztowy, wojewodztwo, barwy, data_powstania, herb_img, nazwa_stadionu, ilosc_miejsc FROM kluby 
    LEFT JOIN stadiony ON stadiony.id_stadiony = kluby.id_kluby 
    WHERE id_kluby = $clubId";
    
    $result = $connection->query($getClubs);  
    
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clubId = $row['id_kluby'];
        $clubName = $row['nazwa'];
        $clubAddress = $row['adres'];
        $clubAddressCode = $row['kod_pocztowy'];
        $clubProvince = $row['wojewodztwo'];
        $clubColors = $row['barwy'];
        $clubCreateDate = $row['data_powstania'];
        $clubImg = $row['herb_img'];
        $stadiumName = $row['nazwa_stadionu'];
        $stadiumCapacity = $row['ilosc_miejsc'];
        //$coachName = $row['trener_imie'];
        //$coachLastName = $row['trener_nazwisko'];
        /*breadcrumbs*/
        echo "<ol class='breadcrumb'>";
        echo "<li><a href='./index.php'>Strona Główna</a></li>";
        echo "<li><a href='./index.php'>Kluby</a></li>";
        echo "<li class='active'>$clubName</li>";
        echo "</ol>";    
    }
} else {
    echo "Brak rekordów w tabeli";
}
$connection->close(); 
    
?>  
<div class="szczegoly_klubu">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><img src="img/herby/<?php echo $clubImg?>" class="img-responsive"/></div>
            <div class="col-md-10">
            <p class="nazwa-klubu"><?php echo $clubName; ?></p>
            <p class="szczegoly">Data założenia: <span style="font-weight: bold"><?php echo $clubCreateDate; ?></span></p>   
            <p class="szczegoly">Barwy: <span style="font-weight: bold"><?php echo $clubColors; ?></span></p>
            <p class="szczegoly">Adres: <?php echo $clubAddress .", ".$clubAddressCode; ?></p>   
            <p class="szczegoly">Woj. <?php echo $clubProvince; ?></p> 
            <p class="szczegoly">Stadion: <span style="font-weight: bold"><?php echo $stadiumName; ?></span></p>   
            <p class="szczegoly">Pojemność stadionu: <span style="font-weight: bold"><?php echo $stadiumCapacity; ?> miejsc</span></p>  
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
          <a data-toggle="collapse" href="#collapse1">Kadra</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"><?php include('zawodnicy.php'); ?></div>
        <div class="panel-footer"><a data-toggle="collapse" href="#collapse1">Zwiń panel</a></div>
      </div>
    </div>
  </div>
</div>
</div>
    
            
<?php include('includes/footer.php'); ?>  
</body>
</html>


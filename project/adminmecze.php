<!-- nieskonczone :(

<?php
/*
    require_once('functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    session_start();
     if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: logowanie.php');
    }
    $getMatches = "SELECT mecze.*, id_kluby, nazwa FROM mecze
    LEFT JOIN sezony ON sezony.id_sezony = mecze.id_sezonu
    LEFT JOIN stadiony ON stadiony.id_stadiony = mecze.id_stadionu
    LEFT JOIN trenerzy ON trenerzy.id_trenerzy = mecze.id_trener_gospodarz AND trenerzy.id_trenerzy = mecze.id_trener_gosc
    LEFT JOIN kluby ON kluby.id_kluby = mecze.id_klubu_gospodarz AND kluby.id_kluby = mecze.id_klubu_gosc";
    $result = $connection->query($getMatches);
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
    
<?php include('includes/header.php'); ?>

<div class="container container-main">
    <div class="row row-logowanie text-center">
        MECZE
        </div>
    <div class="list-group list-group-admin">
        <a href="Dodawanie/dodawanie_zawodnika.php" class="list-group-item">Dodaj Mecz</a>
        <a href="Wyszukiwanie/wyszukiwanie_zawodnika.php" class="list-group-item">Wyszukaj mecz</a>
    </div>
    <div class="row">
            <div class="clubs-table-admins">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kolejka</th>
                            <th>Gospodarz</th>
                            <th>Gość</th>
                            <th>Gol Gospodarz</th>
                            <th>Gol Gość</th>
                            <th>GolH Gospodarz</th>
                            <th>GolH Gość</th>
                            <th>Data</th>
                            <th>Liczba widzów</th>
                            <th>Sezon</th>
                            <th>Stadion</th>
                            <th>Trener Gosp</th>
                            <th>Trener Gość</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                    </thead>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $matchId = $row['id_mecze'];
        $kolejka = $row['kolejka'];
        $golGospodarz = $row['gol_gospodarz'];
        $golGosc = $row['gol_gosc'];
        $golGospodarzPolowa = $row['gol_gospodarz_half'];
        $golGoscPolowa = $row['gol_gosc_half'];
        $datameczu = $row['data'];
        $liczbaWidzow = $row['liczba_widzow'];
        //$playerLink = "<a href='zawodnicy_detale.php?playerId=$playerId'>$playerLastName</a>";
        $sezonId = $row['id_sezonu'];
        $sezonNazwa = $row['nazwa_sezonu'];
        $stadionId = $row['id_stadionu'];
        $stadionNazwa = $row['nazwa_stadionu'];
        $trenerGospodarzId = $row['id_trener_gospodarz'];
        $trenerGospodarzImie = $row['trener_imie'];
        $trenerGospodarzNazwisko = $row['trener_nazwisko'];
        $trenerGoscId = $row['id_trener_gosc'];
        $trenerGoscImie = $row['trener_imie'];
        $trenerGoscNazwisko = $row['trener_nazwisko'];
        $klubGospodarzId = $row['id_klubu_gospodarz'];
        $klubGospodarzNazwa = $row['nazwa'];
        $clubLinkGospodarz = "<a href='kluby_detale.php?clubId=$klubGospodarzId'>$klubGospodarzNazwa</a>";
        $klubGoscId = $row['id_klubu_gosc'];
        $klubGoscNazwa = $row['nazwa'];
        $clubLinkGosc = "<a href='kluby_detale.php?clubId=$klubGoscId'>$klubGoscNazwa</a>";
        echo "<tr>";
        echo "<td>$kolejka</td>";
        echo "<td>$clubLinkGospodarz</td>";
        echo "<td>$clubLinkGosc</td>";
        echo "<td>$golGospodarz</td>";
        echo "<td>$golGosc</td>";
        echo "<td>$playerWeight</td>";
        echo "<td>$playerNumber</td>";
        echo "<td>$clubLink</td>";
        echo "<td>$sezonName</td>";
        echo "<td><a href='Edytowanie/edytowanie_zawodnika.php?playerId=$playerId' class='btn btn-info' role='button'>Edytuj</a></td>";
        echo "<td><a href='Usuwanie/usuwanie_zawodnika.php?playerId=$playerId' class='btn btn-danger' role='button'>Usuń</a></td>";
        echo "</tr>";
    }
} else {
    echo "Brak zawodników w bazie";
}
$connection->close();
?>
                </table>
        </div>
    </div>      
</div>

    
    

            
<?php include('includes/footer.php'); ?>  
</body>
</html>
-->

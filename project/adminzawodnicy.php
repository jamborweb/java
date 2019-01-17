<?php
    require_once('functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    session_start();
     if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: logowanie.php');
    }
    $getPlayers = "SELECT * FROM zawodnicy
    LEFT JOIN kluby ON kluby.id_kluby = zawodnicy.Kluby_id_kluby
    LEFT JOIN sezony ON sezony.id_sezony = zawodnicy.Sezony_id_sezony
    ORDER BY zawodnicy.nazwisko";
    $result = $connection->query($getPlayers);
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
        ZAWODNICY
        </div>
    <div class="list-group list-group-admin">
        <a href="Dodawanie/dodawanie_zawodnika.php" class="list-group-item">Dodaj Zawodnika</a>
        <a href="Wyszukiwanie/wyszukiwanie_zawodnika.php" class="list-group-item">Wyszukaj Zawodnika</a>
    </div>
    <div class="row">
            <div class="clubs-table-admins">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imie</th>
                            <th>Nazwisko</th>
                            <th>Kraj</th>
                            <th>Data urodzenia</th>
                            <th>Wzrost</th>
                            <th>Waga</th>
                            <th>Numer koszulki</th>
                            <th>Klub</th>
                            <th>Sezon</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                    </thead>
<?php
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
        $playerLink = "<a href='zawodnicy_detale.php?playerId=$playerId'>$playerLastName</a>";
        $clubId = $row['id_kluby'];
        $clubName = $row['nazwa']; 
        $sezonId = $row['id_sezony'];
        $sezonName = $row['nazwa_sezonu'];
        $clubLink = "<a href='kluby_detale.php?clubId=$clubId'>$clubName</a>";
        echo "<tr>";
        echo "<td>$playerName</td>";
        echo "<td>$playerLink</td>";
        echo "<td>$playerCountry</td>";
        echo "<td>$playerBorn</td>";
        echo "<td>$playerStature</td>";
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


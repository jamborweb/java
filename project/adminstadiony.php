<?php
    require_once('functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    session_start();
     if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: logowanie.php');
    }
    $getStadions = "SELECT id_stadiony, nazwa_stadionu, ilosc_miejsc, id_klub, id_kluby, nazwa FROM stadiony 
    LEFT JOIN kluby ON kluby.id_kluby = stadiony.id_klub
    ORDER BY stadiony.nazwa_stadionu";
$result = $connection->query($getStadions);
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
        STADIONY
        </div>
    <div class="list-group list-group-admin">
        <a href="Dodawanie/dodawanie_stadionu.php" class="list-group-item">Dodaj Stadion</a>
        <a href="Wyszukiwanie/wyszukiwanie_stadionu.php" class="list-group-item">Wyszukaj Stadion</a>
    </div>
    <div class="row">
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
        echo "<td><a href='Edytowanie/edytowanie_stadionu.php?stadionId=$stadionId' class='btn btn-info' role='button'>Edytuj</a></td>";
        echo "<td><a href='Usuwanie/usuwanie_stadionu.php?stadionId=$stadionId' class='btn btn-danger' role='button'>Usuń</a></td>";
        echo "</tr>";
    }
} else {
    echo "Brak klubów w bazie";
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


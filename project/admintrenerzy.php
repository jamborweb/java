<?php
    require_once('functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    session_start();
     if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: logowanie.php');
    }
    $getCoach = "SELECT id_trenerzy, trener_imie, trener_nazwisko FROM trenerzy
    ORDER BY trenerzy.trener_nazwisko";
$result = $connection->query($getCoach);
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
        TRENERZY
        </div>
    <div class="list-group list-group-admin">
        <a href="Dodawanie/dodawanie_trenera.php" class="list-group-item">Dodaj Trenera</a>
        <a href="Wyszukiwanie/wyszukiwanie_trenera.php" class="list-group-item">Wyszukaj Trenera</a>
    </div>
    <div class="row">
            <div class="clubs-table-admins">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imie trenera</th>
                            <th>Nazwisko trenera</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                    </thead>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $coachId = $row['id_trenerzy'];
        $coachFirstName = $row['trener_imie']; 
        $coachLastName = $row['trener_nazwisko'];
        echo "<tr>";
        echo "<td>$coachFirstName</td>";
        echo "<td>$coachLastName</td>";
        echo "<td><a href='Edytowanie/edytowanie_trenera.php?coachId=$coachId' class='btn btn-info' role='button'>Edytuj</a></td>";
        echo "<td><a href='Usuwanie/usuwanie_trenera.php?coachId=$coachId' class='btn btn-danger' role='button'>Usuń</a></td>";
        echo "</tr>";
    }
} else {
    echo "Brak trenerów w bazie";
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


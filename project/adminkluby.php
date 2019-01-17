<?php
    require_once('functions/connect.php');
    mysqli_set_charset($connection,"utf8");
    session_start();
    if(!isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==false))
    {
        header('Location: logowanie.php');
    }

$getClubs = "SELECT id_kluby, nazwa, adres, kod_pocztowy, wojewodztwo, barwy, data_powstania, herb_img FROM kluby ORDER BY kluby.nazwa";
$result = $connection->query($getClubs);
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
        KLUBY
        </div>
    <div class="list-group list-group-admin">
        <a href="Dodawanie/dodawanie_klubu.php" class="list-group-item">Dodaj Klub</a>
        <a href="Wyszukiwanie/wyszukiwanie_klubu.php" class="list-group-item">Wyszukaj Klub</a>
    </div>
    <div class="row">
            <div class="clubs-table-admins">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nazwa klubu</th>
                            <th>Adres</th>
                            <th>Wojewodztwo</th>
                            <th>Barwy</th>
                            <th>Data powstania</th>
                            <th>Herb</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                        </tr>
                    </thead>
<?php
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
        $clubLink = "<a href='kluby_detale.php?clubId=$clubId'>$clubName</a>";
        echo "<tr>";
        echo "<td>$clubLink</td>";
        echo "<td>".$clubAddress .", ".$clubAddressCode."</td>";
        echo "<td>$clubProvince</td>";
        echo "<td>$clubColors</td>";
        echo "<td>$clubCreateDate</td>";
        echo '<td class="td-herb"><img src="img/herby/'.$clubImg.'" class="img-responsive kluby-img"/></td>';
        echo "<td><a href='Edytowanie/edytowanie_klubu.php?clubId=$clubId' class='btn btn-info' role='button'>Edytuj</a></td>";
        echo "<td><a href='Usuwanie/usuwanie_klubu.php?clubId=$clubId' class='btn btn-danger' role='button'>Usuń</a></td>";
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


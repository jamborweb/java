<?php
    $connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");
?>
<div class="statystykigraczy">
    
    <p class="kadra-p"> Ilość rozegranych meczy w składzie podstawowym: <?php
        $playerId = $_GET['playerId'];
        $row =  $connection->query("SELECT COUNT(*) as total from sklady
            LEFT JOIN zawodnicy ON zawodnicy.id_zawodnicy = sklady.id_zawodnik
            LEFT JOIN kluby ON kluby.id_kluby = sklady.Kluby_id_kluby
            WHERE sklady.typ_skladu = 'P' AND sklady.id_zawodnik = $playerId")->fetch_assoc();
        echo $row['total'];
    ?></p>
    
    <p class="kadra-p"> Ilość rozegranych meczy w składzie rezerwowym: <?php
        $playerId = $_GET['playerId'];
        $row =  $connection->query("SELECT COUNT(*) as total from sklady
            LEFT JOIN zawodnicy ON zawodnicy.id_zawodnicy = sklady.id_zawodnik
            LEFT JOIN kluby ON kluby.id_kluby = sklady.Kluby_id_kluby
            WHERE sklady.typ_skladu = 'R' AND sklady.id_zawodnik = $playerId")->fetch_assoc();
        echo $row['total'];
    ?></p>
    
    <p class="kadra-p"> Ilość rozegranych minut: <?php
        $playerId = $_GET['playerId'];
        $row =  $connection->query("SELECT (SUM(minuty_od) + SUM(minuty_do)) as total from sklady
            LEFT JOIN zawodnicy ON zawodnicy.id_zawodnicy = sklady.id_zawodnik
            LEFT JOIN kluby ON kluby.id_kluby = sklady.Kluby_id_kluby
            WHERE sklady.id_zawodnik = $playerId")->fetch_assoc();
        echo $row['total'];
    ?></p>
    
 </div> 



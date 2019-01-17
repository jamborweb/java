<?php require_once('functions/connect.php');?>
<?php
$connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");

  if($connection->connect_error){
    die("Błąd połączenia z bazą danych! " . $connection->connect_error);
  }
mysqli_set_charset($connection,"utf8");
?>
<div class="kadraliczy">
 <span class="kadra-span"> W kadrze tego zespołu znajduje się <?php
     $clubId = $_GET['clubId'];
  $row =  $connection->query("SELECT COUNT(*) as total from zawodnicy LEFT JOIN kluby ON kluby.id_kluby=zawodnicy.Kluby_id_kluby WHERE id_kluby = $clubId")->fetch_assoc();
  echo $row['total'];
  ?> zawodników</span>
 </div> 
<div class="clubs-table">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Zawodnik &nbsp;<span class="glyphicon glyphicon-hand-down" aria-hidden="true"></span></th>
        <th>Kraj pochodzenia</th>
      </tr>
    </thead>
<?php
$clubId = $_GET['clubId'];
$getPlayers = "SELECT id_zawodnicy, imie, nazwisko, kraj, data_urodzenia, wzrost, waga, nr_koszulki FROM zawodnicy
LEFT JOIN kluby ON kluby.id_kluby=zawodnicy.Kluby_id_kluby WHERE id_kluby = $clubId ";
      
$result = $connection->query($getPlayers);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $playerId = $row['id_zawodnicy'];
        $playerName = $row['imie'];
        $playerLastName = $row['nazwisko'];
        $playerCountry = $row['kraj'];
        $playerLink = "<a href='zawodnicy_detale.php?playerId=$playerId'>$playerName $playerLastName</a>";
        echo "<tr>";
        echo "<td>$playerLink</td>";
        echo "<td>".$playerCountry."</td>";
        echo "</tr>";
    }
} else {
    echo "Brak rekordów w tabeli";
}     
$connection->close();    
?>  
    </table>
</div> 
  
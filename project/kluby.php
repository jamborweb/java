<?php require_once('functions/connect.php');?>
<?php
$connection = new mysqli("$servername", "$username", "$userpassword", "$dbname");

  if($connection->connect_error){
    die("Błąd połączenia z bazą danych! " . $connection->connect_error);
  }
mysqli_set_charset($connection,"utf8");
    
$getClubs = "SELECT id_kluby, nazwa, adres, kod_pocztowy, herb_img FROM kluby ORDER BY kluby.nazwa";
$result = $connection->query($getClubs);

?>
<div class="clubs-table">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nazwa klubu &nbsp;<span class="glyphicon glyphicon-hand-down" aria-hidden="true"></span></th>
        <th>Adres</th>
      </tr>
    </thead>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clubId = $row['id_kluby'];
        $clubName = $row['nazwa']; 
        $clubAddress = $row['adres'];
        $clubAddressCode = $row['kod_pocztowy'];
        $clubImg = $row['herb_img'];
        $clubLink = "<a href='kluby_detale.php?clubId=$clubId'>$clubName</a>";
        
        echo "<tr>";
        //echo '<td class="td-herb"><img src="img/herby/'.$clubImg.'" class="img-responsive kluby-img"/></td>';
        echo "<td>$clubLink</td>";
        echo "<td>".$clubAddress .", ".$clubAddressCode."</td>";
        echo "</tr>";
    }
} else {
    echo "Brak klubów w bazie";
}
$connection->close();
?>
    </table>
</div>
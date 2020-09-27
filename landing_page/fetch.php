<link rel="stylesheet" type="text/css" href="css/style.css">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kalyanio";

 $myprice = $_POST["priced"] ;
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 

$sql = "SELECT * FROM nourritures WHERE cout <= ".$myprice;

$result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)) {
  
    echo "<div class='col-sm-3'><p id='lib'> ".$row["libelle"] ."</p><p id='prepa'>Preparation : ".$row["preparation_duree"]."</p><p id='cuis'>Cuisson :".$row["cuisson"]."</p><p id='prix'>Prix : ".$row["cout"]. 'Ariary'."</p></div>";
    
    }
   


mysqli_close($conn);
?>
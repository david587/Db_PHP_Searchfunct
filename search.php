<a href="index.php">Vissza</a>
<?php

$conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
mysqli_select_db($conn,"raktar");

$search = $_GET['search'];
$search = $conn->real_escape_string($search);


$query = "SELECT * FROM raktar WHERE id LIKE '%".$search."%' OR beszallito like '%".$search."%' or megnevezes like '%".$search."%' or ar LIKE '%".$search."%'";
if($result= $conn -> query($query)){
while($row = $result -> fetch_object()){
    echo "<div id='link' onClick='addText(\"".$row -> id ."\");'>" . $row -> megnevezes . $row -> beszallito .$row -> ar . "</div>";
}
}

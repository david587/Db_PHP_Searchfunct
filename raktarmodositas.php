<?php

$conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
mysqli_select_db($conn,"raktar");

$id=$_REQUEST['id'];
$megnevezes=$_REQUEST["megnevezes"];
$beszallito=$_REQUEST["beszallito"];
$ar=$_REQUEST["ar"];

$query="UPDATE raktar SET megnevezes='".$megnevezes."', beszallito='".$beszallito."', ar=".$ar." WHERE id=".$id.";";
//print $query;
mysqli_query($conn, $query);
mysqli_close($conn);

header("Location:index.php");


?>
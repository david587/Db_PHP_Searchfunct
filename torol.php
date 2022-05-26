<?php

$conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
mysqli_select_db($conn,"raktar");

$Id=$_REQUEST['Id'];

$query="DELETE FROM raktar WHERE Id=".$Id.";";
mysqli_query($conn, $query);
mysqli_close($conn);

header("Location:index.php");

//print $query;
?>
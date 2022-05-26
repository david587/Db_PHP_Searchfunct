<?php

    $conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
    mysqli_select_db($conn,"raktar");
    
    $megnevezes=$_REQUEST["megnevezes"];
    $beszallito=$_REQUEST["beszallito"];
    $ar=$_REQUEST["ar"];

    $query="INSERT INTO raktar(megnevezes, beszallito, ar) Values ('".$megnevezes."','".$beszallito."',".$ar.");";
    //print $query;
    mysqli_query($conn, $query);
    header("Location:index.php");
   
?>
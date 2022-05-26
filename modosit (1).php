<?php
$conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
mysqli_select_db($conn,"raktar");

$Id=$_REQUEST['Id'];

$query="SELECT * FROM raktar WHERE Id=".$Id.";";
$raktar=mysqli_query($conn, $query);
mysqli_close($conn);

$sor =mysqli_fetch_assoc($raktar)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<p class="display-1 mb-5 text-center">Raktár módosítása<p>

<form action="raktarmodositas.php" method="get">
                    <div class="row p-3">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php print $sor['id']; ?>">                                               
                        
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="megnevezes" name="megnevezes" value="<?php print $sor['megnevezes']; ?>">
                            <label for="megnevezes">Megnevezés </label>
                        </div>
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="beszallito" name="beszallito" value="<?php print $sor['beszallito']; ?>">
                            <label for="beszallito">Beszállitó </label>
                        </div>
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="ar" name="ar" value="<?php print $sor['ar']; ?>">
                            <label for="ar">Ár</label>
                        </div>                        
                    </div>

                    <div class="row text-start pb-3">
                        <div class="col-12 ms-3">
                            <button type="submit" class="btn btn-primary p-3">Módosítás</button>
                        </div>
                    </div>
                </div>
            </form>



</body>
</html>
<?php
function konyvtar_csatlakozas(){
 $conn= mysqli_connect("localhost","root","") or die("Csatlakozási hiba");
 if (mysqli_select_db($conn,"raktar")==false)
 {
     return null;
 }
 return $conn;
}

function raktarlistaLeker()
{
    if (!($conn=konyvtar_csatlakozas())) 
    {return false;}

    $result= mysqli_query($conn, "select * from raktar;");
    mysqli_close($conn);
    return $result;
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>

    <form action="search.php" method="GET">
<input id="search" name="search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">
</form>

    <p class="display-1 mb-5 text-center">Raktár<p>

    <form action="raktarfelvitel.php" method="get">
                    <div class="row p-3">
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="megnevezes" name="megnevezes">
                            <label for="megnevezes">Megnevezés </label>
                        </div>
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="beszallito" name="beszallito">
                            <label for="beszallito">Beszállitó </label>
                        </div>
                        <div class="form-floating mb-3 col-4">
                            <input type="text" class="form-control" id="ar" name="ar">
                            <label for="ar">Ár</label>
                        </div>                        
                    </div>

                    <div class="row text-start pb-3">
                        <div class="col-12 ms-3">
                            <button type="submit" class="btn btn-primary p-3">Új felvétele</button>
                        </div>
                    </div>
                </div>
            </form>






    <div class="row py-2">
            <div class="col-2 text-center">
                <h3>Id</h3>
            </div>
            <div class="col-2">
                <h3>Megnevezés</h3>               
            </div>
            <div class="col-2">
                <h3>Beszállitó</h3>
            </div>
            <div class="col-2">
                <h3>Ár</h3>
            </div>
            <div class="col-2">
                <h3>Módosítás</h3>
            </div>
            <div class="col-2">
                <h3>Törlés</h3>
            </div>
        </div>

        <?php
    

    $raktar=raktarlistaLeker();
    while ($sor =mysqli_fetch_assoc($raktar))
    {
?>
        <div class="row py-2">

            <div class="col-2 text-center">
                <?php print $sor["id"]; ?>
            </div>

            <div class="col-2">
                <?php print $sor["megnevezes"]; ?>
            </div>

            <div class="col-2">
                <?php print $sor["beszallito"]; ?>
            </div>

            <div class="col-2">
                <?php print $sor["ar"]; ?>
            </div>

            <div class="col-2">
                <a href="modosit.php?Id=<?php print $sor['id'] ?>">Módosítás</a>
            </div>
            <div class="col-2">
                <a href="torol.php?Id=<?php print $sor['id'] ?>">Törlés</a>
            </div>
        </div>

        <?php     
    }
        mysqli_free_result($raktar);
        ?>

    </body>
</html>
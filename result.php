<?php
    // var_dump($_GET);

        try {
            $bdd = new PDO("mysql:host=localhost:3306;dbname=pokedex;charset=utf8", "root", "root");
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <section class="container">
    
    
    <?php

    $req = $bdd->prepare("SELECT * FROM pokemon WHERE name LIKE ?");
        $req->execute(
            array(
                "%" . $_GET["name"] . "%", // pour que si la recherche n'est pas a 100% complète.
                )
            );

        while ($search = $req->fetch())
        {
            echo'<div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src=" '. $search["image"] .' " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' . $search["name"] . '</h5>
                        <p class="card-text"> ' . $search["type"] . ' est son type </p>
                    </div>
                </div>';
        }

        $req = $bdd->prepare("SELECT * FROM pokemon WHERE type LIKE ?");
        $req->execute(
            array(
                $_GET["type"],
                )
            );

        while ($search = $req->fetch())
        {
            echo'<div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src=" '. $search["image"] .' " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' . $search["name"] . '</h5>
                        <p class="card-text"> ' . $search["type"] . ' est son type </p>
                    </div>
                </div>';
        }
        ?>
        
    </section>
</body>
</html>
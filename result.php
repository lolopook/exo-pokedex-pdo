<?php
    // var_dump($_GET);

        try {
            $bdd = new PDO("mysql:host=localhost:3306;dbname=pokedex;charset=utf8", "root", "root");
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }



        $req = $bdd->prepare("SELECT * FROM pokemon WHERE name LIKE ?");
        $req->execute(
            array(
                $_GET["name"],
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
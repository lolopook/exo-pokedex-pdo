<?php
    var_dump($_POST);

        try {
            $bdd = new PDO("mysql:host=localhost:3306;dbname=pokedex;charset=utf8", "root", "root");
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }

        $req = $bdd->prepare("INSERT INTO pokemon (name,type,image) VALUES (?, ?, '')");
        $req->execute(
            array(
                $_POST["name"],
                $_POST["type"]
                )
        );

        header('Location: ./index.php');

?>


    

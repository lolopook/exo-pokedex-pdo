<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokedex</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
        try {
            $bdd = new PDO("mysql:host=localhost:3306;dbname=pokedex;charset=utf8", "root", "root");
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    ?>

    <div class="container">
        <form action="./addPokemon.php" class="form-group" method="post">
            <h2>Entrez les tous</h2>
            <label for="name">Remplir les champs pour rentrer un pokemon</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="PokéName">
            <input type="text" class="form-control" name="type" id="type" placeholder="PokéType">
            <!-- <input type="int" name="evolution" id="evolution" placeholder="PokéEvolution"> -->
            <input type="text" class="form-control" name="image" id="image" placeholder="PokéPick">

            <button type="submit" class="btn btn-primary"> Go !</button>

        </form>
        <form action="./result.php" class="form-group">
            <h2>Recherche les tous</h2>
            <label for="name">Recherche par nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="PokéName">
            <label for="type">Recherche par type</label>
            <input type="text" class="form-control" name="type" id="type" placeholder="PokéType">

            <button type="submit" class="btn btn-primary"> Go !</button>

        </form>

    </div>


    <div class="container mx-auto">
         <?php
        $req = $bdd->query("SELECT * FROM pokemon");
        
        while ($cardPokemon = $req->fetch())
        {
            // var_dump($cardPokemon);
            echo'<div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src=" '. $cardPokemon["image"] .' " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' . $cardPokemon["name"] . '</h5>
                        <p class="card-text"> ' . $cardPokemon["type"] . ' est son type </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        <a href="#" class="btn btn-primary btn-danger">Go somewhere</a>
                    </div>
                </div>';
        }
        ?>
    </div>
</body>

</html>

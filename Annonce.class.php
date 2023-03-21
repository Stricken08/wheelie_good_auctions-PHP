<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    class Annonce
    {
        public function posterAnnonce()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $filter = $_POST["annoncesFilter"];
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  !$filter) {
                $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
                $query = $dbh->prepare("INSERT INTO `annonces`( `start_price`, `end_date`, `car_model`, `car_brand`, `power`, `production_year`, `description`) VALUES (:prixReserve,:endDate,:carModel,:carBrand,:power,:productionYear,:description)");
                $query->bindValue(':prixReserve', $_POST["prixReserve"], PDO::PARAM_STR);
                $query->bindValue(':endDate', $_POST["endDate"], PDO::PARAM_STR);
                $query->bindValue(':carModel', $_POST["carModel"], PDO::PARAM_STR);
                $query->bindValue(':carBrand', $_POST["carBrand"], PDO::PARAM_STR);
                $query->bindValue(':power', $_POST["power"], PDO::PARAM_STR);
                $query->bindValue(':productionYear', $_POST["productionYear"], PDO::PARAM_INT);
                $query->bindValue(':description', $_POST["description"], PDO::PARAM_STR);
                $query->execute();
            }
        }
        //affiche les détails d'une seule annonce
        public static function renderAnnonce($id)
        {
            $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
            $query = $dbh->prepare("SELECT * from `annonces` WHERE id=:id");
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch();
            echo "<div class=\"register\" >";
            echo "<h2>Details de l'annonce :</h2>";
            echo "<p><b>Marque de la voiture: </b>" . $result['car_brand'] . "</p>";
            echo "<p><b>Modèle de la voiture: </b>"  . $result['car_model'] . "</p>";
            echo "<p><b>Prix de départ: </b> " . $result['start_price'] . "€</p>";
            echo "<p><b>Fin de l'enchère:</b>"  . $result['end_date'] . "</p>";
            echo "<p><b>Puissance: </b>"  . $result['power'] . "ch</p>";
            echo "<p><b>Date de mise en circulation: </b>"  . $result['production_year'] . "</p>";
            echo "<p><b>Description du véhicule: </b>"  . $result['description'] . "</p>";
            echo "</div>";
            $end_date = $result['end_date'];
            $current_date = date("Y-m-d H:i:s");
    ?>
            <?php
            echo "<div class=\"register\" >";
            echo "<form method='POST'>";

            //on vérifie que les identifiants de session existent
            if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && $_SESSION["email"] && $_SESSION["password"]) {
                //si les identifiants existent, on vérifie la date du jour pour pouvoir enchérir
                if ($current_date > $end_date) {
                    echo "<p class=\"deadline\">Cette enchère est terminée.</p>";
                } else {
                    echo "<p>Enchérir <input type='text' name='new_price' value='" . $result['start_price'] . " €'></p>";
                    echo "<button type='submit'>Valider</button>";
                    echo "<p>Dernière enchère: " . $result['new_price'] . "</p>";
                    echo "</form>";
                }
                //si la personne ne possède pas de compte, on affiche un bouton pour créer un compte
            } else {
                echo "<button><a href='connection.php'>Se connecter pour enchérir</a></button>";
            }
            echo "</div>";
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $new_price = $_POST["new_price"];
                $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
                $query = $dbh->prepare("UPDATE `annonces` SET `new_price`=:new_price WHERE `id`=:id");
                $query->bindValue(':new_price', $new_price, PDO::PARAM_STR);
                $query->bindValue(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $result['new_price'] = $new_price;
                header("Location: http://localhost:8888/enchere/annonceDetails.php?id=" . $result['id']);
            } ?>

    <?php

        }
        //affiche toutes les annonces sur la page d'accueil
        public function showAllAnnonces()
        {
            echo "<div class=\"filter\">";
            echo  "<form method=\"POST\" action=\"index.php\">
                <select name=\"annoncesFilter\" required>
                    <option value=\"default\"  selected>--Filtrer les annonces--</option>
                    <option value=\"current\">Enchères en cours</option>
                    <option value=\"finish\">Encheres terminées</option>
                </select>
                <button type=\"submit\">Filtrer</button>
            </form>
            ";
            echo "</div>";

            echo "<h1>Annonces :</h1>";
            //on affiche les annonces en fonction du choix du select
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
                $filter = $_POST['annoncesFilter'];
                if ($filter == "current") {
                    $query = $dbh->prepare("SELECT * from `annonces`WHERE end_date > NOW()");
                } elseif ($filter == "finish") {
                    $query = $dbh->prepare("SELECT * from `annonces` WHERE end_date< NOW()");
                } else {
                    $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
                    $query = $dbh->prepare("SELECT * from `annonces`"); // Récupérer toutes les annonces
                }
            } else {
                $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
                $query = $dbh->prepare("SELECT * from `annonces`"); // Récupérer toutes les annonces
            }
            $query->execute();
            $result =  $query->fetchAll();
            //avec le foreach, on affiche le contenu de chaque annonce sur la page
            foreach ($result as $item) {
                //on crée des variables pour stocker la date du jour et la date de fin
                $current_date = date("Y-m-d H:i:s");
                $end_date = $item['end_date'];
                echo "<div class=\"annonces\">";
                echo "<div class=\"annoncesImage\">";
                //selon le choix du select, on affiche une image qui correspond à la marque choisie
                if ($item['car_brand'] == 'Toyota') {
                    echo "<img src='./brands/toyota.png'>";
                } else if ($item['car_brand'] == 'Audi') {
                    echo "<img src='./brands/audi.png'>";
                } else if ($item['car_brand'] == 'BMW') {
                    echo "<img src='./brands/BMW.png'>";
                } else if ($item['car_brand'] == 'Citroën') {
                    echo "<img src='./brands/citroen.jpg'>";
                } else if ($item['car_brand'] == 'Fiat') {
                    echo "<img src='./brands/fiat.jpg'>";
                } else if ($item['car_brand'] == 'Ford') {
                    echo "<img src='./brands/Ford.png'>";
                } else if ($item['car_brand'] == 'Hyundai') {
                    echo "<img src='./brands/hyundai.png'>";
                } else if ($item['car_brand'] == 'Mercedes') {
                    echo "<img src='./brands/Mercedes.png'>";
                } else if ($item['car_brand'] == 'Peugeot') {
                    echo "<img src='./brands/peugeot.png'>";
                } else if ($item['car_brand'] == 'Renault') {
                    echo "<img src='./brands/renault.png'>";
                } else if ($item['car_brand'] == 'Seat') {
                    echo "<img src='./brands/SEAT.png'>";
                } else if ($item['car_brand'] == 'Tesla') {
                    echo "<img src='./brands/Tesla.png'>";
                } else if ($item['car_brand'] == 'Volkswagen') {
                    echo "<img src='./brands/Volkswagen.jpg'>";
                } else {
                    echo "<img src='./brands/Volkswagen.jpg'>";
                }
                echo "</div>";
                echo "<div class=\"annonceContent\" >";
                echo "<p><b>Marque de la voiture: </b>" . $item['car_brand'] . "</p>";
                echo "<p><b>Modèle de la voiture: </b>"  . $item['car_model'] . "</p>";
                echo "<p><b>Prix de départ: </b> " . $item['start_price'] . "€</p>";
                //si la valeur de new_price n'est pas nulle, on l'affiche dans la description du produit
                if ($item['new_price'] != 0) {
                    echo "<p><b>Dernière enchère: </b> " . $item['new_price'] . "</p>";
                }
                echo "<p><b>Fin de l'enchère: </b>"  . $item['end_date'] . "</p>";
                echo "<button><a href='annonceDetails.php?id=" . $item['id'] . "'>Consulter l'annonce</a></button>";
                //si la date du jour est supérieure à la date de de fin de l'enchère, on ne peut plus enchérir
                if ($current_date > $end_date) {
                    echo "<p class=\"deadline\">Cette enchère est terminée.</p>";
                }
                echo "</div>";
                echo "</div>";
            }
        }
    }
    ?>

</body>

</html>
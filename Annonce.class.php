 <?php

    class Annonce
    {
        public function posterAnnonce()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            echo "<h1>Details de l'annonce :</h1>";
            echo "<p><b>Marque de la voiture: </b>" . $result['car_brand'] . "</p>";
            echo "<p><b>Modèle de la voiture: </b>"  . $result['car_model'] . "</p>";
            echo "<p><b>Prix de départ: </b> " . $result['start_price'] . "€</p>";
            echo "<p><b>Fin de l'enchère:</b>"  . $result['end_date'] . "</p>";
            echo "<p><b>Puissance: </b>"  . $result['power'] . "ch</p>";
            echo "<p><b>Date de mise en circulation: </b>"  . $result['production_year'] . "</p>";
            echo "<p><b>Description du véhicule: </b>"  . $result['description'] . "</p>";
            //   vincent
            // echo "<button><a href='newBid.php'>Enchérir</a></button>";
            // echo $result['new_price'];
    ?>
            <?php
            echo "<form method='POST'>";
            echo "<p>Enchérir <input type='text' name='new_price' value='" . $result['start_price'] . "'></p>";
            echo "<button type='submit'>Valider</button>";
            echo "<p>Prix de l'enchère: " . $result['new_price'] . "</p>";
            echo "</form>";
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

            echo "<h1>Annonces :</h1>";
            $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
            $query = $dbh->prepare("SELECT * from `annonces`");
            $query->execute();
            $result =  $query->fetchAll();
            foreach ($result as $item) {

                if ($item['car_brand'] == 'Toyota') {
                    echo "<img src='./brands/toyota.png'>";
                } else if ($item['car_brand'] == 'Audi') {
                    echo "<img src='./brands/audi.png'>";
                } else if ($item['car_brand'] == 'BMW') {
                    echo "<img src='BMW.png'>";
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

                echo "<p><b>Marque de la voiture: </b>" . $item['car_brand'] . "</p>";
                echo "<p><b>Modèle de la voiture: </b>"  . $item['car_model'] . "</p>";
                echo "<p><b>Prix de départ: </b> " . $item['start_price'] . "€</p>";
                echo "<p><b>Fin de l'enchère:</b>"  . $item['end_date'] . "</p>";
                echo "<button><a href='annonceDetails.php?id=" . $item['id'] . "'>Consulter l'annonce</a></button>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
    }
    ?>

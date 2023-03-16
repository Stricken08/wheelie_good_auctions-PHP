<?php

class Annonce
{
    public function posterAnnonce()
    {
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
    //affiche les détails d'une seule annonce
    public function renderAnnonce()
    {
        $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
        $id = $_GET['id'];

        echo $id;
        $query = $dbh->prepare("SELECT * from `annonces` WHERE `id` = $id ");
        $query->execute();
        $result = $query->fetch();
        // var_dump($result);
        // echo $query
        // $result =  $query->fetchAll();
        // var_dump($result);
        // foreach ($result as $item) {
        //     echo "<h1>Annonces : " . $item['car_brand'] . "</h1>";
        //     echo "<h3>Prix de départ: " . $item['start_price'] . "€</h3>";
        //     echo "<h3>Fin de l'enchère: " . $item['end_date'] . "</h3>";
        //     echo "<h3>Modèle de la voiture: " . $item['car_model'] . "</h3>";
        //     echo "<h3>Marque de la voiture: " . $item['car_brand'] . "</h3>";
        //     echo "<h3>Puissance: " . $item['power'] . "ch</h3>";
        //     echo "<h3>Date de mise en circulation: " . $item['production_year'] . "</h3>";
        //     echo "<h3>Description du véhicule: " . $item['description'] . "</h3>";
        // }
    }
    //affiche toutes les annonces sur la page d'accueil
    public function showAllAnnonces()
    {
        echo "<h1>Annonces :</h1>";
        $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
        $query = $dbh->prepare("SELECT * from `annonces`");
        $query->execute();
        $result =  $query->fetchAll();
        foreach ($result as $key => $item) {
            echo "<div $key>";
            echo  $item['id'];
            echo "<p><b>Marque de la voiture: </b>" . $item['car_brand'] . "</p>";
            echo "<p><b>Modèle de la voiture: </b>"  . $item['car_model'] . "</p>";
            echo "<p><b>Prix de départ: </b> " . $item['start_price'] . "€</p>";
            echo "<p><b>Fin de l'enchère:</b>"  . $item['end_date'] . "</p>";
            echo "<button><a href=annonceDetails.php>consulter l'annonce</a></button>";
            echo "</div>";
            echo "<br>";
        }
    }
}

<?php

// require_once __DIR__ . "/Annonce.class.php";
// $annonceDetails = new Annonce();
// $annonceDetails->renderAnnonce();



$dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
$id = $_GET['id'];
$query = $dbh->prepare("SELECT * from `annonces` WHERE `id` = $id");
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelie Good Auctions</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
require_once __DIR__ . "/navbar.php";
require_once __DIR__ . "/Annonce.class.php";
?>
<h1>Déposez votre annonce ici</h1>
<div class="content">
    <form action="index.php" method="POST">
        <label for="prixReserve">Prix de départ:</label>
        <br>
        <input type="hidden">
        <input type="text" name="prixReserve" id="prixReserve" required>
        <br>
        <label for="endDate">Date de fin de l'enchère:</label>
        <br>
        <input type="date" value="<?php echo date("Y-m-d") ?>" name="endDate" id="endDate" required>
        <br>
        <label for="carBrand">Marque de la voiture:</label>
        <br>
        <select name="carBrand" id="carBrand" required>
            <option value="default" selected>--Choisissez une marque--</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Citroën">Citroën</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Renault">Renault</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Audi">Audi</option>
            <option value="Fiat">Fiat</option>
            <option value="Seat">Seat</option>
            <option value="BMW">BMW</option>
            <option value="Mercedes">Mercedes</option>
            <option value="Tesla">Tesla</option>
            <option value="Ford">Ford</option>
            <option value="Toyota">Toyota</option>
        </select>
        <br>
        <label for="carModel">Modèle de la voiture:</label>
        <br>
        <input type="text" name="carModel" id="carModel" required>
        <br>
        <label for="power">Puissance:</label>
        <br>
        <input type="text" name="power" id="power" required>
        <br>
        <label for="productionYear">Date de mise en circulation:</label>
        <br>
        <input type="date" name="productionYear" id="productionYear" value="<?php echo date("Y-m-d") ?>" required>
        <br>
        <label for="description">Description du véhicule:</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Créer une annonce">

    </form>
</div>
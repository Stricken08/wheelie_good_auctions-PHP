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
    require_once __DIR__ . "/navbar.php";
    require_once __DIR__ . "/Annonce.class.php";
    ?>
    <div class="pictureCover">

        <div class="register login">
            <h2>Déposez votre annonce ici</h2>
            <form action="index.php" method="POST">
                <label for="prixReserve">Prix de départ:</label>
                <input type="text" name="prixReserve" id="prixReserve" required>
                <label for="endDate">Date de fin de l'enchère:</label>
                <input type="date" value="<?php echo date("Y-m-d") ?>" name="endDate" id="endDate" required>
                <label for="carBrand">Marque de la voiture:</label>
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
                <label for="carModel">Modèle de la voiture:</label>
                <input type="text" name="carModel" id="carModel" required>
                <label for="power">Puissance:</label>
                <input type="text" name="power" id="power" required>
                <label for="productionYear">Date de mise en circulation:</label>
                <input type="date" name="productionYear" id="productionYear" value="<?php echo date("Y-m-d") ?>" required>
                <label for="description">Description du véhicule:</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <button type="submit">Créer une annonce</button>
            </form>
        </div>
    </div>

</body>

</html>
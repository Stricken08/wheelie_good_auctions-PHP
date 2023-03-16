<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelie Good Auctions</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content">
        <?php
        require_once __DIR__ . "/navbar.php";
        require_once __DIR__ . "/Annonce.class.php";
        ?>
        <h1 class="mainBanner">Votre site d'enchères préféré !</h1>
        <h3><i>Retrouvez toutes les enchères en cours</i> </h3>
        <?php
        $annonce = new Annonce();

        $annonce->showAllAnnonces();

        ?>

    </div>
</body>

</html>
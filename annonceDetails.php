<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelie Good Auctions</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="content">
    <?php
    require_once __DIR__ . "/navbar.php";
    require_once __DIR__ . "/Annonce.class.php";
    Annonce::renderAnnonce($_GET['id']);
    ?>
</div>
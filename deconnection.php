<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_destroy();
    echo "<h2>Vous vous êtes déconnecté</h2>";
    header('Refresh: 1; URL=http://localhost:8888/enchere/index.php');
    ?>

</body>

</html>
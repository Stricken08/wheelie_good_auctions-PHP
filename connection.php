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
    ?>
    <div class="login register">
        <h2>Se connecter</h2>
        <form action="loginSuccess.php" method="POST">
            <input name="email" type="text" placeholder="e-mail">
            <input name="password" type="password" placeholder="mot de passe">
            <button type="submit">Connexion</button>
        </form>
    </div>

</body>

</html>
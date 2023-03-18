<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelie Good Auctions</title>
    <link rel="stylesheet" href="./style.css">
</head>

<?php
require_once __DIR__ . "/navbar.php";
?>

<body>


    <div class="content">
        <div class="register">
            <h2>Créer un Compte</h2>
            <form method="POST" action="User.class.php">
                <input name="lastname" placeholder="Nom" type="text"></input>
                <input name="firstname" placeholder="prénom" type="text"></input>
                <input name="email" placeholder="e-mail" type="text"></input>
                <input name="password" placeholder="Mot de passe" type="text"></input>
                <button type="submit"> valider</button>
            </form>
        </div>
    </div>
</body>
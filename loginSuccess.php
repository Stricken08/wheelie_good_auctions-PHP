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
    session_start();
    require_once __DIR__ . "/navbar.php";
    require_once __DIR__ . "/Annonce.class.php";
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
        $query = $dbh->prepare("SELECT * from `users` WHERE email=:email AND password = :password");
        $query->bindValue(':email', $_POST["email"]);
        $query->bindValue(':password', $_POST["password"]);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION["email"] = $result["email"];
            $_SESSION["password"] = $result["password"];
            $_SESSION["lastname"] = $result["lastname"];
            $_SESSION["firstname"] = $result["firstname"];
            header("Location: http://localhost:8888/enchere/index.php");
    ?>
    <?php
        } else {
            // Les informations de connexion sont incorrectes
            session_destroy();
            echo "<h3>Identifiants incorrects </h3>";
            echo "<h3>Email ou mot de passe incorrect </h3>";
            echo "<button><a href='connection.php'>Réessayer</a></button>";
        }
    }
    ?>
</body>

</html>
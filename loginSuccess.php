<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php
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
        var_dump($result);
        session_start();
        $_SESSION["email"] = $result["email"];
        $_SESSION["password"] = $result["password"];
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

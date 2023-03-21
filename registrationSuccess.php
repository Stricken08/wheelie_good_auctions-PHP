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
    require_once __DIR__ . "/User.class.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = new Users($lastname, $firstname, $email, $password);
        $user->addUser();
        $user->renderUser();
        session_start(); // On démarre la session

        // On stocke l'objet $user dans une variable de session
        $_SESSION['user'] = $user;
    }

    ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/regular.min.css" integrity="sha512-3YMBYASBKTrccbNMWlnn0ZoEOfRjVs9qo/dlNRea196pg78HaO0H/xPPO2n6MIqV6CgTYcWJ1ZB2EgWjeNP6XA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/2d9a93586d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once __DIR__ . "/loginSuccess.php";
    // session_start();
    if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && $_SESSION["email"] && $_SESSION["password"]) {
    ?>
        <nav>
            <div class="navbar">
                <div class="mainLogo">
                    <img src="./logo.png" />
                </div>
                <div>

                    <a href="index.php">
                        <i class="fa-solid fa-house" style="color: #5da2c0;"></i>
                        Accueil
                    </a>
                </div>
                <div>
                    <a href="myProfile.php">
                        <i class="fa-solid fa-user" style="color: #41a4c3;"></i>
                        Mon profil
                    </a>
                </div>
                <div>
                    <a href="deconnection.php">
                        <i class="fa-solid fa-right-from-bracket" style="color: #41a4c3;"></i> Se déconnecter
                    </a>
                </div>
                <div>
                    <a href="deposer_annonce.php">
                        <i class="fa-solid fa-pencil" style="color: #41a4c3;"></i> Poster une annonce &nbsp
                    </a>
                </div>
            </div>
        </nav>
    <?php
    } else {
    ?>
        <nav>
            <div class="navbar">
                <div class="mainLogo">
                    <img src="./logo.png" />
                </div>
                <div>
                    <a href="index.php">
                        <i class="fa-solid fa-house" style="color: #5da2c0;"></i>
                        Accueil
                    </a>
                </div>
                <div>
                    <a href="registration_user.php">
                        <i class="fa-solid fa-plus" style="color: #41a4c3;"></i> S'inscrire
                    </a>
                </div>
                <div>
                    <a href="connection.php">
                        <i class="fa-solid fa-right-to-bracket" style="color: #41a4c3;"></i> Se connecter
                    </a>
                </div>
                <div>
                    <a href="deposer_annonce.php">
                        <i class="fa-solid fa-pencil" style="color: #41a4c3;"></i> Poster une annonce &nbsp
                    </a>
                </div>
            </div>
        </nav>
    <?php  }
    ?>

</body>

</html>
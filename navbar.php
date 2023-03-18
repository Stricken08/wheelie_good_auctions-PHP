<?php
require_once __DIR__ . "/loginSuccess.php";
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && $_SESSION["email"] && $_SESSION["password"]) {
    echo "<nav>
    <div class=\"navbar\">
        <div class=\"mainLogo\">
            <img src=\"./logo.png\" />
        </div>
        <div class=\"accueil\">
            <a href=\"index.php\" class=\"link\">
                Accueil
            </a>
        </div>

        <div class=\"Connexion\">
            <a href=\"deconnection.php\" class=\"link\">
                Se déconnecter
            </a>
        </div>
        <div class=\"poster\">
            <a href=\"deposer_annonce.php\" class=\"link\">Poster une annonce &nbsp </a>
        </div>

    </div>
</nav>";
} else {

    echo "  <nav>
    <div class=\"navbar\">
        <div class=\"mainLogo\">
            <img src=\"./logo.png\" />
        </div>
        <div class=\"accueil\">
            <a href=\"index.php\" class=\"link\">
                Accueil
            </a>
        </div>
        <div class=\"inscription\">
            <a href=\"registration_user.php\" class=\"link\">
                S'inscrire
            </a>
        </div>
        <div class=\"Connexion\">
            <a href=\"connection.php\" class=\"link\">
                Se connecter
            </a>
        </div>
        <div class=\"poster\">
            <a href=\"deposer_annonce.php\" class=\"link\">Poster une annonce &nbsp </a>
        </div>

    </div>
</nav>";
}

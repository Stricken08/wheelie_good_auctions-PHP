<?php
class Users
{
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public function __construct($nom, $prenom, $email, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
    }

    public function addUser()
    {
        $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
        $query = $dbh->prepare("INSERT INTO `users`( `lastname`, `firstname`, `email`, `mdp`) VALUES (:lastname,:firstname,:email,:mdp)");
        $query->bindValue(':lastname', $_POST["lastname"], PDO::PARAM_STR);
        $query->bindValue(':firstname', $_POST["firstname"], PDO::PARAM_STR);
        $query->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
        $query->bindValue(':mdp', $_POST["password"], PDO::PARAM_STR);
        $query->execute();
    }
    public function renderUser()
    {
        echo "<h2>Votre Compte a bien été crée</h2>";
        echo "<h3>Nom: " . $_POST["lastname"] . "</h3>";
        echo "<h3>Prenom: " . $_POST["firstname"] . "</h3>";
        echo "<h3>email: " . $_POST["email"] . "</h3>";
    }
}

$user = new Users($_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["password"]);
$user->addUser();
$user->renderUser();

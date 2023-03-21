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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
            $query = $dbh->prepare("INSERT INTO `users`( `lastname`, `firstname`, `email`, `password`) VALUES (:lastname,:firstname,:email, :password)");
            $query->bindValue(':lastname', $_POST["lastname"], PDO::PARAM_STR);
            $query->bindValue(':firstname', $_POST["firstname"], PDO::PARAM_STR);
            $query->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
            $query->bindValue(':password', $_POST["password"], PDO::PARAM_STR);
            $query->execute();
        }
    }
    public function renderUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2> Votre compte a bien été créé </h2>";
            echo "<p>Nom de famille: " . $_POST["lastname"] . "</p>";
            echo "<p>Prénom: " . $_POST["firstname"] . "</p>";
            echo "<p>Email: " . $_POST["email"] . "</p>";
            header('Refresh: 3; URL=http://localhost:8888/enchere/connection.php');
        }
    }
    public static function updateProfile($id)
    {
        $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
        $query = $dbh->prepare("SELECT * from `users` WHERE id=:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();;
        // echo "<h2>Mes informations personnelles</h2>";
        // echo "<p>Nom de famille: " . $result["lastname"] . "</p>";
        // echo "<p>Prénom: " . $result["firstname"] . "</p>";
        // echo "<p>Email: " . $result["email"] . "</p>";
    }
}

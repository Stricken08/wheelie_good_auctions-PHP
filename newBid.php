<form action="annonceDetails.php" method="POST">
    <label for="newBid">Votre enchère:</label>
    <br>
    <input type="text" name="newBid" id="newBid">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbh = new PDO("mysql:dbname=mini_projet_enchere;host=127.0.0.1;port=8889", "root", "root");
    $query = $dbh->prepare("UPDATE `annonces` SET `new_price`=:new_price WHERE `id`=:id");
    $query->bindValue(':new_price', $_POST["newBid"], PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
}
?>
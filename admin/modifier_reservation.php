<?php

// $bdd : Connexion à la base de données SQLite
include "../includes/base.php";
$location = "../connexion.php";
verifierConnexion($location);

if (empty($_POST)) {
    // id dans l'url
    $id = $_GET["id"];

    $sql = "
        SELECT *
        FROM reservations
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    // Donne le $id à la requête
    $stmt->execute([
        ":id" => $id,
    ]);

    // Récupère le repas à modifier pour afficher les valeurs initiales 
    $reservation = $stmt->fetch();
} else {
    //Traitement du form
    //Variables postées du formulaire
    $id = $_POST["id"];
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $nb = $_POST["nb"];
    $temps = $_POST["temps"];
    $jour = $_POST["jour"];


    $sql = "
        SELECT *
        FROM reservations
        WHERE id = :id
        ";

    $stmt = $bdd->prepare($sql);
    // Donne le $id à la requête
    $stmt->execute([
        ":id" => $id,
    ]);

    $reservation = $stmt->fetch();

    $sql = "
        UPDATE reservations
        SET id = :id, type = :type, nom = :nom, nb = :nb, temps = :temps, jour = :jour
        WHERE id = :id
        ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
        ":type" => $type,
        ":nom" => $nom,
        ":nb" => $nb,
        ":temps" => $temps,
        ":jour" => $jour
    ]);

    header("location: modifier_reservation.php?id=$id");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une réservation</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>

<body>
    <h1>Zone admin</h1>
    <nav>
        <a class="changement_page" href="index.php"> Accueil </a>
        <a class="changement_page" href="repas/repas.php"> Gérer repas </a>
        <a class="changement_page" href="employes/gestion_admin.php"> Gérer admins </a>
        <a class="deconnexion" href="deconnexion.php"> Deconnexion </a>
    </nav>
    <h2>Modifier une réservation</h2>

    <form action="modifier_reservation.php" method="post">
        <input type="hidden" name="id" value="<?= $reservation["id"] ?>">
        <div>
            <p>Nom:</p>
            <input name="nom" type="text" value="<?= $reservation["nom"] ?>">
        </div>

        <div>
            <p>Nombre de personnes:</p>
            <input name="nb" type="number" min="1" max="20" step="1" value="<?= $reservation["nb"] ?>">
        </div>

        <div>
            <p>Heure:</p>
            <Select name="temps">
                <option value="<?= $reservation["temps"] ?>"><?= $reservation["temps"] ?></option>
                <option value="08:00">8H</option>
                <option value="08:30">8H30</option>
                <option value="09:00">9H</option>
                <option value="09:30">9H30</option>
                <option value="10:00">10H</option>
                <option value="10:30">10H30</option>
                <option value="11:00">11H</option>
                <option value="11:30">11H30</option>
                <option value="12:00">12H</option>
                <option value="12:30">12H30</option>
                <option value="13:00">13H</option>
                <option value="13:30">13H30</option>
                <option value="14:00">14H</option>
                <option value="14:30">14H30</option>
                <option value="15:00">15H</option>
                <option value="15:30">15H30</option>
                <option value="16:00">16H</option>
                <option value="16:30">16H30</option>
                <option value="17:00">17H</option>
                <option value="17:30">17H30</option>
                <option value="18:00">18H</option>
                <option value="18:30">18H30</option>
                <option value="19:00">19H</option>
                <option value="19:30">19H30</option>
                <option value="20:00">20H</option>
                <option value="20:30">20H30</option>
            </Select>
        </div>

        <div>
            <p>Jour:</p>
            <select name="jour">
                <option value="<?= $reservation["jour"] ?>"><?= $reservation["jour"] ?></option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
                <option value="Dimanche">Dimanche</option>
            </select>
        </div>

        <div>
            <p>Type</p>
            <select name="type">
                <option value="<?= $reservation["type"] ?>"><?= $reservation["type"] ?></option>
                <option value="regulier">Réservation régulière</option>
                <option value="option1">Table d'hôte option 1</option>
                <option value="option2">Table d'hôte option 2</option>
                <option value="option3">Table d'hôte option 3</option>
                <option value="7services">Menu 7 services</option>
            </select>
        </div>

        <div>
            <input class="modifier" type="submit" value="Modifier">
        </div>
    </form>
</body>

</html>
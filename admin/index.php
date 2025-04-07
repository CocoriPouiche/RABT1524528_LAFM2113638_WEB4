<?php

    include "../includes/base.php";

    $sql = "
    SELECT id, nom, nb, temps
    FROM reservations
    ";
    // Liste de toutes les réservations
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $les_reservations = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone admin</title>
    <link rel="stylesheet" href="../css/style_admin.css">
</head>
<body>
    <header>
        <h1>Zone admin</h1>
        <nav>
            <a class="changement_page" href="index.php"> Accueil </a>
            <a class="changement_page" href="repas/repas.php"> Gérer repas </a>
            <a class="changement_page" href="employes/gestion_admin.php"> Gérer admins </a>
            <a class="deconnexion" href="deconnexion.php"> Deconnexion </a>
        </nav>
    </header>
    <main>
        <p class="bienvenu">
            Bienvenu dans l'administration du site
        </p>

        <div class="conteneur">
            <div class="reservations">
                <h2>Réservations</h2>
                <?php foreach ($les_reservations as $une_reservation): ?>
                    <div class="une-reservation">
                        <p><?= $une_reservation["nom"]?></p>
                        <p><?= $une_reservation["nb"]?></p>
                        <p><?= $une_reservation["temps"]?></p>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="statistiques">
                <h2>Statistiques</h2>
                <p>ette</p>
            </div>
        </div>
    </main>
</body>
</html>


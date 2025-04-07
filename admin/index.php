<?php

    include "../includes/base.php";

    $nb_reservations = selectCount("reservations");
    $nb_reservations_par_page = 6;
    $nb_page_reservations_total = ceil($nb_reservations / $nb_reservations_par_page);
    $page_reservations = $_GET["page"] ?? 1;

    $sql = "
    SELECT id, nom, nb, temps
    FROM reservations
    LIMIT :limit
    OFFSET :offset
    ";
    // Liste de toutes les réservations
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":limit" => $nb_reservations_par_page,
        ":offset" => ($page_reservations - 1) * $nb_reservations_par_page
    ]);
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
                <p class="titre-section">Réservations</p>
                <?php foreach ($les_reservations as $une_reservation): ?>
                    <div class="une-reservation">
                        <p>Nom : <?= $une_reservation["nom"]?></p>
                        <p>Nombre de personnes : <?= $une_reservation["nb"]?></p>
                        <p>Heure : <?= $une_reservation["temps"]?></p>
                    </div>
                <?php endforeach ?>
                <div class="boutons">
                    <?php if ($page_reservations > 1): ?>
                        <a class="btn-reserver" href="index.php?page=<?= $page_reservations - 1?>">Précédent</a>
                    <?php else: ?>
                        <a href="" class="inactif">Précédent</a>
                    <?php endif ?>
                    <?php if ($page_reservations < $nb_page_reservations_total): ?>
                        <a class="btn-reserver" href="index.php?page=<?= $page_reservations + 1?>">Suivant</a>
                    <?php else: ?>
                        <a href="" class="inactif">Suivant</a>
                    <?php endif ?>
                </div>
                <p>Page <?= $page_reservations ?> de <?= $nb_page_reservations_total ?></p>
                <a  class="btn-reserver" href="index.php?exporter">Exporter</a>
            </div>

            <div class="statistiques">
                <p class="titre-section">Statistiques</p>
                <div class="une-statistique">
                    <p>Page : Accueil</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
                <div class="une-statistique">
                    <p>Page : Entrées</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
                <div class="une-statistique">
                    <p>Page : Plats principaux</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
                <div class="une-statistique">
                    <p>Page : Desserts</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
                <div class="une-statistique">
                    <p>Page : Cave à vin</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
                <div class="une-statistique">
                    <p>Page : Réservations</p>
                    <p class="nb-vues">Nombre de vues : 666</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


<?php

    include "../includes/base.php";
    $location = "connexion.php";
    verifierConnexion($location);

    if (isset($_GET["supprimer"])) {
        $sql = "
        DELETE  FROM reservations
        WHERE id = :id
    ";
        // Supprime l'élément avec le bon id
        $stmt = $bdd->prepare($sql);
        $stmt->execute([
            ":id" => $_GET["supprimer"]
        ]);
        // Redirection vers la liste après (soi-même) (pour retirer ?supprimer[id] de l'URL pour empêcher de potentiels problèmes)
        header("location: index.php?suppression=1");
    }

    $nb_reservations = selectCount("reservations");
    $nb_reservations_par_page = 6;
    $nb_page_reservations_total = ceil($nb_reservations / $nb_reservations_par_page);
    $page_reservations = $_GET["page"] ?? 1;

    $sql = "
    SELECT id, jour, type, nom, nb, temps
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

    $sql = "
    SELECT *
    FROM vues
    ORDER BY nb DESC
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $pages = $stmt->fetchAll();
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
                        <div class="reservation-infos">
                            <p class="res-type">Type : <?= $une_reservation["type"]?></p>
                            <p class="res-nom">Nom : <?= $une_reservation["nom"]?></p>
                            <p class="res-nb">Nombre de personnes : <?= $une_reservation["nb"]?></p>
                            <p class="res-heure">Heure : <?= $une_reservation["temps"]?></p>
                            <p class="res-jour">Jour : <?= $une_reservation["jour"]?></p>
                        </div>
                        <div class="btn-reservation">
                            <a class="modifier" href="modifier_reservation.php?id=<?= $une_reservation['id']?>">Modifier</a>
                            <a class="supprimer" href="index.php?supprimer=<?= $une_reservation['id']?>">Supprimer</a>
                        </div>
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
                <form class="form-telecharger" action="telechargerCSV.php" method="post">
                    <button class="telecharger" type="submit">Télécharger</button>
                </form>
            </div>

            <div class="statistiques">
                <p class="titre-section">Statistiques</p>
                <?php foreach ($pages as $page): ?>
                    <div class="une-statistique">
                        <p>Page : <?= $page["page"] ?></p>
                        <p class="nb-vues"> Nombre de vues : <?= $page["nb"] ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>
</body>
</html>


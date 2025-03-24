<?php

    // $bdd : Connexion à la base de données SQLite
    include "../../includes/base.php";
    $location = "../connexion.php";
    verifierConnexion($location);

    /**
     * Affiche la liste des repas
     * 
     * Chaque repas aura un bouton modifier et supprimer
     * 
     * Si la page est appelée avec un ?supprimer= dans l'URL, 
     * c'est qu'on vient d'appuyer sur un bouton supprimer
     */
    // Si le paramètre GET supprimer existe dans l'URL
    if (isset($_GET["supprimer"])) {
        $sql = "
        DELETE  FROM repas
        WHERE id = :id
    ";
        // Supprime l'élément avec le bon id
        $stmt = $bdd->prepare($sql);
        $stmt->execute([
            ":id" => $_GET["supprimer"]
        ]);
        // Redirection vers la liste après (soi-même) (pour retirer ?supprimer[id] de l'URL pour empêcher de potentiels problèmes)
        header("location: repas.php");
    }

    $sql = "
    SELECT id, nom, ingredients, prix
    FROM repas
";
    // Liste de tous les repas
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $les_repas = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone admin</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>
<body>
    <header>
        <h1>Zone admin</h1>
        <nav>
            <a class="changement_page" href="../index.php"> Accueil </a>
            <a class="changement_page" href="repas.php"> Gérer repas </a>
            <a class="changement_page" href="../employes/gestion_admin.php"> Gérer admins </a>
            <a class="deconnexion" href="../deconnexion.php"> Deconnexion </a>
        </nav>
    </header>
    <main>
        <div class="tete_liste">
            <h2>Liste des repas</h2>
            <a class="ajout" href="ajouter.php"> Ajouter un repas</a>
        </div>
        <div class="les_items">
            <!-- Pour chaque $un_repas dans le tableau $les_repas -->
            <?php foreach ($les_repas as $un_repas): ?>
                <div class="un_item">
                    <?= $un_repas["id"]?>
                    <p class="partie_liste_repas"><strong>NOM :  </strong></p>
                    <p class="item_liste_repas"><?= $un_repas["nom"]?></p>
                    <p class="partie_liste_repas"><strong>INGRÉDIENTS :  </strong></p>
                    <p class="item_liste_repas"><?= $un_repas["ingredients"]?></p>
                    <p class="partie_liste_repas"><strong>PRIX :  </strong></p>
                    <p class="item_liste_repas"><?= $un_repas["prix"]?></p>
                    <!-- On donne le paramètre GET du id directement dans les liens -->
                    <a class="modifier" href="modifier_repas.php?id=<?= $un_repas['id']?>">Modifier</a>
                    <a class="supprimer" href="repas.php?supprimer=<?= $un_repas['id']?>">Supprimer</a>
                </div>
            <?php endforeach?>
            <div class="dernier_item"></div>
        </div>
    </main>
</body>
</html>


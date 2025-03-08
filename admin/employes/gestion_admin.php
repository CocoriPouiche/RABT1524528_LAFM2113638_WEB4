<?php

    // $bdd : Connexion à la base de données SQLite
    include "../../includes/base.php";

    VerifierConnexion();

    /**
     * Affiche la liste des admin
     * 
     * Chaque admin aura un bouton modifier et supprimer
     * 
     * Si la page est appelée avec un ?supprimer= dans l'URL, 
     * c'est qu'on vient d'appuyer sur un bouton supprimer
     */
    // Si le paramètre GET supprimer existe dans l'URL
    if (isset($_GET["supprimer"])) {
        $sql = "
        DELETE  FROM administrateurs
        WHERE id = :id
    ";
        // Supprime l'élément avec le bon id
        $stmt = $bdd->prepare($sql);
        $stmt->execute([
            ":id" => $_GET["supprimer"]
        ]
        );
        // Redirection vers la liste après (soi-même) (pour retirer ?supprimer[id] de l'URL pour empêcher de potentiels problèmes)
        header("location: gestion_admin.php");
    }

    $sql = "
    SELECT id, courriel, mdp
    FROM administrateurs
";
    // Liste de tous les admins
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $les_admins = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone admin</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>
        <div>
            <p>
                <a class="deconnexion" href="deconnexion.php">
                    Deconnexion
                </a>
            </p>
            
        </div>
        <h1>Zone admin</h1>
        <nav>
            <a class="changement_page" href="../index.php"> Accueil </a>
            <a class="changement_page" href="../repas/repas.php"> Liste des repas </a>
            <a class="changement_page" href="gestion_admin.php"> Gérer admins </a>
        </nav>
        <p>
            <a class="ajout" href="creer_administrateur.php">
                Créer un administrateur
            </a>
        </p>

    </header>
    <main>
        <h2>Liste des administrateurs</h2>
        <div class="les_admins">
            <!-- Pour chaque $un_admin dans le tableau $les_admins -->
            <?php foreach ($les_admins as $un_admin): ?>
                <div class="un_admin">
                    <?= $un_admin["id"]?>
                    <?= $un_admin["courriel"]?>
                    <?= $un_admin["mdp"]?>
                    <!-- On donne le paramètre GET du id directement dans les liens -->
                     <!-- Modifier le bouton modifier en lui ajoutant un lien vers la page modifier_admin.php -->
                    <a class="modifier" href="modifier_admin.php?id=<?= $un_admin['id']?>">Modifier</a>
                    <a class="supprimer" href="gestion_admin.php?supprimer=<?= $un_admin['id']?>">Supprimer</a>
                </div>
            <?php endforeach?>
        </div>
    </main>
</body>
</html>


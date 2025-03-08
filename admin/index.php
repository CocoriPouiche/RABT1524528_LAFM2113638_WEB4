<?php

    // $bdd : Connexion à la base de données SQLite
    include "../includes/base.php";

    VerifierConnexion();

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
        ]
        );
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
    <link rel="stylesheet" href="../css/style.css">
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
            <a class="changement_page" href="index.php"> Accueil </a>
            <a class="changement_page" href="repas/repas.php"> Liste des repas </a>
            <a class="changement_page" href="employes/gestion_admin.php"> Gérer admins </a>
        </nav>
    </header>
    <main>
    </main>
</body>
</html>


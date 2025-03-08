<?php

    // $bdd : Connexion à la base de données SQLite
    include "../../includes/base.php";
    
    VerifierConnexion();
    /**
     * Affiche un formulaire pour ajouter une entrée
     * 
     * Si la page est appelée avec des valeurs dans le POST, 
     * on traite les données et redirige vers la liste
     */

    // Si le formulaire est envoyé
    if (!empty($_POST)) {
        // Sauvegarde les valeurs du POST dans des variables
        $categorie_id      = $_POST["categorie_id"];
        $sous_categorie_id = $_POST["sous_categorie_id"];
        $nom               = $_POST["nom"];
        $ingredients       = $_POST["ingredients"];
        $prix              = $_POST["prix"];

        $sql = "
        INSERT INTO repas (categorie_id, sous_categorie_id, nom, ingredients, prix)
        VALUES (:categorie_id, :sous_categorie_id, :nom,:ingredients, :prix)
    ";

        $stmt = $bdd->prepare($sql);
        // Insère les variables dans la requête SQL
        $stmt->execute([
            ":categorie_id"      => $categorie_id,
            ":sous_categorie_id" => $sous_categorie_id,
            ":nom"               => $nom,
            ":ingredients"       => $ingredients,
            ":prix"              => $prix,
        ]);

        // Redirection vers repas.php
        header("location: repas.php");
        }

        $sql = "
        SELECT *
        FROM categories
    ";
    
        $stmt = $bdd->prepare($sql);
        // Donne le $id à la requête
        $stmt->execute([]);
    
        // Récupère les catégories
        $categories = $stmt->fetchAll();

        $sql = "
        SELECT *
        FROM sous_categories
    ";
    
        $stmt = $bdd->prepare($sql);
        // Donne le $id à la requête
        $stmt->execute([]);
    
        // Récupère les catégories
        $sous_categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un repas</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>
<body>
    <h1>Zone admin</h1>
    <nav>
        <a class="changement_page" href="../index.php"> Accueil </a>
        <a class="changement_page" href="repas.php"> Liste des repas </a>
        <a class="changement_page" href="../employes/gestion_admin.php"> Gérer admins </a>
        <a class="deconnexion" href="deconnexion.php"> Deconnexion </a>
    </nav>
    <h2>Ajouter</h2>

    <!-- action: La page qui reçoit les infos (soi-même) -->
    <!-- method: le type d'envoi -->
    <form action="ajouter.php" method="post">

        <select name="categorie_id"><!-- deviendra $_POST["categorie_id"] -->
        <?php foreach ($categories as $categorie): ?>
            <option
                value="<?= $categorie["id"] ?>"> <?= $categorie["nom"] ?>
            </option>
        <?php endforeach ?>
        </select>

        <select name="sous_categorie_id"><!-- deviendra $_POST["sous_categorie_id"] -->
            <option value="null"></option>
            <?php foreach ($sous_categories as $sous_categorie): ?>
                <option
                    value="<?= $sous_categorie["id"] ?>"> <?= $sous_categorie["nom"] ?>
                </option>
            <?php endforeach ?>
        </select>

        <p>Nom: </p>
        <input name="nom" type="text" ><!-- deviendra $_POST["nom"] -->

        <p>Ingrédients: </p>
        <input name="ingredients" type="text" ><!-- deviendra $_POST["ingredients"] -->

        <p>Prix: </p>
        <input name="prix" type="text" ><!-- deviendra $_POST["prix"] -->

        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>
</body>
</html>

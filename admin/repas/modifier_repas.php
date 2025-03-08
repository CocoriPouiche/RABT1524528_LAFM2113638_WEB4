<?php

    // $bdd : Connexion à la base de données SQLite
    include "../../includes/base.php";
    
    VerifierConnexion();
    
    /**
     * Affiche un formulaire pour modifier un repas
     * 
     * Le id du repas est envoyé dans l'URL au format ?id=XXX
     * 
     * Si la page est appelée avec des valeurs dans le POST, 
     * on traite les données et redirige vers la liste
    */
    if (empty($_POST)) {
        // id dans l'url
        $id = $_GET["id"];
    
        $sql = "
        SELECT *
        FROM repas
        WHERE id = :id
    ";
    
        $stmt = $bdd->prepare($sql);
        // Donne le $id à la requête
        $stmt->execute([
            ":id" => $id,
        ]);
    
        // Récupère le repas à modifier pour afficher les valeurs initiales 
        $repas = $stmt->fetch();

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

    }
    else {
        //Traitement du form
        //Variables postées du formulaire
        $id = $_POST["id"];
        $categorie_id = $_POST["categorie_id"];
        $sous_categorie_id = $_POST["sous_categorie_id"];
        $nom = $_POST["nom"];
        $ingredients       = $_POST["ingredients"];
        $prix = $_POST["prix"];
        
        //Pour ajouter des données dans la TABLE repas de la base de données
        $sql = "
            UPDATE repas
            SET id = :id, categorie_id = :categorie_id, sous_categorie_id = :sous_categorie_id, nom = :nom, ingredients = :ingredients, prix = :prix
            WHERE id = :id
        ";


        // WHERE id = :id pour limiter la modification au repas voulu
        $stmt = $bdd->prepare($sql);
        $stmt->execute([ 
            ":id" => $id,
            ":categorie_id" => $categorie_id,
            ":sous_categorie_id" => $sous_categorie_id,
            ":nom" => $nom,
            ":ingredients" => $ingredients,
            ":prix" => $prix
        ]);

        // Redirection
        header("location: repas.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un repas</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>
<body>
    <h1>Zone admin</h1>
    <nav>
        <a class="changement_page" href="../index.php"> Accueil </a>
        <a class="changement_page" href="repas.php"> Gérer repas </a>
        <a class="changement_page" href="../employes/gestion_admin.php"> Gérer admins </a>
        <a class="deconnexion" href="deconnexion.php"> Deconnexion </a>
    </nav>
    <h2>Modifier un repas</h2>
    <form action="modifier_repas.php" method="post">
        <!-- Input caché pour transférer le id -->
        <!-- L'attribut value="" permet d'avoir une valeur par défaut -->
        <input name="id" type="hidden" value="<?= $repas["id"]?>">

        <select name="categorie_id">
        <?php foreach ($categories as $categorie): ?>
            <option
                value="<?= $categorie["id"] ?>"<?php if ($repas["categorie_id"] == $categorie["id"]): ?>selected<?php endif ?>> <?= $categorie["nom"] ?>
            </option>
        <?php endforeach ?>
        </select>

        <select name="sous_categorie_id">
            <option value="null"></option>
        <?php foreach ($sous_categories as $sous_categorie): ?>
            <option
                value="<?= $sous_categorie["id"] ?>"<?php if ($repas["sous_categorie_id"] == $sous_categorie["id"]): ?>selected<?php endif ?>> <?= $sous_categorie["nom"] ?>
            </option>
        <?php endforeach ?>
        </select>

        <p>Nom: </p>
        <input name="nom" type="text" value="<?= $repas["nom"]?>">

        <p>Ingrédients: </p>
        <input name="ingredients" type="text"  value="<?= $repas["ingredients"]?>">

        <p>Prix: </p>
        <input name="prix" type="text"  value="<?= $repas["prix"]?>">
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>

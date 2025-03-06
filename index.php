<?php

    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

    // === Récupère tous repas selon leur catégorie et sous catégorie
    $sql = "
    SELECT *
    FROM categories
    INNER JOIN repas ON categories.id = repas.categorie_id
    WHERE repas.categorie_id = '1'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $entrees = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '1'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $plats_viandes = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '2'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $plats_poissons = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '3'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $plats_vegetariens = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM categories
    INNER JOIN repas ON categories.id = repas.categorie_id
    WHERE repas.categorie_id = '5'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $desserts = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '4'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $vins_blancs = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '5'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $vins_rouges = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '6'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $vins_oranges = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '7'
    ORDER BY repas.nom
";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $vins_mousseux = $stmt->fetchAll();

    $sql = "
    SELECT *
    FROM sous_categories
    INNER JOIN repas ON sous_categories.id = repas.sous_categorie_id
    WHERE repas.sous_categorie_id = '8'
    ORDER BY repas.nom
";

$stmt = $bdd->prepare($sql);
$stmt->execute();
$vins_spiritueux = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test DB Browser(Base de données)</title>
</head>
<body>
        <!-- Pour chaque $entree dans le tableau $entrees -->
        <h3>Entrées</h3>
        <?php foreach ($entrees as $entree): ?>
            <p>
                <strong><?= $entree["nom"]?></strong> <?= $entree["ingredients"]?>  <?= $entree["prix"]?>
            </p>
        <?php endforeach?>
        
        <!-- Pour chaque $plat_viande dans le tableau $plats_viandes -->
        <h3>Plats principaux - viande</h3>
        <?php foreach ($plats_viandes as $plat_viande): ?>
            <p>
                <strong><?= $plat_viande["nom"]?></strong> <?= $plat_viande["ingredients"]?>  <?= $plat_viande["prix"]?>
            </p>
        <?php endforeach?>
        
        <!-- Pour chaque $plat_poisson dans le tableau $plats_poissons -->
        <h3>Plats principaux - poissons et fruits de mer</h3>
        <?php foreach ($plats_poissons as $plat_poisson): ?>
            <p>
                <strong><?= $plat_poisson["nom"]?></strong> <?= $plat_poisson["ingredients"]?>  <?= $plat_poisson["prix"]?>
            </p>
        <?php endforeach?>
        
        <!-- Pour chaque $plat_vegetarien dans le tableau $plats_vegetariens -->
        <h3>Plats principaux - végétarien</h3>
        <?php foreach ($plats_vegetariens as $plat_vegetarien): ?>
            <p>
                <strong><?= $plat_vegetarien["nom"]?></strong> <?= $plat_vegetarien["ingredients"]?>  <?= $plat_vegetarien["prix"]?>
            </p>
        <?php endforeach?>
        
        <!-- Pour chaque $dessert dans le tableau $desserts -->
        <h3>Desserts</h3>
        <?php foreach ($desserts as $dessert): ?>
            <p>
                <strong><?= $dessert["nom"]?></strong> <?= $dessert["ingredients"]?>  <?= $dessert["prix"]?>
            </p>
        <?php endforeach?>
        
        <h3>Cave à vin:</h3>

        <!-- Pour chaque $vin_blanc dans le tableau $vins_blancs -->
        <h4>-Blanc</h4>
        <?php foreach ($vins_blancs as $vin_blanc): ?>
            <p>
                <strong><?= $vin_blanc["nom"]?></strong> <?= $vin_blanc["ingredients"]?>  <?= $vin_blanc["prix"]?>
            </p>
        <?php endforeach?>

        <!-- Pour chaque $vin_rouge dans le tableau $vins_rouges -->
        <h4>-Rouge</h4>
        <?php foreach ($vins_rouges as $vin_rouge): ?>
            <p>
                <strong><?= $vin_rouge["nom"]?></strong> <?= $vin_rouge["ingredients"]?>  <?= $vin_rouge["prix"]?>
            </p>
        <?php endforeach?>

        <!-- Pour chaque $vin_orange dans le tableau $vins_oranges -->
        <h4>-Orange et nature</h4>
        <?php foreach ($vins_oranges as $vin_orange): ?>
            <p>
                <strong><?= $vin_orange["nom"]?></strong> <?= $vin_orange["ingredients"]?>  <?= $vin_orange["prix"]?>
            </p>
        <?php endforeach?>

        <!-- Pour chaque $vin_mousseux dans le tableau $vins_mousseux -->
        <h4>-Mousseux</h4>
        <?php foreach ($vins_mousseux as $vin_mousseux): ?>
            <p>
                <strong><?= $vin_mousseux["nom"]?></strong> <?= $vin_mousseux["ingredients"]?>  <?= $vin_mousseux["prix"]?>
            </p>
        <?php endforeach?>

        <!-- Pour chaque $vin_spiritueux dans le tableau $vins_spiritueux -->
        <h4>-Spiritueux et digestifs</h4>
        <?php foreach ($vins_spiritueux as $vin_spiritueux): ?>
            <p>
                <strong><?= $vin_spiritueux["nom"]?></strong> <?= $vin_spiritueux["ingredients"]?>  <?= $vin_spiritueux["prix"]?>
            </p>
        <?php endforeach?>
</body>
</html>
<?php
    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

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
    SELECT nb
    FROM vues
    WHERE id = 3
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $nb_vues_plats_principaux = $stmt->fetch();

    $nb = $nb_vues_plats_principaux["nb"] += 1;

    $stmt = $bdd->prepare("
    UPDATE vues
    SET nb = $nb
    WHERE id= 3
    ");
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Les Rives Boréales - Plats Principaux</title>
</head>

<body>
    <header class="Header-principaux">
        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <h1 class="t-principeaux">Plats Principaux</h1>
    </header>
   
    <h2 class="section-title">Section Viande</h2>
     
    <main class="Main-principaux">

        <!-- Section Plats de Viande -->
        <section class="section-plats">

            <?php foreach ($plats_viandes as $plat_viande): ?>
                <div class="plat-item">
                    <img src="<?= $plat_viande["url_image"] ?>" alt="Filet de cerf">
                    <h3 class="plat-name"><?= $plat_viande["nom"]?></h3>
                    <p class="plat-description"><?= $plat_viande["ingredients"]?></p>
                    <p class="plat-price"><?= $plat_viande["prix"]?></p>
                </div>
            <?php endforeach?>

        </section>

        <h2 class="section-title">Section Poissons et Fruits de Mer</h2>
        
        <!-- Section Plats de Poisson et Fruits de Mer -->
        <section class="section-plats">

            <?php foreach ($plats_poissons as $plat_poisson): ?>
                <div class="plat-item">
                    <img src="<?= $plat_poisson["url_image"] ?>" alt="Filet de cerf">
                    <h3 class="plat-name"><?= $plat_poisson["nom"]?></h3>
                    <p class="plat-description"><?= $plat_poisson["ingredients"]?></p>
                    <p class="plat-price"><?= $plat_poisson["prix"]?></p>
                </div>
            <?php endforeach?>

        </section>

        <h2 class="section-title">Pour les Végétariens!</h2>
        
        <!-- Section Plats Végétariens -->
        <section class="section-plats">

            <?php foreach ($plats_vegetariens as $plat_vegetarien): ?>
                <div class="plat-item">
                    <img src="<?= $plat_vegetarien["url_image"] ?>" alt="Filet de cerf">
                    <h3 class="plat-name"><?= $plat_vegetarien["nom"]?></h3>
                    <p class="plat-description"><?= $plat_vegetarien["ingredients"]?></p>
                    <p class="plat-price"><?= $plat_vegetarien["prix"]?></p>
                </div>
            <?php endforeach?>

        </section>

    </main>

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>

    <script src="Javascript/Navigation.js"></script>

</body>
</html>

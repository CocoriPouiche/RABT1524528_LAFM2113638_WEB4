<?php

    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

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

    $sql = "
	SELECT nb
    FROM vues
	WHERE id = 5
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $nb_vues_cave_a_vin = $stmt->fetch();

    $nb = $nb_vues_cave_a_vin["nb"] += 1;

    $stmt = $bdd->prepare("
    UPDATE vues
    SET nb = $nb
    WHERE id= 5
    ");
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue:wght@400..700&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <title>Les Rives Boréales - Cave à Vin</title>
</head>
<body>
    <header class="Header-CaveAVin">
        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

        <h1 class="t-vin">Cave à vin</h1>
    </header>

    <h2 class="section-title-dessert"><a href="index.php">Accueil</a> / Cave à vin</h2>
    
    <main class="main-vins">
        <section class="vin-section">
            <div class="vin-titre">Vin Blanc</div>
            <?php foreach ($vins_blancs as $vin_blanc): ?>
                <div class="vin-item">
                    <div class="vin-nom"><?= $vin_blanc["nom"]?></div>
                    <div class="vin-prix"><?= $vin_blanc["prix"]?></div>
                </div>
            <?php endforeach?>
        </section>
    
        <section class="vin-section">
            <div class="vin-titre">Vin Rouge</div>
            <?php foreach ($vins_rouges as $vin_rouge): ?>
                <div class="vin-item">
                    <div class="vin-nom"><?= $vin_rouge["nom"]?></div>
                    <div class="vin-prix"><?= $vin_rouge["prix"]?></div>
                </div>
            <?php endforeach?>
        </section>
    
        <section class="vin-section">
            <div class="vin-titre">Vin Orange et Nature</div>
            
            <?php foreach ($vins_oranges as $vin_orange): ?>
                <div class="vin-item">
                    <div class="vin-nom"><?= $vin_orange["nom"]?></div>
                    <div class="vin-prix"><?= $vin_orange["prix"]?></div>
                </div>
            <?php endforeach?>
        </section>
    
        <section class="vin-section">
            <div class="vin-titre">Vin Mousseux</div>
            
            <?php foreach ($vins_mousseux as $vin_mousseux): ?>
                <div class="vin-item">
                    <div class="vin-nom"><?= $vin_mousseux["nom"]?></div>
                    <div class="vin-prix"><?= $vin_mousseux["prix"]?></div>
                </div>
            <?php endforeach?>
        </section>
    
        <section class="vin-section">
            <div class="vin-titre">Vin Spiritueux et Digestifs</div>
            
            <?php foreach ($vins_spiritueux as $vin_spiritueux): ?>
                <div class="vin-item">
                    <div class="vin-nom"><?= $vin_spiritueux["nom"]?></div>
                    <div class="vin-prix"><?= $vin_spiritueux["prix"]?></div>
                </div>
            <?php endforeach?>
        </section>
    </main>
    

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>

    <script src="js/navigation.js"></script>

</body>
</html>

<?php
    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Les Rives Boréales - Entrées</title>
</head>
<body>
    <header class="header-entrees">

        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        
        <h1 class="t-entrees">Entrées</h1>

    </header>
    
    <h2 class="section-title-dessert">Accueil / Entrées</h2>

    <main class="Main-LesEntrees">

        <section class="section-DesEntrees">

            <?php foreach ($entrees as $entree): ?>
                <div class="plat-item">
                    <img src="<?= $entree["url_image"] ?>" alt="Entrees">
                    <h3 class="plat-name"><?= $entree["nom"]?></h3>
                    <p class="plat-description"><?= $entree["ingredients"]?></p>
                    <p class="plat-price"><?= $entree["prix"]?></p>
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

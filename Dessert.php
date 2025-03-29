<?php
    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Les Rives Boréales - Desserts</title>
</head>
<body>
    <header class="Header-dessert">

        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        
        <h1 class="t-desserts">Desserts</h1>
    </header>
    
    <main class="Main-dessert">

        <section class="section-dessert">

            <h2 class="section-title">Les Desserts</h2>
            <?php foreach ($desserts as $dessert): ?>
                <div class="plat-item">
                    <img src="<?= $dessert["url_image"] ?>" alt="Desserts">
                    <h3 class="plat-name"><?= $dessert["nom"]?></h3>
                    <p class="plat-description"><?= $dessert["ingredients"]?></p>
                    <p class="plat-price"><?= $dessert["prix"]?></p>
                </div>
            <?php endforeach?>
        </section>

    </main>

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>
</body>
</html>

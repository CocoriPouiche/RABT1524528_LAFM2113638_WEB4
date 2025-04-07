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
            
            <!-- <div class="plat-item">
                <img src="/assets/images/jpg/FiletDeCerfs.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Filet de cerf, sauce aux baies de sureau, purée de pommes de terre fumées</h3>
                <p class="plat-description">Cerf sauvage, sureau, pommes de terre fumées</p>
                <p class="plat-price">42$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/MargetDeCanard.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Magret de canard, réduction de bleuets sauvages et légumes racines</h3>
                <p class="plat-description">Canard fermier, bleuets, panais et carottes ancestrales</p>
                <p class="plat-price">38$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/BisonBraiser.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Côte de bison braisée, sauce au vin rouge et champignons forestiers</h3>
                <p class="plat-description">Bison des Prairies, champignons nordiques, vin rouge du Québec</p>
                <p class="plat-price">54$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/PouletFermier.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Poulet fermier rôti, sauce au miel de trèfle et thym sauvage</h3>
                <p class="plat-description">Poulet fermier, miel de trèfle, thym sauvage</p>
                <p class="plat-price">35$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/SanglerPave.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Pavé de sanglier, purée de topinambours et sauce au cassis</h3>
                <p class="plat-description">Sanglier du Québec, cassis, topinambours</p>
                <p class="plat-price">58$</p>
            </div> -->

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

            <!-- <div class="plat-item">
                <img src="/assets/images/jpg/FletanRoti.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Flétan rôti, beurre blanc aux herbes boréales</h3>
                <p class="plat-description">Flétan gaspésien, beurre blanc, livèche</p>
                <p class="plat-price">40$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/Petoncle.jpeg" alt="Filet de cerf">
                <h3 class="plat-name">Pétoncles poêlés, émulsion au sapin et crumble de pain nordique</h3>
                <p class="plat-description">Pétoncles, sapin, pain nordique</p>
                <p class="plat-price">45$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/SaumonMarine.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Saumon mariné, réduction de baies d’amélanchier</h3>
                <p class="plat-description">Saumon, baies d’amélanchier, miel brut</p>
                <p class="plat-price">38$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/MoruePoele.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Morue poêlée, purée de panais et huile de caméline</h3>
                <p class="plat-description">Morue de l’Atlantique, panais, huile de caméline</p>
                <p class="plat-price">44$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/MoulesGin.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Moules au gin boréal & frites et pain maison</h3>
                <p class="plat-description">Moules du Québec, gin boréal, pomme de terre du Québec, levain au seigle</p>
                <p class="plat-price">40$</p>
            </div> -->

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

            <!-- <div class="plat-item">
                <img src="/assets/images/jpg/RisottoChampi.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Risotto de champignons sauvages et huile de cèdre</h3>
                <p class="plat-description">Champignons nordiques, huile de cèdre, riz Arborio</p>
                <p class="plat-price">35$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/GnocCourge.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Gnocchis de courge, beurre noisette et noisettes du Québec</h3>
                <p class="plat-description">Courge butternut, beurre noisette, noisettes grillées</p>
                <p class="plat-price">32$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/Tartelette.jpg" alt="Filet de cerf">
                <h3 class="plat-name">Tartelette de légumes racines, fromage de chèvre et miel</h3>
                <p class="plat-description">Légumes racines, fromage de chèvre fermier, miel brut</p>
                <p class="plat-price">28$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/SteakChou.jpeg" alt="Filet de cerf">
                <h3 class="plat-name">Steak de chou-fleur rôti, sauce à l’ail noir et herbes nordiques</h3>
                <p class="plat-description">Chou-fleur rôti, ail noir, orpin</p>
                <p class="plat-price">28$</p>
            </div>

            <div class="plat-item">
                <img src="/assets/images/jpg/Raviolis.jpeg" alt="Filet de cerf">
                <h3 class="plat-name">Raviolis maison aux épinards et ricotta, sauce aux herbes boréales</h3>
                <p class="plat-description">Épinards frais, ricotta artisanale, basilic nordique</p>
                <p class="plat-price">32$</p>
            </div> -->

        </section>

    </main>

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>

    <script src="Javascript/Navigation.js"></script>

</body>
</html>

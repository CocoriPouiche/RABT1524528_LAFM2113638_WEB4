<?php
    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

    $sql = "
    SELECT nb
    FROM vues
    WHERE id = 7
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $nb_vues_navigation = $stmt->fetch();

    $nb = $nb_vues_navigation["nb"] += 1;

    $stmt = $bdd->prepare("
    UPDATE vues
    SET nb = $nb
    WHERE id= 7
    ");
    $stmt->execute();
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Les Rives Boréales - Menu Hamburger</title>
</head>
<body>
    
    <header class="menu-ham">

        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

        <div class="logo-menu-ham">
            <img src="assets/images/svg/Logo.svg" alt="Logo Les Rives Boréales" width="80">
            
        </div>

        <div class="header-quatre-titre">

            <a href="entrees.php"><h1>Entrées</h1></a>
            <a href="platprincipaux.php"><h1>Plats principaux</h1></a>
            <a href="dessert.php"><h1>Desserts</h1></a>
            <a href="caveavin.php"><h1>Cave à Vin</h1></a>
            
        </div>
        

        <h2 class="btn-reservation">Réservation</h2>
    </header>

    <script src="js/navigation.js"></script>

</body>
</html>

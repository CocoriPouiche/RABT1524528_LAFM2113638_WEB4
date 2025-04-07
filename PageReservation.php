<?php

    include "../../includes/base.php";
    
    if (!empty($_POST)) {
        // Sauvegarde les valeurs du POST dans des variables
        $categorie_id      = $_POST["categorie_id"];
        $sous_categorie_id = $_POST["sous_categorie_id"];
        $nom               = $_POST["nom"];
        $ingredients       = $_POST["ingredients"];
        $prix              = $_POST["prix"];

        $sql = "
        INSERT INTO repas (categorie_id, sous_categorie_id, nom, ingredients, prix, url_image)
        VALUES (:categorie_id, :sous_categorie_id, :nom,:ingredients, :prix, :url_image)
        ";

        
        $image = $_FILES["image"];
        
        // Si l'upload s'est bien passé
        if ($image["error"] == 0) {
            $dossier = "uploads/";
            
            $nom_fichier = date("h-i-s")."_".random_int(100000, 999999);
            //ex: "jpg" ou "png"
            $extension = pathinfo($image["full_path"], PATHINFO_EXTENSION);
            //ex: "uploads/09/19-00-123456.jpg"
            $cible = "../../$dossier$nom_fichier.$extension";
            $url_image = "$dossier$nom_fichier.$extension";
            
            $extension_permises = ["jpg", "jpeg", "png", "gif", "avif", "webp"];
            
            if (in_array($extension, $extension_permises)) {
                // echo $cible;
                move_uploaded_file($image["tmp_name"], $cible);
                // Redirection vers repas.php
                header("location: repas.php?ajout=1");
            }
            else {
                $erreur_upload = true;
            }
        }
        else {
            $erreur_upload = true;
        }

        $stmt = $bdd->prepare($sql);
        // Insère les variables dans la requête SQL
        $stmt->execute([
            ":categorie_id"      => $categorie_id,
            ":sous_categorie_id" => $sous_categorie_id,
            ":nom"               => $nom,
            ":ingredients"       => $ingredients,
            ":prix"              => $prix,
            ":url_image"         => $url_image
        ]);
    }
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Rives Boréales - Réservation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header-reserve">
        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <div class="header-title">
            <h1>RÉSERVATION</h1>
        </div>
    </header> 

    <main>
        <h2>Faire une réservation</h2>
    <form action="PageReservation.php" method="post" enctype="multipart/form-data">
        <!-- <input name="id" type="hidden" value="<?= $repas["id"]?>">
    
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
    
        <p>Image: </p>
        <input name="image" type="file">
    
        <div>
            <input class="modifier" type="submit" value="Modifier">
        </div> -->
        <div>
            <p>Réservation à quel nom?</p>
            <input name="nom" type="text" placeholder="Nom">
        </div>
        <div>
            <p>Pour combien de personnes?</p>
            <input name="nb" type="number" min="1" max="20" step="1" value="1">
        </div>
        <div>
            <p>À quelle heure?</p>
            <Select>
                <option value="null">8H</option>
                <option value="1">8H</option>
                <option value="2">8H30</option>
                <option value="3">9H</option>
                <option value="4">9H30</option>
                <option value="5">10H</option>
                <option value="6">10H30</option>
                <option value="7">11H</option>
                <option value="8">11H30</option>
                <option value="9">12H</option>
                <option value="10">12H30</option>
                <option value="11">13H</option>
                <option value="12">13H30</option>
                <option value="13">14H</option>
                <option value="14">14H30</option>
                <option value="15">15H</option>
                <option value="16">15H30</option>
                <option value="17">16H</option>
                <option value="18">16H30</option>
                <option value="19">17H</option>
                <option value="20">17H30</option>
                <option value="21">18H</option>
                <option value="22">18H30</option>
                <option value="23">19H</option>
                <option value="24">19H30</option>
            </Select>
        </div>
    </form>
        <div class="reservation-grid">
            <section class="reservation-item">
                <h2>Table d'hôte option 1</h2>
                <p>Gravlax de truite fumée à l’érable, filet de cerf aux baies sauvages, fondant au chocolat et camerise, café ou infusion inclus</p>
            </section>
            
            <section class="reservation-item">
                <h2>Table d'hôte option 2</h2>
                <p>Soupe de courge et épices boréales, flétan rôti sauce aux herbes sauvages, crème brûlée au sapin baumier, café ou infusion inclus</p>
            </section>
            <section class="reservation-item">
                <h2>Table d'hôte option 3</h2>
                <p>Tartare de bison, canard confit au miel forestier, tarte aux bleuets et thé du Labrador, café ou infusion inclus</p>
            </section>
            <section class="reservation-item">
                <h2>Menu 7 services</h2>
                <p>Le menu 7 services propose des plats savoureux inspirés des produits du Québec. Chaque plat met en valeur des ingrédients locaux du terroir et de la nature boréale. Inclus l’accord le vin. L’accord mets et vins est inclus.</p>
            </section>
        </div>

    </main>

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>

    <script src="Javascript/Navigation.js"></script>

</body>
</html>
<?php

    // $bdd : Connexion à la base de données SQLite
    include "../../includes/base.php";
    $location = "../connexion.php";
    VerifierConnexion($location);
    
    /**
     * Affiche un formulaire pour modifier un administrateur
     * 
     * Le id de l'administrateur est envoyé dans l'URL au format ?id=XXX
     * 
     * Si la page est appelée avec des valeurs dans le POST, 
     * on traite les données et redirige vers la liste
    */
    if (empty($_POST)) {
        // id dans l'url
        $id = $_GET["id"];
    
        $sql = "
        SELECT *
        FROM administrateurs
        WHERE id = :id
    ";
    
        $stmt = $bdd->prepare($sql);
        // Donne le $id à la requête
        $stmt->execute([
            ":id" => $id,
        ]);
    
        // Récupère l'admin à modifier pour afficher les valeurs initiales 
        $admin = $stmt->fetch();

        $sql = "
        SELECT *
        FROM administrateurs
    ";
    }
    else {
        //Traitement du form
        //Variables postées du formulaire
        $id = $_POST["id"];
        $courriel = $_POST["courriel"];
        $mdp = $_POST["mdp"];
        $mdp_encrypte = password_hash($mdp, PASSWORD_DEFAULT);
        
        //Pour ajouter des données dans la TABLE administrateurs de la base de données
        $sql = "
            UPDATE administrateurs
            SET id = :id, courriel = :courriel, mdp = :mdp
            WHERE id = :id
        ";


        // WHERE id = :id pour limiter la modification à l'admin voulu
        $stmt = $bdd->prepare($sql);
        $stmt->execute([ 
            ":id" => $id,
            ":courriel" => $courriel,
            ":mdp" => $mdp_encrypte
        ]);

        // Redirection
        header("location: gestion_admin.php");
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
        <a class="changement_page" href="../repas/repas.php"> Gérer repas </a>
        <a class="changement_page" href="gestion_admin.php"> Gérer admins </a>
        <a class="deconnexion" href="../deconnexion.php"> Deconnexion </a>
    </nav>
    <h2>Modifier un administrateur</h2>
    <form action="modifier_admin.php" method="post">
        <!-- Input caché pour transférer le id -->
        <!-- L'attribut value="" permet d'avoir une valeur par défaut -->
        <input name="id" type="hidden" value="<?= $admin["id"]?>">

        <p>Courriel: </p>
        <input name="courriel" type="text" value="<?= $admin["courriel"]?>">

        <p>Mot de passe: </p>
        <input name="mdp" type="text"  value="<?= $admin["mdp"]?>">

        <div>
            <input class="modifier" type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>

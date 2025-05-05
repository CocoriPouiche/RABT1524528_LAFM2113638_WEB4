<?php

    include "../../includes/base.php";
    $location = "../connexion.php";
    verifierConnexion($location);

    if (isset($_GET["supprimer"])) {
        $sql = "
        DELETE  FROM administrateurs
        WHERE id = :id
    ";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([
            ":id" => $_GET["supprimer"]
        ]);
        header("location: gestion_admin.php?suppression=1");
    }

    $sql = "
    SELECT id, courriel, mdp
    FROM administrateurs
";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $les_admins = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone admin</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>
<body>
    <header>
        <h1>Zone admin</h1>
        <nav>
            <a class="changement_page" href="../index.php"> Accueil </a>
            <a class="changement_page" href="../repas/repas.php"> Gérer repas </a>
            <a class="changement_page" href="gestion_admin.php"> Gérer admins </a>
            <a class="deconnexion" href="../deconnexion.php"> Deconnexion </a>
        </nav>
        
    </header>
    <main>
        <?php if (isset($_GET["ajout"])): ?>
        <p class="action_reussie"> L'élément a bien été ajouté</p>
        <?php endif ?>
        <?php if (isset($_GET["modification"])): ?>
        <p class="action_reussie"> L'élément a bien été modifié</p>
        <?php endif ?>
        <?php if (isset($_GET["suppression"])): ?>
        <p class="action_reussie"> L'élément a bien été supprimé</p>
        <?php endif ?>
        <div class="tete_liste">
            <h2>Liste des administrateurs</h2>
            <a class="ajout" href="creer_administrateur.php"> Créer un administrateur </a>
        </div>
        <div class="les_items">
            <?php foreach ($les_admins as $un_admin): ?>
                <div class="un_item">
                    <p><?= $un_admin["id"]?></p>
                    <p class="courriel"><?= $un_admin["courriel"]?></p>
                    <a class="modifier" href="modifier_admin.php?id=<?= $un_admin['id']?>">Modifier</a>
                    <a class="supprimer" href="gestion_admin.php?supprimer=<?= $un_admin['id']?>">Supprimer</a>
                </div>
            <?php endforeach?>
            <div class="dernier_item"></div>
        </div>
    </main>

    <script src="../../Javascript/admin.js"></script>
</body>
</html>


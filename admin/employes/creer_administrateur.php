<?php

    include "../../includes/base.php";
    $location = "../connexion.php";
    verifierConnexion($location);

    if (! empty($_POST)) {
        $courriel     = $_POST["courriel"];
        $mdp          = $_POST["mdp"];
        $mdp_encrypte = password_hash($mdp, PASSWORD_DEFAULT);

        $sql = "
            INSERT INTO administrateurs
                (courriel, mdp)
            VALUES
                (:courriel, :mdp)
        ";

        $stmt = $bdd->prepare(($sql));
        $stmt->execute([
            ":courriel" => $courriel,
            ":mdp"      => $mdp_encrypte,
        ]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à l'admin</title>
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
    <h2>Création d'administrateur</h2>

    <form action="creer_administrateur.php" method="post">
        <p>Courriel: </p>
        <input name="courriel" type="text" placeholder="Courriel">
        <p>Mot de passe: </p>
        <input name="mdp" type="password" placeholder="Mot de passe">
        <div>
            <input class="ajouter" type="submit" value="Créer">
        </div>
    </form>
</body>
</html>

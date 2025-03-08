<?php

    include "../../includes/base.php";

    VerifierConnexion();

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
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <p>
        <a class="deconnexion" href="deconnexion.php">
            Deconnexion
        </a>
    </p>
    <h1>Zone admin</h1>
    <nav>
        <a class="changement_page" href="../index.php"> Accueil </a>
        <a class="changement_page" href="../repas/repas.php"> Liste des repas </a>
        <a class="changement_page" href="gestion_admin.php"> Gérer admins </a>
    </nav>
    <h1>Création d'administrateur</h1>

    <form action="creer_administrateur.php" method="post">
        <input name="courriel" type="text" placeholder="Courriel">
        <input name="mdp" type="password" placeholder="Mot de passe">
        <input type="submit" value="Créer">
    </form>
</body>
</html>

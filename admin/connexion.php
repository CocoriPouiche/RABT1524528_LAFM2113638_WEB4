<?php

    include "../includes/base.php";

    if (!empty($_POST)) {
        $courriel = $_POST["courriel"];
        $mdp = $_POST["mdp"];
        $mdp_encrypte = password_verify($mdp, PASSWORD_DEFAULT);
        
        $sql = "
        SELECT *
        FROM administrateurs
        WHERE courriel = :courriel
        ";

        
        $stmt = $bdd -> prepare(($sql));
        $stmt -> execute([
            ":courriel" => $courriel
        ]);
        $utilisateur = $stmt -> fetch();

        if ($utilisateur != false) {
            //Vérification mdp
            $mdp_valide = password_verify($mdp, $utilisateur["mdp"]);

            if ($mdp_valide) {
                $_SESSION["est_connecte"] = true;
                header("location: index.php");
            } else {
                $erreur = true;
            }
        } else {
            $erreur = true;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à l'admin</title>
    <link rel="stylesheet" href="../css/style_admin.css">
</head>
<body>
        <h1>Connexion</h1>

        <?php if (isset($erreur)): ?>
            <p class="erreur">
                Le courriel ou le mot de passe n'est pas bon.
            </p>
        <?php endif; ?>

        <form action="connexion.php" method="post">
            <input name="courriel" type="text" placeholder="Courriel">
            <input name="mdp" type="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion">
        </form>
</body>
</html>
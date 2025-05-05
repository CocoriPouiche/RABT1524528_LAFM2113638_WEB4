<?php

include "includes/base.php";

if (!empty($_POST)) {
    $jour = $_POST["jour"];
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $nb = $_POST["nb"];
    $temps = $_POST["temps"];

    $sql = "
        INSERT INTO reservations (jour, type, nom, nb, temps)
        VALUES (:jour, :type, :nom, :nb, :temps)
        ";

    $stmt = $bdd->prepare($sql);

    $stmt->execute([
        ":jour" => $jour,
        ":type" => $type,
        ":nom" => $nom,
        ":nb" => $nb,
        ":temps" => $temps
    ]);
}

$sql = "
    SELECT nb
    FROM vues
    WHERE id = 6
    ";

$stmt = $bdd->prepare($sql);
$stmt->execute();
$nb_vues_reservations = $stmt->fetch();

$nb = $nb_vues_reservations["nb"] += 1;

$stmt = $bdd->prepare("
    UPDATE vues
    SET nb = $nb
    WHERE id= 6
    ");
$stmt->execute();

$n;
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Rives Boréales - Réservation</title>
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
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


    <main class="main-reserve">

        <h2 class="section-title-dessert"><a href="Accueil.php">Accueil</a> / Réservation</h2>

        <section>
<<<<<<< HEAD
            <h2>Faire une réservation</h2>
=======
                <h2 class="t-h2-res">FAIRE UNE RÉSERVATION</h2>
>>>>>>> origin/Resolution
            <form action="PageReservation.php" method="post">
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
                    <Select name="temps">
                        <option value=""></option>
                        <?php
                        $debut = strtotime("08:00");
                        $fin = strtotime("20:30");

                        for ($temps = $debut; $temps <= $fin; $temps = strtotime("+30 minutes", $temps)) {
                            $value = date("H:i", $temps);
                            $label = date("G\H", $temps);

                            if (date("i", $temps) == "30") {
                                $label .= "30";
                            }

                            echo "<option value=\"$value\">$label</option>\n";
                        }
                        ?>
                    </Select>
                </div>

                <div>
                    <p>Quel jour?</p>
                    <select name="jour">
                        <option value=""></option>
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                        <option value="Dimanche">Dimanche</option>
                    </select>
                </div>

                <div>
                    <p>Quel type de réservation?</p>
                    <select name="type">
                        <option value=""></option>
                        <option value="regulier">Réservation régulière</option>
                        <option value="option1">Table d'hôte option 1</option>
                        <option value="option2">Table d'hôte option 2</option>
                        <option value="option3">Table d'hôte option 3</option>
                        <option value="7services">Menu 7 services</option>
                    </select>
                </div>

                <div>
                    <button class="btn-reserver-res" type="submit">Réserver</button>
                </div>
            </form>
            <section>

<<<<<<< HEAD
                <h2>Les options de reservations</h2>
=======
        <h2 class="t-h2-res">LES OPTIONS DE RÉSERVATIONS</h2>
>>>>>>> origin/Resolution

                <div class="reservation-grid">
                    <section class="reservation-item">
                        <h2>Table d'hôte option 1</h2>
                        <p>Gravlax de truite fumée à l’érable, filet de cerf aux baies sauvages, fondant au chocolat et
                            camerise, café ou infusion inclus</p>
                    </section>

                    <section class="reservation-item">
                        <h2>Table d'hôte option 2</h2>
                        <p>Soupe de courge et épices boréales, flétan rôti sauce aux herbes sauvages, crème brûlée au
                            sapin baumier, café ou infusion inclus</p>
                    </section>
                    <section class="reservation-item">
                        <h2>Table d'hôte option 3</h2>
                        <p>Tartare de bison, canard confit au miel forestier, tarte aux bleuets et thé du Labrador, café
                            ou infusion inclus</p>
                    </section>
                    <section class="reservation-item">
                        <h2>Menu 7 services</h2>
                        <p>Le menu 7 services propose des plats savoureux inspirés des produits du Québec. Chaque plat
                            met en valeur des ingrédients locaux du terroir et de la nature boréale. Inclus l’accord le
                            vin. L’accord mets et vins est inclus.</p>
                    </section>
                </div>

    </main>

    <footer>
        <p>&copy; 2025 Les Rives Boréales</p>
    </footer>

<<<<<<< HEAD
    <script src="js/Navigation.js"></script>
=======
    <script src="Javascript/navigation.js"></script>
>>>>>>> origin/Resolution

</body>

</html>
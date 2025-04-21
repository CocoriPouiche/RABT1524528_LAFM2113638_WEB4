<?php

    include "includes/base.php";

    if (!empty($_POST)) {
        $nom      = $_POST["nom"];
        $nb        = $_POST["nb"];
        $temps  = $_POST["temps"];

        $sql = "
        INSERT INTO reservations (nom, nb, temps)
        VALUES (:nom, :nb, :temps)
        ";

        $stmt = $bdd->prepare($sql);

        $stmt->execute([
            ":nom"      => $nom,
            ":nb"        => $nb,
            ":temps"  => $temps
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
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Rives Boréales - Réservation</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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

    <section>
            <h2>Faire une réservation</h2>
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
                    <option value="8H">8H</option>
                    <option value="8H30">8H30</option>
                    <option value="9H">9H</option>
                    <option value="9H30">9H30</option>
                    <option value="10H">10H</option>
                    <option value="10H30">10H30</option>
                    <option value="11H">11H</option>
                    <option value="11H30">11H30</option>
                    <option value="12H">12H</option>
                    <option value="12H30">12H30</option>
                    <option value="13H">13H</option>
                    <option value="13H30">13H30</option>
                    <option value="14H">14H</option>
                    <option value="14H30">14H30</option>
                    <option value="15H">15H</option>
                    <option value="15H30">15H30</option>
                    <option value="16H">16H</option>
                    <option value="16H30">16H30</option>
                    <option value="17H">17H</option>
                    <option value="17H30">17H30</option>
                    <option value="18H">18H</option>
                    <option value="18H30">18H30</option>
                    <option value="19H">19H</option>
                    <option value="19H30">19H30</option>
                </Select>
            </div>

            <div>
                <p>Quel type de réservation?</p>
                <select name="typeReservation">
                    <option value="option1">Table d'hôte option 1</option>
                    <option value="option2">Table d'hôte option 2</option>
                    <option value="option3">Table d'hôte option 3</option>
                    <option value="menu7">Menu 7 services</option>
                </select>
            </div>

            <div>
                    <button class="btn-reserver-acc" type="submit">Réserver</button>
            </div>
        </form>
    <section>

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
<?php

    // $bdd : Connexion à la base de données SQLite
    include "includes/base.php";

    $sql = "
	SELECT nb
    FROM vues
	WHERE id = 1
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $nb_vues_accueil = $stmt->fetch();

    $nb = $nb_vues_accueil["nb"] += 1;

    $stmt = $bdd->prepare("
    UPDATE vues
    SET nb = $nb
    WHERE id= 1
    ");
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Les Rives Boréal</title>
</head>
<body>

    <header class="video-header">
        
        <div class="header-container">
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

        <video autoplay muted loop playsinline class="bg-video">
            <source src="assets/video/RABT1524528_Acceuil_Video.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo HTML5.
        </video>
    
        <div class="video-overlay">
            <div class="interface">
                <div class="Logo_Acceuil">
                    <img src="assets/images/svg/Logo.svg" alt="Montage architectural" class="montage--img">
                </div>
            </div>
        </div>
    </header>

    <section class="chef-section">
        <div class="grid-container">
            <div class="grid-item image">
                <img src="assets/images/jpg/CHEF-LRB.jpg" alt="Chef">
            </div>
            <div class="grid-item text">
                <span class="chef">CHEF</span>
                <h2 class="t-chef">Olivier Desrochers</h2>
                <p>Diplômé de l'institut de tourisme et d'hôtellerie du Québec (ITHQ), il a perfectionné son art auprès
                    de chefs locaux avant de se rendre en Scandinavie pour travailler dans des restaurants réputés comme
                    le Noma de René Redxepi, où il a développé sa passion pour la cuisine boréale. De retour au Québec, il
                    se lance dans son propre projet pour célèbrer les saveurs de la nature.
                </p>
            </div>
        </div>
    </section>

    <main>

        <section class="section-reservation grid-container">

            <div class="grid-item image">

                <img src="assets/images/jpg/RESTAURANT.jpg" alt="Réservation">
                <span class="section-R-h2">RÉSERVATION</span>

            </div>

            <div class="grid-item text">

                <div class="reservation-options">

                <div class="reservation-options-section">
                    <h3 class="reservation-options-title">Nos options :</h3>
                    <ul class="reservation-options-list">
                        <li class="reservation-option-item">Table d'hôte – Option 1</li>
                        <li class="reservation-option-item">Table d'hôte – Option 2</li>
                        <li class="reservation-option-item">Table d'hôte – Option 3</li>
                        <li class="reservation-option-item">Menu dégustation – 7 services</li>
                    </ul>
                </div>
                
                <p class="reservation-description">
                Réservez dès maintenant pour vivre une expérience gastronomique inoubliable.
                </p>

                <a href="pagereservation.php">
                    <button class="btn-reserver-acc">Voir les réservations</button>
                </a>
            </div>
        </section>


        <div class="pixi-transition"></div>
        
        <section class="grid-container reverse">

            <div class="grid-item text">
                <p class="horaire-text">Du lundi au vendredi de 8AM jusqu'à
                    10PM<br>et du samedi à dimanche de 10AM
                    jusqu'à 11PM!
                </p>
            </div>

            <div class="grid-item image">

                <img src="assets/images/jpg/HORAIRE.jpg" alt="Horaire">
                <span class="section-H-h2">HORAIRE</span>

            </div>

        </section>
        
        <div class="coeur">
            <img src="assets/images/svg/CoeurBackground.svg" alt="CoeurBackground">
        </div>

    </main>

    <section class="separator-section">
        <img src="assets/images/jpg/SeparateurAccueil.jpg" alt="Image de séparation" class="separator-image">
    </section>

    <footer class="footer-accueil">
        <div class="footer-container">
            <div class="footer-left">
                <img src="assets/images/svg/Logo.svg" alt="Logo" class="footer-logo">
                <div class="social-icons">
                    <a href="#"><img src="assets/images/png/Facebook-logo.png" alt="Facebook"></a>
                    <a href="#"><img src="assets/images/png/Instagram-Logo.png" alt="Instagram"></a>
                    <a href="#"><img src="assets/images/png/Twitter-Logo.png" alt="Twitter"></a>
                    <a href="mailto:contact@exemple.com"><img src="assets/images/png/Gmail-Logo.png" alt="Email"></a>
                </div>
            </div>
    
            <div class="footer-right">
                <div class="newsletter">
                    <h3>Abonnez-vous à notre infolettre</h3>
                    <form>
                        <input type="email" placeholder="Votre email">
                        <button type="submit">S'inscrire</button>
                    </form>
                </div>
                <div class="footer-links">
                    <a href="#">FAQ</a>
                    <a href="#">Nous contacter</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pixi.js@7.2.4/dist/pixi.min.js"></script>

    <script src="js/navigation.js"></script>
    <script src="js/gsap.js"></script>
    
</body>
</html>
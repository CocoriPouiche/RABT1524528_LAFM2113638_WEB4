/*[ JAVASCRIPT NAVIGATION.JS ]*/
/* ------------------------------------------------------------ */

// Variables
const menuToggle = document.querySelector('.menu-toggle');

const logoMenuHam = document.querySelector('.logo-menu-ham img');

const btnReservation = document.querySelector('.btn-reservation');

// Vérifie si l'élément existe avant d'ajouter un événement
if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        // Vérifie si on est déjà sur navigation.php
        if (window.location.pathname.includes("Navigateur.php")) {
            // Si on est sur navigation.php, on revient à la page où l'utilisateur était avant
            if (document.referrer.includes("Acceuil.php")) {
                window.location.href = "Acceuil.php";
            } else if (document.referrer.includes("CaveAVin.php")) {
                window.location.href = "CaveAVin.php";
            } else if (document.referrer.includes("Dessert.php")) {
                window.location.href = "Dessert.php";
            } else if (document.referrer.includes("Entrees.php")) {
                window.location.href = "Entrees.php";
            } else if (document.referrer.includes("PlatPrincipaux.php")) {
                window.location.href = "PlatPrincipaux.php";
            } else if (document.referrer.includes("PageReservation.php")) {
                window.location.href = "PageReservation.php";
            }
        } else {
            // Si on n'est pas sur navigation.php, on y va
            window.location.href = "Navigateur.php";
        }
    });
}

// Si l'utilisateur clique sur le logo, il est ramené à l'acceuil
if (logoMenuHam) {
    logoMenuHam.addEventListener('click', () => {
        window.location.href = "Acceuil.php";
    });
}

//Si le bouton reservation est cliqué
if (btnReservation) {
    btnReservation.addEventListener('click', () => {
        window.location.href = "PageReservation.php";
    });
}
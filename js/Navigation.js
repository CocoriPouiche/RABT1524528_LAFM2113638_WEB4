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
        if (window.location.pathname.includes("navigateur.php")) {
            // Si on est sur navigation.php, on revient à la page où l'utilisateur était avant
            if (document.referrer.includes("index.php")) {
                window.location.href = "index.php";
            } else if (document.referrer.includes("caveavin.php")) {
                window.location.href = "caveavin.php";
            } else if (document.referrer.includes("dessert.php")) {
                window.location.href = "dessert.php";
            } else if (document.referrer.includes("entrees.php")) {
                window.location.href = "entrees.php";
            } else if (document.referrer.includes("platprincipaux.php")) {
                window.location.href = "platprincipaux.php";
            } else if (document.referrer.includes("pagereservation.php")) {
                window.location.href = "pagereservation.php";
            }
        } else {
            // Si on n'est pas sur navigateur.php, on y va
            window.location.href = "navigateur.php";
        }
    });
}

// Si l'utilisateur clique sur le logo, il est ramené à l'index
if (logoMenuHam) {
    logoMenuHam.addEventListener('click', () => {
        window.location.href = "index.php";
    });
}

//Si le bouton reservation est cliqué
if (btnReservation) {
    btnReservation.addEventListener('click', () => {
        window.location.href = "pagereservation.php";
    });
}
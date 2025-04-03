/*[ JAVASCRIPT NAVIGATION.JS ]*/
/* ------------------------------------------------------------ */

// Variables
// Sélectionne le bouton du menu hamburger
const menuToggle = document.querySelector('.menu-toggle');
// Sélectionne le logo dans le menu Navigateur.html
const logoMenuHam = document.querySelector('.logo-menu-ham img');

// Vérifie si l'élément existe avant d'ajouter un événement
if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        // Vérifie si on est déjà sur navigation.html
        if (window.location.pathname.includes("Navigateur.html")) {
            // Si on est sur navigation.html, on revient à la page où l'utilisateur était avant
            if (document.referrer.includes("Acceuil.html")) {
                window.location.href = "Acceuil.html";
            } else if (document.referrer.includes("CaveAVin.html")) {
                window.location.href = "CaveAVin.html";
            } else if (document.referrer.includes("Dessert.html")) {
                window.location.href = "Dessert.html";
            } else if (document.referrer.includes("Entrees.html")) {
                window.location.href = "Entrees.html";
            } else if (document.referrer.includes("PlatPrincipaux.html")) {
                window.location.href = "PlatPrincipaux.html";
            }
        } else {
            // Si on n'est pas sur navigation.html, on y va
            window.location.href = "Navigateur.html";
        }
    });
}

// Si l'utilisateur clique sur le logo, il est ramené à l'acceuil
if (logoMenuHam) {
    logoMenuHam.addEventListener('click', () => {
        window.location.href = "Acceuil.html";
    });
}


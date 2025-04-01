/*[ COMPOSANT NAVIGATION.JS ]*/
/* ------------------------------------------------------------ */

// Variables
const menuToggle = document.querySelector('.menu-toggle');

if (menuToggle) {
    menuToggle.addEventListener('click', () => {

        if (window.location.pathname.includes("Navigateur.html")) {
            window.location.href = "Acceuil.html";
        } else {
            window.location.href = "Navigateur.html"; 
        }
    });
}

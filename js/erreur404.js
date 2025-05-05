

document.addEventListener("DOMContentLoaded", () => {
    let count = 5;
    const countdownElement = document.querySelector("#cpt");

    const countdown = setInterval(() => {
        countdownElement.textContent = count; // Met à jour le texte du span
        if (count === 0) {
            clearInterval(countdown); // Arrête le compteur
            window.location.href = "index.html"; // Redirection
        }
        count--;
    }, 1000);
});
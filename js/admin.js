const supprimer = document.querySelectorAll(".supprimer");

for (const element of supprimer) {
    element.addEventListener("click", e => {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément?")) {

        }
        else {
            e.preventDefault();
        }
    });
}
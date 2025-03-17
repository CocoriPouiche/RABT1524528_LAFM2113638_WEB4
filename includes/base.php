<?php

session_start();

date_default_timezone_set("America/Toronto");

include "db.php";

/**
 * Summary of selectAll
 * Sélectionne toutes les entrées
 * @param mixed $nom_table
 * @param mixed $nom_colonne
 * @return array
 */
function selectAll($nom_table, $nom_colonne = "*")
{
    global $bdd; //pour avoir accès à la variable $bdd

    $sql = "
        SELECT $nom_colonne
        FROM $nom_table
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Summary of selectById
 * Sélectionne une entrée en utilisant un id
 * @param mixed $nom_table
 * @param mixed $id
 * @param mixed $nom_colonne
 * @return array
 */
function selectById($nom_table, $id, $nom_colonne = "*")
{
    global $bdd; //pour avoir accès à la variable $bdd

    $sql = "
        SELECT $nom_colonne
        FROM $nom_table
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);
    return $stmt->fetchAll();
}

function verifierConnexion($location)
{
    if (!isset($_SESSION["est_connecte"])) {
        header("location: $location");
    }
}

function chargerImage($chemin) {
    $extension = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));

    switch ($extension) {
        case "jpg": return imagecreatefromjpeg($chemin);
        case "jpeg": return imagecreatefromjpeg($chemin);
        case "png": return imagecreatefrompng($chemin);
        case "gif": return imagecreatefromgif($chemin);
        case "avif": return imagecreatefromavif($chemin);
        case "webp": return imagecreatefromwebp($chemin);
        default: return false;
    }
}
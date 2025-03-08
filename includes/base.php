<?php

session_start();

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

function VerifierConnexion($location)
{
    if (!isset($_SESSION["est_connecte"])) {
        header("location: $location");
    }
}

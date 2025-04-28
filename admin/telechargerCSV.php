<?php
    include "../includes/base.php";
    
    $sql = "
    SELECT nom, nb, temps
    FROM reservations
    ";
    // Liste de toutes les réservations
    $stmt = $bdd->prepare($sql);
    $stmt->execute([]);
    $les_reservations = $stmt->fetchAll();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data.csv"');

    $output = fopen('php://output', 'w');

    foreach ($les_reservations as $row) {
        fputcsv($output, $row, ";"); // On utilise des ; pour séparer les données, ce qui crée les colonnes en l'ouvrant dans excel
    }

    fclose($output);
    exit;
?>
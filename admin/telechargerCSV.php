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

    // Set headers to force download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Write rows to CSV
    foreach ($les_reservations as $row) {
        fputcsv($output, $row);
    }

    // Close stream
    fclose($output);
    exit;
?>
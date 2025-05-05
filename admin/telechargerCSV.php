<?php
    include "../includes/base.php";
    
    $sql = "
    SELECT temps, jour, type, nb, nom
    FROM reservations
	ORDER BY 
		CASE jour
			WHEN 'Lundi' THEN 1
			WHEN 'Mardi' THEN 2
			WHEN 'Mercredi' THEN 3
			WHEN 'Jeudi' THEN 4
			WHEN 'Vendredi' THEN 5
			WHEN 'Samedi' THEN 6
			WHEN 'Dimanche' THEN 7
			END,
			temps
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
<?php
    // Fichier config.php
    include 'config.php';

    // Récupérer des données de la table 'posted'
    $query = "SELECT * FROM posted LIMIT 100";  // Modifiez cette requête selon vos besoins
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Envoyer les données au script Python
    exec("python script_knn.py '" . json_encode($data) . "'", $output);

    // $output contient la sortie du script Python
    print_r($output);
?>

<?php
// Inclure le fichier de configuration de la base de données
include '../config.php';

// Connexion à la base de données
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Sélectionnez les données que vous souhaitez extraire de la base de données
$sql = "SELECT * FROM posted"; // Remplacez "votre_table" par le nom de votre table

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Créez un tableau pour stocker les données
    $data = array();

    while ($row = $result->fetch_assoc()) {
        // Ajoutez chaque ligne de données au tableau
        $data[] = $row;
    }

    // Convertissez le tableau en format JSON
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Écrivez le JSON dans un fichier
    file_put_contents('donnees.json', $json_data);

    echo "Les données ont été extraites de la base de données et enregistrées dans un fichier JSON.";
} else {
    echo "Aucune donnée trouvée dans la base de données.";
}

// Fermer la connexion à la base de données
$conn->close();
?>

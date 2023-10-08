<?php
include 'config.php';

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    
    // Connexion à la base de données en utilisant les informations de config.php
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $query = "SELECT * FROM posted WHERE status=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $reports = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }
    }

    // Fermez la connexion à la base de données
    $stmt->close();
    $conn->close();

    // Renvoyez les signalements au format JSON
    echo json_encode($reports);
}
?>

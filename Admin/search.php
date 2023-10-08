<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alertdisparu";

// Crée une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Initialisation des critères de recherche
$conditions = array();
$params = array();

// Vérifie si le champ "ville" a été spécifié
if (!empty($_POST['ville'])) {
    $conditions[] = "city_from LIKE ?";
    $params[] = "%" . $_POST['ville'] . "%";
}

// Vérifie si le champ "genre" a été spécifié
if (!empty($_POST['genre'])) {
    $conditions[] = "gender = ?";
    $params[] = $_POST['genre'];
}

// Vérifie si le champ "status" a été spécifié
if (!empty($_POST['status'])) {
    $conditions[] = "status = ?";
    $params[] = $_POST['status'];
}

// ... Ajoutez ici d'autres critères de recherche en suivant le même modèle

// Vérifie si le champ "nom (similarité)" a été spécifié
if (!empty($_POST['name'])) {
    $conditions[] = "name LIKE ?";
    $params[] = "%" . $_POST['name'] . "%";
}

// Construit la requête SQL en fonction des critères
$sql = "SELECT * FROM posted";
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Prépare la requête SQL
$stmt = $conn->prepare($sql);

// Lie les paramètres aux valeurs
if (!empty($params)) {
    $types = str_repeat('s', count($params)); // 's' représente une chaîne de caractères
    $stmt->bind_param($types, ...$params);
}

// Exécute la requête
$stmt->execute();

// Récupère les résultats de la requête
$result = $stmt->get_result();

// Crée un tableau pour stocker les résultats
$results = array();

// Parcours les résultats de la requête
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

// Ferme la connexion à la base de données
$stmt->close();
$conn->close();

// Renvoie les résultats au format JSON
header('Content-Type: application/json');
echo json_encode($results);
?>

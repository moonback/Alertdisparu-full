<?php
require_once 'config.php';
require_once 'navbar.php';

$filters = [];
$params = [];
$sql = "SELECT * FROM posted WHERE 1=1";

// Ajout des filtres
if (!empty($_POST['gender'])) {
    $filters[] = "gender = :gender";
    $params[':gender'] = $_POST['gender'];
}

if (!empty($_POST['city_from'])) {
    $filters[] = "city_from = :city_from";
    $params[':city_from'] = $_POST['city_from'];
}

if (!empty($_POST['status'])) {
    $filters[] = "status = :status";
    $params[':status'] = $_POST['status'];
}

if (count($filters) > 0) {
    $sql .= " AND " . implode(" AND ", $filters);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats filtrés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-5 text-center">Résultats filtrés</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
        foreach ($results as $row) {
            echo "<div class='col'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>";
            echo "<p class='card-text'>Ville : " . htmlspecialchars($row['city_from']) . "</p>";
            echo "<p class='card-text'>Genre : " . htmlspecialchars($row['gender']) . "</p>";
            echo "<p class='card-text'>Statut : " . htmlspecialchars($row['status']) . "</p>";
            echo "</div></div></div>";
        }
        ?>
    </div>
</div>

</body>
</html>

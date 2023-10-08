<?php
// Fichier de configuration
require 'config.php';

// Active le mode d'erreur PDO pour le débogage
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Tableau contenant les entrées de l'utilisateur pour le filtrage
$userInput = [
    // 'colonne_dans_la_bdd' => 'valeur',
    // 'autre_colonne' => 'autre_valeur',
    // ...
];

// Construction de la chaîne de requête SQL en fonction des clés du tableau $userInput
$queryParts = [];
foreach (array_keys($userInput) as $key) {
    $queryParts[] = "$key = :$key";
}

// Construction de la requête SQL finale
$query = "SELECT * FROM posted";
if (!empty($queryParts)) {
    $query .= ' WHERE ' . implode(' AND ', $queryParts);
}

// Préparation de la requête SQL
$stmt = $pdo->prepare($query);

// Liaison des valeurs
foreach ($userInput as $key => $value) {
    $stmt->bindValue(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
}

try {
    // Exécution de la requête
    $stmt->execute();

    // Affiche la requête SQL générée pour le débogage
    $stmt->debugDumpParams();

    // Récupération des résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Gestion des erreurs
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}

// Affichage des résultats
print_r($results);
?>

<?php
// Chemin vers le fichier JSON
$jsonFilePath = 'Python-ia/Similariter/results.json';

// Charger le contenu du fichier JSON dans une variable
$jsonData = file_get_contents($jsonFilePath);

// Décoder le JSON en un tableau associatif
$data = json_decode($jsonData, true);

// Vérifier si le décodage a réussi
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors de la lecture du fichier JSON: " . json_last_error_msg());
}

// Modifier le tableau associatif (ici, je suppose qu'il y a une clé 'someKey' que je modifie)
if (isset($data['someKey'])) {
    $data['someKey'] = 'newValue';
}

// Encoder le tableau associatif en une chaîne JSON
$newJsonData = json_encode($data);

// Vérifier si l'encodage a réussi
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors de l'encodage en JSON: " . json_last_error_msg());
}

// Sauvegarder la nouvelle chaîne JSON dans le fichier
if (file_put_contents($jsonFilePath, $newJsonData) === false) {
    die("Erreur lors de l'écriture du nouveau contenu dans le fichier JSON");
}

echo "Le fichier JSON a été modifié avec succès.";
?>

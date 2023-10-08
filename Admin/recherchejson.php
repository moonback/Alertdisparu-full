<?php
// Charger le contenu du fichier JSON
$donnees = json_decode(file_get_contents('donnees.json'), true);

// Récupérer les critères de recherche saisis par l'utilisateur
$ville = isset($_POST["ville"]) ? $_POST["ville"] : '';
$genre = isset($_POST["genre"]) ? $_POST["genre"] : '';
$status = isset($_POST["status"]) ? $_POST["status"] : '';
$race = isset($_POST["race"]) ? $_POST["race"] : '';
$disappearance_date = isset($_POST["disappearance_date"]) ? $_POST["disappearance_date"] : '';
$age = isset($_POST["age"]) ? $_POST["age"] : '';
$height = isset($_POST["height"]) ? $_POST["height"] : '';
$weight = isset($_POST["weight"]) ? $_POST["weight"] : '';
$hair_color = isset($_POST["hair_color"]) ? $_POST["hair_color"] : '';

// Filtrer les données en fonction des critères de recherche
$resultats = array_filter($donnees, function ($element) use ($ville, $genre, $status, $race, $disappearance_date, $age, $height, $weight, $hair_color) {
    return (empty($ville) || stripos($element["city_from"], $ville) !== false) &&
           (empty($genre) || $element["gender"] == $genre) &&
           (empty($status) || $element["status"] == $status) &&
           (empty($race) || stripos($element["race"], $race) !== false) &&
           (empty($disappearance_date) || $element["disappearance_date"] == $disappearance_date) &&
           (empty($age) || $element["dob"] == $age) &&
           (empty($height) || $element["height"] == $height) &&
           (empty($weight) || $element["weight"] == $weight) &&
           (empty($hair_color) || stripos($element["hair_color"], $hair_color) !== false);
});

// Convertir les résultats en tableau associatif
$resultats_assoc = [];
foreach ($resultats as $resultat) {
    $resultats_assoc[] = $resultat;
}

// Renvoyer les résultats au format JSON
header('Content-Type: application/json');
echo json_encode($resultats_assoc);
?>

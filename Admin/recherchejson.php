<?php
// Établir une connexion à la base de données (utilisez vos propres informations de connexion)
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'alertdisparu';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Exécutez une requête SQL pour récupérer les données de votre base de données
$sql = "SELECT * FROM posted"; // Remplacez "votre_table" par le nom de votre table
$stmt = $bdd->prepare($sql);
$stmt->execute();

// Récupérez les résultats dans un tableau PHP
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Utilisez json_encode pour convertir le tableau en une chaîne JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Écrivez la chaîne JSON dans un fichier
$filePath = 'donnees2.json'; // Spécifiez le chemin du fichier JSON de sortie
file_put_contents($filePath, $jsonData);

// Fermez la connexion à la base de données
$bdd = null;

echo 'Le fichier JSON a été généré avec succès.';
?>

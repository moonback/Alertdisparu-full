<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Profils Similaires</title>
</head>
<body>
    <h1>Recherche de Profils Similaires</h1>
    
    <form action="recherche_profiles.php" method="GET">
        <label for="nom_profil">Nom du Profil :</label>
        <input type="text" id="nom_profil" name="nom_profil" required>
        
        <label for="seuil_similarity">Seuil de Similarité :</label>
        <input type="number" id="seuil_similarity" name="seuil_similarity" step="0.01" min="0" max="1" value="0.7">
        
        <input type="submit" value="Rechercher">
    </form>

    <?php
    if(isset($_GET['nom_profil'])) {
        $nom_profil = $_GET['nom_profil'];
        $seuil_similarity = $_GET['seuil_similarity'];

        $url = "http://localhost:5000/rechercher_profiles_similaires?nom_profil=" . urlencode($nom_profil) . "&seuil_similarity=" . $seuil_similarity;

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if(isset($data['profils_similaires'])) {
            echo "<h2>Profils Similaires :</h2>";
            echo "<ul>";
            foreach($data['profils_similaires'] as $profil) {
                echo "<li>$profil</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun profil similaire trouvé.</p>";
        }
    }
    ?>

</body>
</html>

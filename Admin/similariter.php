<?php
require_once '../config.php';
require_once '../admin/navbar.php';

// Configuration de l'affichage des erreurs pour le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chemin vers le fichier JSON de résultats
$jsonFilePath = '../Python-ia/Similariter/results.json';

// Vérification de l'existence du fichier JSON
if (file_exists($jsonFilePath)) {
    // Lecture du contenu JSON
    $json = file_get_contents($jsonFilePath);
    $data = json_decode($json, true);

    // Vérification des erreurs de décodage JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Erreur de décodage JSON');
    }
} else {
    die('Fichier JSON non trouvé');
}

// Fonction pour déterminer le niveau d'alerte en fonction de la similarité
function getAlertLevel($similarity) {
    if ($similarity > 85) return 'bg-danger text-white';
    if ($similarity > 50) return 'bg-warning text-dark';
    return 'bg-success text-white';
}

// Mise en cache des données JSON pour éviter de les recharger
$profilesDataForJS = [];

// Fonction pour rendre une carte de profil
function render_card($profile, $similarities) {
    global $profilesDataForJS;
    
    $escapedProfile = htmlspecialchars($profile, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    // Trouver le profil le plus similaire (autre que le profil actuel)
    $mostSimilarProfile = null;
    $highestSimilarity = -1;

    foreach ($similarities as $otherProfile => $similarityData) {
        if ($otherProfile !== $profile) {
            $similarity = $similarityData['similarity'];
            if ($similarity > $highestSimilarity) {
                $mostSimilarProfile = $otherProfile;
                $highestSimilarity = $similarity;
            }
        }
    }
    
    // Mettre en cache les données pour le graphique
    $profilesDataForJS[$profile] = $similarities;
    
    ob_start();
    ?>
    <div class="col mb-4">
        <div class="card h-100">
            <div class="card-header bg-primary text-white">
                Profil : <?= $escapedProfile; ?>
            </div>
            <div class="card-body">
                <canvas id="<?= $escapedProfile; ?>"></canvas>
                <div class="mt-3 text-center">
                    <h5>Profil le plus similaire: <?= htmlspecialchars($mostSimilarProfile, ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h5>
                    Similarité: <?= htmlspecialchars($highestSimilarity, ENT_QUOTES, 'UTF-8'); ?>, Level: <?= getAlertLevel($highestSimilarity); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de similarité</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-5 text-center">Résultats de similarité</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($data['data'] as $profile => $similarities): ?>
            <?= render_card($profile, $similarities); ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
(function() {
    // Données des profils pour les graphiques
    const profilesData = <?php echo json_encode($profilesDataForJS); ?>;
    
    // Génération des graphiques pour chaque profil
    Object.keys(profilesData).forEach(profile => {
        const ctx = document.getElementById(profile).getContext('2d');
        
        const otherProfiles = Object.keys(profilesData[profile]);
        const similarities = Object.values(profilesData[profile]).map(similarityData => parseFloat(similarityData['similarity']));

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: otherProfiles,
                datasets: [{
                    label: 'Similarités',
                    data: similarities,
                    backgroundColor: similarities.map(similarity => {
                        if (similarity > 85) return 'rgba(255, 0, 0, 0.5)';
                        if (similarity > 50) return 'rgba(255, 165, 0, 0.5)';
                        return 'rgba(0, 128, 0, 0.5)';
                    }),
                    borderColor: similarities.map(similarity => {
                        if (similarity > 85) return 'rgba(255, 0, 0, 1)';
                        if (similarity > 50) return 'rgba(255, 165, 0, 1)';
                        return 'rgba(0, 128, 0, 1)';
                    }),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    });
})();
</script>

</body>
</html>

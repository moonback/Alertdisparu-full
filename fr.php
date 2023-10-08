<?php
include 'config.php';
include 'navbar.php';

// Vérification de la disponibilité d'APCu
if (extension_loaded('apcu') && ini_get('apc.enabled')) {
    $data = apcu_fetch('json_data');
} else {
    $data = false;
}

// Chargement et décodage du fichier JSON si les données ne sont pas en cache
if ($data === false) {
    try {
        $jsonFilePath = 'Python-ia/Similariter/results.json';
        if (!file_exists($jsonFilePath)) {
            throw new Exception('Fichier JSON non trouvé');
        }
        
        $json = file_get_contents($jsonFilePath);
        $data = json_decode($json, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Erreur de décodage JSON');
        }

        // Mettre en cache seulement si APCu est disponible
        if (extension_loaded('apcu') && ini_get('apc.enabled')) {
            apcu_store('json_data', $data, 300); // Cache pour 300 secondes
        }

    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de similarité</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styles personnalisés */
        .card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-5 text-center">Résultats de similarité</h1>
    <?php if (!empty($data)): ?>
        <?php foreach($data as $profil => $similarities): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <?php echo htmlspecialchars($profil, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Affichage des champs similaires ici -->
                            <ul>
                            <?php foreach($similarities as $key => $value): ?>
                                <li><?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ': ' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <canvas id="<?php echo htmlspecialchars($profil, ENT_QUOTES, 'UTF-8'); ?>"
                                    data-labels="<?php echo htmlspecialchars(json_encode(array_keys($similarities)), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-values="<?php echo htmlspecialchars(json_encode(array_values($similarities)), ENT_QUOTES, 'UTF-8'); ?>">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            Aucune donnée disponible.
        </div>
    <?php endif; ?>
</div>

<script src="Python-ia/Similariter/separate.js"></script>
</body>
</html>

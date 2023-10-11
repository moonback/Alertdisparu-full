<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "alertdisparu");

// Vérifiez si la connexion a réussi
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Initialisation de la requête SQL de base
$query = "SELECT * FROM posted WHERE status='Missing'";

// Traitement des critères de recherche
if (isset($_POST['date_disparition']) && !empty($_POST['date_disparition'])) {
    $date_disparition = mysqli_real_escape_string($conn, $_POST['date_disparition']);
    $query .= " AND disappearance_date = '$date_disparition'";
}

if (isset($_POST['localisation']) && !empty($_POST['localisation'])) {
    $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
    $query .= " AND city_from = '$localisation'";
}

if (isset($_POST['sexe']) && !empty($_POST['sexe'])) {
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $query .= " AND gender = '$sexe'";
}

// Ajoutez d'autres critères de recherche ici en suivant le même modèle

// Exécution de la requête SQL
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Erreur lors de la recherche : " . mysqli_error($conn);
} else {
    // Stockez les résultats dans un tableau
    $resultsArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $resultsArray[] = $row;
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!-- Options de tri pour les résultats -->
<section class="sort-section">
    <div class="container">
        <label for="tri">Trier par :</label>
        <select id="tri" name="tri">
            <option value="date_disparition">Date de Disparition</option>
            <option value="nom">Nom</option>
            <!-- Ajoutez d'autres options de tri ici -->
        </select>
    </div>
</section>

<!-- Affichage des résultats -->
<section class="results-section">
    <div class="container">
        <h2>Résultats de la recherche</h2>
        <div class="results-list">
            <?php
            // Vérifiez si des résultats sont disponibles
            if (!empty($resultsArray)) {
                foreach ($resultsArray as $result) {
                    echo "<div class='result'>";
                    echo "<h3>Nom : " . htmlspecialchars($result['name']) . "</h3>";
                    echo "<p>Date de Disparition : " . htmlspecialchars($result['disappearance_date']) . "</p>";
                    echo "<p>Sexe : " . htmlspecialchars($result['gender']) . "</p>";
                    // Ajoutez d'autres informations de résultat ici
                    echo "</div>";
                }
            } else {
                echo "Aucun résultat trouvé.";
            }
            ?>
        </div>
    </div>

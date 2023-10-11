<?php
include 'config.php';
include 'navbar.php';
function getDaysSinceDisappearance($disappearanceDate) {
    $now = new DateTime();
    $disappearanceDate = new DateTime($disappearanceDate);
    $interval = $now->diff($disappearanceDate);
    return $interval->days;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Avancée - AlertDisparu</title>
    <link rel="stylesheet" href="../style2.css">
    <style>
       
/* Style pour le formulaire de recherche */
.search-section {
    background-color: #254458; /* Couleur de fond similaire aux autres pages */
    padding: 50px 0; /* Espacement intérieur supérieur et inférieur */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Ombre de boîte */
    transition: background-color 0.3s ease; /* Animation de changement de couleur de fond */
}

.search-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: box-shadow 0.3s ease; /* Animation de l'ombre de boîte */
}

.search-form:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Ombre de boîte plus prononcée au survol */
}
/* Styles CSS pour le formulaire de recherche */
.form-group {
    display: flex; /* Utilisation de flexbox pour aligner les éléments horizontalement */
    align-items: center; /* Alignement vertical au centre */
    margin-bottom: 20px;
}

/* Style pour les libellés des champs */
label {
    flex: 1; /* Laisse le libellé occuper tout l'espace disponible */
    font-weight: bold;
    margin-right: 10px; /* Espacement entre le libellé et le champ */
}

/* Style pour les champs de saisie */
input[type="date"],
input[type="text"],
select {
    flex: 2; /* Laisse le champ occuper deux fois plus d'espace que le libellé */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: auto; /* Largeur automatique pour s'adapter au contenu */
}

/* Bouton de recherche */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    flex: 1; /* Laisse le bouton occuper tout l'espace disponible */
    margin: 0 auto; /* Centre le bouton horizontalement */
    display: block; /* Assurez-vous qu'il occupe toute la largeur disponible */
}


    </style>
</head>

<body>

    <main>
        <section class="bg-blueDark">
            <div class="container-fluid">
                
            </div>
        </section>
        <section class="search-section">
            <div class="container text-center white">
                <h2>Filtrez les Personnes Disparues</h2><br>
                <form action="recherche.php" method="POST" class="search-form">
                    <div class="form-group">
                        <label for="date_disparition">Date de Disparition :</label>
                        <input type="date" id="date_disparition" name="date_disparition">
                    </div>
                    <div class="form-group">
                        <label for="localisation">Localisation :</label>
                        <input type="text" id="localisation" name="localisation">
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe :</label>
                        <select id="sexe" name="sexe">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="race">Race :</label>
                        <input type="text" id="race" name="race">
                    </div>
                    <!-- Ajoutez d'autres critères de recherche ici -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Section pour afficher les résultats -->
        
        <section class="bg-blueDark">
    <div class="container-fluid">
        <div>
            <h2 class="white text-center">
                Avez-vous vu ces<span class="orange-white-rect"><span class="blink"><span>
                            personnes disparues ?
                        </span></span></span>
            </h2>
        </div>
    </div>

    <div class="grid-disparitions">
        <div class="container">
            <div class="row items">
                <?php
                // Exemple de connexion à une base de données MySQL
                $conn = mysqli_connect("localhost", "root", "", "alertdisparu");

                // Vérifiez si la connexion a réussi
                if (!$conn) {
                    die("Erreur de connexion : " . mysqli_connect_error());
                }

                $fetch = mysqli_query($conn, "SELECT * FROM posted WHERE status='Missing'");

                if (!$fetch) {
                    echo "Erreur lors de la récupération des données : " . mysqli_error($conn);
                } else {
                    while ($row = mysqli_fetch_assoc($fetch)) {
                        $images = explode(",", $row['posted_image']);
                        $disappearanceDate = $row['disappearance_date'];
                        $dob = new DateTime($row['dob']);
                        $now = new DateTime();
                        $ageAtDisappearance = $dob->diff(new DateTime($disappearanceDate))->y; // Calcul de l'âge lors de la disparition
                        $age = $dob->diff($now)->y; // Calcul de l'âge actuel
                        $daysSinceDisappearance = getDaysSinceDisappearance($disappearanceDate);
                ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-5 pb-4">
                            <div class="card">
                                <img src="images-missing/<?= $images[0] ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($row['gender']) ?>, <?= htmlspecialchars($row['race']) ?></p>
                                    <p class="card-text">Né(e) le : <?= (new DateTime($row['dob']))->format('d/m/Y') ?> (<?= $age ?> ans)</p>
                                    <p class="card-text">Disparu(e) le : <?= (new DateTime($row['disappearance_date']))->format('d/m/Y') ?> avait <?= $ageAtDisappearance ?> ans</p>
                                    <p class="card-text">De <?= htmlspecialchars($row['city_from']) ?></p>
                                    <p class="card-text">Disparu à <?= htmlspecialchars($row['last_location']) ?></p>
                                    <a href="view_posted.php?posted_Id=<?= intval($row['post_Id']) ?>" class="btn btn-primary">Voir le profil</a>
                                    <a href="#" class="btn btn-warning">Signaler une information</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

    </main>

    <?php
    include 'footer.php';
    ?>
</body>

</html>

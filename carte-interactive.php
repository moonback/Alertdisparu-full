<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AlertDisparu | Missing person</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Ajoutez des styles CSS personnalisés pour la carte ici */
        #map {
            height: 500px;
        }

        /* Styles pour la liste de profils */
        .profile-list {
            display: flex;
            flex-wrap: wrap;
        }

        .profile {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            width: calc(25% - 32px); /* 4 cartes par ligne */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.2s ease-in-out;
        }

        .profile:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Style pour le titre des cartes */
        .profile h3 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

        /* Style pour les autres informations dans les cartes */
        .profile p {
            font-size: 16px;
            margin: 8px 0;
            color: #666;
        }

        /* Style pour les cartes "Missing" */
        .profile.missing {
            border-color: #ff6347; /* Couleur rouge pour les profils "Missing" */
        }

        /* Style pour les cartes "Found" */
        .profile.found {
            border-color: #32cd32; /* Couleur verte pour les profils "Found" */
        }

        /* Styles pour la section de carte */
        .card-section {
            padding: 20px;
        }

        /* Styles pour les cartes */
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 14px;
            margin: 5px 0;
        }

        /* Cachez la section de carte par défaut */
        .card-section.hidden {
            display: none;
        }
    </style>
</head>
<body>
<?php 
include 'navbar.php'; 
?>
<section class="top-title">
    <div class="container-fluid">
        <div class="banner-top-title" style="background-image: url(https://www.116000enfantsdisparus.fr/wp-content/uploads/2023/03/AdobeStock_294915592.png);">
            <div class="overlay"></div>
        </div>
        <div class="container">
            <p id="breadcrumbs"><span><span><a href="https://www.116000enfantsdisparus.fr/">Accueil</a></span> &gt; <span><a href="https://www.116000enfantsdisparus.fr/agir-en-cas-de-disparition/">Agir en cas de disparition</a></span> &gt; <span class="breadcrumb_last" aria-current="page">Fugue</span></span></p>            <h1 class="text-white">Retrouver les cas de disparition </h1>
                            <p class="orange-white-rect"><span class="orange-white-rect blink"><span>
    à proximité
</span></span></p>
                    </div>
    </div>
</section>
<div id="map"></div>
<div class="content-wrapper">
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alertdisparu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }
    
    // Récupérez les profils "Missing"
    $sqlMissing = "SELECT * FROM posted WHERE status = 'Missing'";
    $resultMissing = $conn->query($sqlMissing);
    
    // Récupérez les profils "Found"
    $sqlFound = "SELECT * FROM posted WHERE status = 'Found'";
    $resultFound = $conn->query($sqlFound);
    ?>

    <!-- Affichez les profils sous forme de cartes -->
    <section class="card-section">
        <div class="container-fluid">
            <div class="row profile-list">
                <?php
                while ($row = $resultMissing->fetch_assoc()) {
                    echo '<div class="col-md-3 profile missing">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>Disparu le : ' . $row['disappearance_date'] . '</p>';
                    echo '<p>Genre : ' . $row['gender'] . '</p>';
                    echo '<p>Race : ' . $row['race'] . '</p>';
                    echo '<p>Emplacement : ' . $row['last_location'] . '</p>';
                    echo '<p>Contact : ' . $row['contact'] . '</p>';
                    echo '<p>Email : ' . $row['email'] . '</p>';
                    // Ajoutez d'autres informations du profil ici
                    echo '</div>';
                }

                while ($row = $resultFound->fetch_assoc()) {
                    echo '<div class="col-md-3 profile found">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>Disparu le : ' . $row['disappearance_date'] . '</p>';
                    echo '<p>Genre : ' . $row['gender'] . '</p>';
                    echo '<p>Race : ' . $row['race'] . '</p>';
                    echo '<p>Emplacement : ' . $row['last_location'] . '</p>';
                    echo '<p>Contact : ' . $row['contact'] . '</p>';
                    echo '<p>Email : ' . $row['email'] . '</p>';
                    // Ajoutez d'autres informations du profil ici
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="map.js"></script>

<!-- Ajoutez ici votre bouton pour basculer entre les vues -->
<button id="switchViewButton" class="btn btn-primary">Basculer vers la vue en liste</button>
<script>
  const cardSection = document.querySelector('.card-section');
  const tableViewButton = document.getElementById('switchViewButton');

  tableViewButton.addEventListener('click', function () {
    cardSection.classList.toggle('hidden');
  });
</script>
</body>
</html>

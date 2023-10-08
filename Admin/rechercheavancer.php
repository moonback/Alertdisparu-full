<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>AlertDisparu | Recherche Avancée</title>
    <!-- Ajoutez ici vos liens CSS et autres balises meta si nécessaire -->
</head>
<style>
        /* Ajoutez du CSS pour gérer la mise en page des résultats */
        .result-card2 {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: calc(25% - 20px); /* 4 cartes par ligne */
            display: inline-block;
            vertical-align: top;
            box-sizing: border-box;
        }

        /* Ajoutez ici d'autres styles CSS au besoin */
    </style>
<body>

    <?php include 'navbar.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Recherche avancée</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
                            <li class="breadcrumb-item active">Recherche avancée</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form method="post" id="search-form">
                            <!-- Ville -->
                            <div class="form-group">
                                <label for="ville">Ville :</label>
                                <input type="text" class="form-control" name="ville" id="ville">
                            </div>

                            <!-- Genre -->
                            <div class="form-group">
                                <label for="genre">Genre :</label>
                                <select class="form-control" name="genre" id="genre">
                                    <option value="">Tous</option>
                                    <option value="homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="autres">Autre</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status :</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Tous</option>
                                    <option value="Missing">Rechercher</option>
                                    <option value="Found">Retrouver</option>
                                </select>
                            </div>

                            <!-- ... (ajoutez d'autres champs de recherche ici) -->

                            <!-- Nom (similarité) -->
                            <div class="form-group">
                                <label for="name">Nom (similarité) :</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>

                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div id="results"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fuzzyset.js/0.0.3/fuzzyset.min.js"></script>
    <script>
        document.getElementById('search-form').addEventListener('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('search.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => displayResults(data))
                .catch(error => console.error(error));
        });

        function displayResults(results) {
            var resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = ''; // Efface les résultats précédents

            if (results.length === 0) {
                resultsDiv.innerHTML = 'Aucun résultat trouvé.';
            } else {
                // Obtenez l'entrée de l'utilisateur pour la recherche de nom
                var searchName = document.getElementById('name').value.trim();

                // Configurez fuse.js pour la recherche
                var options = {
                    keys: [
                        'name',
                        'city_from',
                        'gender',
                        'status',
                        'height',
                        'weight',
                        'hair_color',
                        'tattoos',
                        'scars',
                        'hobbies',
                        'last_location',
                        'last_person_with'
                    ],
                    includeScore: true,
                    threshold: 0.5, // Ajustez le seuil de similarité ici (0.5 est un exemple)
                };

                var fuse = new Fuse(results, options);
                var searchResults = fuse.search(searchName);

                if (searchResults.length === 0) {
                    resultsDiv.innerHTML = 'Aucun résultat trouvé.';
                } else {
                    searchResults.forEach(function (result) {
                        if (result.score <= options.threshold) {
                            var resultCard = document.createElement('div');
                            resultCard.className = 'result-card2';

                            var data = result.item;

                            resultCard.innerHTML =
                                '<div class="left-column">' +
                                '<strong>' + data.name + '</strong><br>' +
                                'Ville: ' + data.city_from + '<br>' +
                                'Genre: ' + data.gender + '<br>' +
                                'Status: ' + data.status + '<br>' +
                                'Hauteur: ' + data.height + '<br>' +
                                'Poids: ' + data.weight + '<br>' +
                                'Couleur des cheveux: ' + data.hair_color + '<br>' +
                                'Tatouages: ' + data.tattoos + '<br>' +
                                'Cicatrices: ' + data.scars + '<br>' +
                                'Hobbies: ' + data.hobbies + '<br>' +
                                'Dernière localisation connue: ' + data.last_location + '<br>' +
                                'Dernière personne en compagnie: ' + data.last_person_with + '<br>' +
                                'Récompense offerte: ' + (data.reward ? 'Oui' : 'Non') + '<br>' +
                                '</div>' +
                                '<div class="right-column">' +
                                'Champs similaires :<br>' +
                                'Race: ' + data.race + '<br>' +
                                'Date de disparition: ' + data.disappearance_date + '<br>' +
                                'Âge: ' + data.age + '<br>' +
                                '</div>';

                            resultsDiv.appendChild(resultCard);
                        }
                    });
                }
            }
        }
    </script>

    <?php include 'footer.php'; ?>

</body>

</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte interactive</title>
    <!-- Inclure la bibliothèque Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        /* Styles pour la carte */
        #map {
            height: 500px;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([0, 0], 2);

        // Ajouter une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Données JSON
        var data = [
            {
                "name": "Fiona Brown",
                "last_location": "6638 Maple St, New York, 77889"
            },
            {
                "name": "Autre Personne",
                "last_location": "1234 Elm St, Paris, 12345"
            }
            // Ajoutez d'autres données ici
        ];

        // Parcourir les données JSON et ajouter des marqueurs à la carte
        data.forEach(function (item) {
            // Extraire la latitude et la longitude depuis le champ "last_location"
            var locationParts = item.last_location.split(', ');
            var latitude = parseFloat(locationParts[0]);
            var longitude = parseFloat(locationParts[1]);

            // Créer un marqueur pour chaque personne
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup(item.name) // Afficher le nom comme popup au clic
                .openPopup();
        });
    </script>
</body>
</html>

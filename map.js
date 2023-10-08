// Initialisez la carte
var map = L.map('map').setView([48.8566, 2.3522], 12); // Coordonnées de Paris

// Ajoutez une couche de carte OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Lisez le fichier JSON
fetch('donnees.json')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Parcourez les données et ajoutez des marqueurs pour chaque élément
    data.forEach(item => {
      // Utilisez le service de géocodage pour obtenir les coordonnées (lat, lon) à partir de l'adresse
      const address = item.last_location;
      fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(geocodedData => {
          if (geocodedData && geocodedData.length > 0) {
            const lat = parseFloat(geocodedData[0].lat);
            const lon = parseFloat(geocodedData[0].lon);

            // Créez le contenu du popup personnalisé en utilisant les données JSON
            var popupContent = `
              <b>${item.name}</b><br>
              Disparu le ${item.disappearance_date}<br>
              Sexe : ${item.gender}<br>
              Race : ${item.race}<br>
              Contact : ${item.contact}<br>
              Email : ${item.email}<br>
              Statut : ${item.status}
            `;

            // Ajoutez un marqueur pour chaque élément avec le popup personnalisé
            var marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(popupContent);
          }
        })
        .catch(error => console.error(error));
    });
  })
  .catch(error => console.error(error));

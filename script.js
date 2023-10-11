document.addEventListener('DOMContentLoaded', function () {
    const searchBtn = document.getElementById('searchBtn');
    searchBtn.addEventListener('click', search);
});

function search() {
    const name = document.getElementById('name').value;
    const gender = document.getElementById('gender').value;
    const race = document.getElementById('race').value;
    const status = document.getElementById('status').value;

    // Faites une requête AJAX vers votre API Flask
    fetch(`http://localhost:5000/api/search?name=${name}&gender=${gender}&race=${race}&status=${status}`)
        .then(response => response.json())
        .then(data => {
            // Traitez les résultats de la recherche et affichez-les dans la div #results
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = ''; // Effacez les résultats précédents

            if (data.length === 0) {
                resultsDiv.innerHTML = 'Aucun résultat trouvé.';
            } else {
                data.forEach(entry => {
                    const entryDiv = document.createElement('div');
                    entryDiv.textContent = `Nom: ${entry.name}, Genre: ${entry.gender}, Race: ${entry.race}, Statut: ${entry.status}`;
                    resultsDiv.appendChild(entryDiv);
                });
            }
        })
        .catch(error => console.error('Erreur lors de la recherche :', error));
}

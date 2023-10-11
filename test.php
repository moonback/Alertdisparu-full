<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Personnes Disparues</title>
    <link rel="stylesheet" href="style2.css"> <!-- Assurez-vous d'inclure votre fichier CSS -->
</head>
<body>
    <h1>Recherche de Personnes Disparues</h1>
    <div class="search-form">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name">
        
        <label for="gender">Genre :</label>
        <select id="gender" name="gender">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <!-- Ajoutez d'autres options de genre -->
        </select>
        
        <label for="race">Race :</label>
        <input type="text" id="race" name="race">
        
        <label for="status">Statut :</label>
        <select id="status" name="status">
            <option value="Missing">Disparu</option>
            <option value="Found">Retrouvé</option>
        </select>
        
        <button id="searchBtn">Rechercher</button>
    </div>
    
    <div id="results">
        <!-- Les résultats de la recherche seront affichés ici -->
    </div>
    
    <script src="script.js"></script> <!-- Assurez-vous d'inclure votre fichier JavaScript -->
</body>
</html>

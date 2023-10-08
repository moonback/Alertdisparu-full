<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de personne disparue</title>
</head>
<body>
    <form action="search.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <br>

        <label for="age">Âge :</label>
        <input type="text" name="age" id="age">
        <br>

        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre">
        <br>

        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville">
        <br>

        <label for="statut">Statut :</label>
        <select name="statut" id="statut">
            <option value="Missing">Disparu</option>
            <option value="Found">Retrouvé</option>
        </select>
        <br>

        <input type="submit" value="Rechercher">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';
        $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
        $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
        $statut = isset($_POST['statut']) ? $_POST['statut'] : '';

        // Utilisez ces valeurs pour effectuer la recherche ou l'affichage des résultats.
        // Par exemple, vous pouvez construire une requête SQL pour rechercher dans votre base de données en utilisant ces valeurs.
    }
    ?>
</body>
</html>

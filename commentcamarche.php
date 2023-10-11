
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment ça marche</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header, main, footer {
            margin: 20px;
            padding: 20px;
        }

        /* Styles spécifiques à PC */
        @media only screen and (min-width: 768px) {
            main {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 20px;
            }
            section {
                padding: 20px;
                border: 1px solid #ccc;
            }
        }

        /* Styles spécifiques à mobile */
        @media only screen and (max-width: 767px) {
            main {
                display: block;
            }
            section {
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }
        }
    </style>
</head>

<body>

<?php
include 'config.php';
include 'navbar.php';
// include 'login.php';
?>

    <main>
        <section id="introduction">
            <h1>Comment ça marche</h1>
            <p>Bienvenue sur notre plateforme dédiée à faciliter la gestion des enquêtes sur les disparitions. Voici un guide étape par étape pour comprendre notre système.</p>
        </section>

        <section id="inscription">
            <h2>Étape 1 : Inscription et Connexion</h2>
            <ol>
                <li>Inscription : Cliquez sur le bouton "Inscription" et suivez les instructions.</li>
                <li>Connexion : Utilisez vos identifiants pour accéder à votre tableau de bord.</li>
            </ol>
        </section>

        <section id="saisie">
            <h2>Étape 2 : Saisie des Données</h2>
            <ol>
                <li>Dashboard : Accédez à un aperçu des cas en cours, des alertes et des mises à jour.</li>
                <li>Ajouter un Cas : Entrez les informations sur une personne disparue.</li>
            </ol>
        </section>

        <!-- ... Répétez pour chaque section ... -->

        <section id="assistance">
            <h2>Étape 7 : Assistance</h2>
            <ol>
                <li>Support : Notre équipe est là pour vous aider. Accédez au centre d'aide pour plus d'informations.</li>
            </ol>
        </section>
    </main>

    <footer>
        <!-- Votre pied de page ici -->
    </footer>

    <!-- Ajoutez vos scripts JS si nécessaire -->
    <script src="path_to_your_script.js"></script>
</body>

</html>

import openai
from github import Github
import logging
import json
import os

# Configuration de la journalisation
logging.basicConfig(filename='analyse_github.log', level=logging.INFO, format='%(asctime)s - %(levelname)s: %(message)s')

def read_config(config_file):
    try:
        with open(config_file, 'r', encoding='utf-8') as f:
            config = json.load(f)
        return config
    except Exception as e:
        logging.error(f'Erreur lors de la lecture du fichier de configuration : {str(e)}')
        raise

def main():
    config = read_config('IA-PYTHON/github/config.json')  # Utilisez un fichier de configuration externe pour stocker les clés d'API et autres paramètres sensibles.

    github_token = config.get('github_token')
    gpt3_api_key = config.get('gpt3_api_key')
    github_username = config.get('github_username')
    github_repo_name = config.get('github_repo_name')
    max_gpt3_tokens = config.get('max_gpt3_tokens', 100)

    try:
        # Initialisez l'objet GitHub en utilisant le token d'accès personnel.
        github = Github(github_token)

        # Récupérez le contenu du référentiel.
        user = github.get_user(github_username)
        repo = user.get_repo(github_repo_name)
        contents = repo.get_contents('')
    except Exception as e:
        logging.error(f'Erreur lors de la configuration de GitHub : {str(e)}')
        raise

    try:
        # Initialisez l'API GPT-3.
        openai.api_key = gpt3_api_key
    except Exception as e:
        logging.error(f'Erreur lors de la configuration de l\'API GPT-3 : {str(e)}')
        raise

    # Dictionnaire pour stocker les résultats.
    results = []

    # Parcourez les fichiers du référentiel et analysez leur contenu avec GPT-3.
    for content_file in contents:
        if content_file.type == 'file':
            file_name = content_file.name
            file_content = content_file.decoded_content.decode('utf-8')
            
            # Divisez le contenu en segments de 2049 tokens maximum.
            segments = [file_content[i:i+2049] for i in range(0, len(file_content), 2049)]

            # Analysez chaque segment avec GPT-3.
            analyzed_content = ""
            for segment in segments:
                analyzed_content += analyze_text_with_gpt3(segment, max_gpt3_tokens)
            
            # Ajoutez les résultats au dictionnaire.
            results.append({
                "Nom du fichier": file_name,
                "Contenu original": file_content,
                "Contenu analysé": analyzed_content
            })

    # Enregistrez les résultats dans un fichier JSON.
    output_file = 'IA-PYTHON/github/analyse_github.json'
    try:
        with open(output_file, 'w', encoding='utf-8') as json_file:
            json.dump(results, json_file, ensure_ascii=False, indent=4)
    except Exception as e:
        logging.error(f'Erreur lors de l\'enregistrement des résultats dans le fichier JSON : {str(e)}')

    # Journalise la fin du processus
    logging.info('Analyse GitHub terminée avec succès.')

def analyze_text_with_gpt3(text_segment, max_tokens):
    try:
        response = openai.Completion.create(
            engine="davinci",  # Vous pouvez utiliser d'autres engines selon vos besoins.
            prompt=text_segment,
            max_tokens=max_tokens
        )
        return response.choices[0].text.strip()
    except Exception as e:
        logging.error(f'Erreur lors de l\'analyse du texte avec GPT-3 : {str(e)}')
        raise
# Afficher les résultats
for result in results:
    print(f"Nom du fichier : {result['Nom du fichier']}")
    print(f"Contenu original : {result['Contenu original']}")
    print(f"Contenu analysé : {result['Contenu analysé']}")
    print("\n" + "=" * 50 + "\n")  # Pour séparer les résultats
if __name__ == "__main__":
    main()

from flask import Flask, request, jsonify
from github import Github
import openai

app = Flask(__name__)

# Stockage temporaire de l'analyse du dépôt
repo_analysis = {}

# Configuration de l'API OpenAI
openai.api_key = "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"

@app.route('/analyse', methods=['POST'])
def analyse():
    data = request.json
    repo_name = data.get('repo_name', '')

    # Authentification GitHub et accès au dépôt
    g = Github("ghp_VotreTokenIci")
    repo = g.get_repo(repo_name)
    
    # Initialisation de l'analyse
    analysis = {}

    # Parcourir les fichiers du dépôt
    for file in repo.get_contents(""):
        if file.name.endswith('.py'):
            lines = file.decoded_content.decode().split('\n')
            analysis[file.name] = len(lines)

    repo_analysis[repo_name] = analysis

    return jsonify({"status": "Analyse complétée", "analysis": analysis})

@app.route('/dialogue', methods=['POST'])
def dialogue():
    data = request.json
    user_input = data.get('user_input', '')
    repo_name = data.get('repo_name', '')

    analysis_result = repo_analysis.get(repo_name, 'Pas d\'analyse disponible')
    
    # Interagir avec ChatGPT
    gpt_response = openai.Completion.create(
        engine="text-davinci-002",
        prompt=user_input,
        max_tokens=100
    )

    gpt_output = gpt_response.choices[0].text.strip()

    return jsonify({
        "response": f"Résultat de l'analyse pour {repo_name}: {analysis_result}",
        "gpt_response": gpt_output
    })

if __name__ == '__main__':
    app.run(ssl_context='adhoc')  # Utilisez un certificat SSL approprié en production

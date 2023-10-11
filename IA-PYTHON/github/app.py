from flask import Flask, request, jsonify
from github import Github
import openai

# Initialisation de l'application Flask
app = Flask(__name__)

# Stockage temporaire de l'analyse du dépôt
repo_analysis = {}

# Configuration de l'API OpenAI
openai.api_key = "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"

# Fonction pour obtenir tous les fichiers d'un dépôt GitHub
def get_all_files(repo, path=''):
    files = []
    contents = repo.get_contents(path)
    for content in contents:
        if content.type == 'dir':
            files.extend(get_all_files(repo, content.path))
        else:
            files.append(content)
    return files

# Route pour l'analyse du dépôt
@app.route('/analyse', methods=['POST'])
def analyse():
    data = request.json
    repo_name = data.get('repo_name', '')

    # Authentification GitHub et accès au dépôt
    g = Github("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")
    repo = g.get_repo(repo_name)

    # Obtention de tous les fichiers
    all_files = get_all_files(repo)
    file_names = [f.name for f in all_files]
    
    # Initialisation de l'analyse
    analysis = {}

    for file in all_files:
        if file.name.endswith('.py'):
            lines = file.decoded_content.decode().split('\n')
            analysis[file.name] = len(lines)

    repo_analysis[repo_name] = {
        "analysis": analysis,
        "file_names": file_names
    }

    return jsonify({"status": "Analyse complétée", "result": repo_analysis[repo_name]})

# Route pour la conversation avec GPT-3
@app.route('/dialogue', methods=['POST'])
def dialogue():
    data = request.json
    user_input = data.get('user_input', '')
    repo_name = data.get('repo_name', '')
    
    repo_info = repo_analysis.get(repo_name, 'Pas d\'analyse disponible')
    
    # Interagir avec ChatGPT
    gpt_response = openai.Completion.create(
        engine="text-davinci-002",
        prompt=user_input,
        max_tokens=100
    )
    gpt_output = gpt_response.choices[0].text.strip()

    return jsonify({
        "repo_info": repo_info,
        "gpt_response": gpt_output
    })

if __name__ == '__main__':
    app.run()  # L'argument ssl_context a été retiré pour des tests locaux

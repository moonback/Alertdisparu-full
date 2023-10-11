from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Activez CORS pour l'application Flask

# Exemple de données JSON (remplacez-le par vos données réelles)
data = [
    {
        "name": "John Doe",
        "gender": "Homme",
        "race": "Blanc",
        "status": "Missing"
    },
    {
        "name": "Jane Smith",
        "gender": "Femme",
        "race": "Noir",
        "status": "Found"
    }
]

@app.route('/api/search', methods=['GET'])
def search():
    name = request.args.get('name')
    gender = request.args.get('gender')
    race = request.args.get('race')
    status = request.args.get('status')

    # Effectuez votre logique de recherche ici (filtrez les données en fonction des critères)

    # Exemple simple : filtrer les données en fonction des critères de recherche
    results = [entry for entry in data if
               (name is None or entry['name'] == name) and
               (gender is None or entry['gender'] == gender) and
               (race is None or entry['race'] == race) and
               (status is None or entry['status'] == status)]

    return jsonify(results)

if __name__ == '__main__':
    app.run(debug=True)

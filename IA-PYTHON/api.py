from flask import Flask, request, jsonify
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

app = Flask(__name__)

# Charger les données JSON dans un DataFrame
data = pd.read_json('IA-PYTHON/donnees.json')

# Supprimer les doublons et gérer les valeurs manquantes
data = data.drop_duplicates().dropna()

# Sélectionner les colonnes pertinentes pour la vectorisation des descriptions
correspondance_data_text = data[['name', 'clothing', 'last_location']]

# Concaténer les valeurs textuelles en une seule colonne
correspondance_data_text['text_data'] = correspondance_data_text.apply(lambda x: ' '.join(x), axis=1)

# Utiliser TF-IDF pour vectoriser les descriptions
tfidf_vectorizer = TfidfVectorizer()
tfidf_matrix = tfidf_vectorizer.fit_transform(correspondance_data_text['text_data'])

# Calculer les similarités cosinus entre les profils
similarities = cosine_similarity(tfidf_matrix, tfidf_matrix)

def rechercher_profiles_similaires(nom_profil, seuil_similarity=0.7):
    index_profil = correspondance_data_text[correspondance_data_text['name'] == nom_profil].index[0]
    similar_profiles = []

    for i in range(len(similarities)):
        if i != index_profil and similarities[index_profil][i] > seuil_similarity:
            similar_profiles.append(correspondance_data_text['name'].iloc[i])

    return similar_profiles

@app.route('/rechercher_profiles_similaires', methods=['GET'])
def rechercher_profiles_similaires_api():
    nom_profil = request.args.get('nom_profil')
    if nom_profil is None:
        return jsonify({"erreur": "Le paramètre 'nom_profil' est requis."}), 400

    seuil_similarity = float(request.args.get('seuil_similarity', 0.7))
    similar_profiles = rechercher_profiles_similaires(nom_profil, seuil_similarity)
    
    return jsonify({"profils_similaires": similar_profiles})

if __name__ == '__main__':
    app.run(debug=True)

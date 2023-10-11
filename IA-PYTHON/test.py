import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

def rechercher_profiles_similaires(json_file, seuil_similarity=0.7):
    # Charger les données JSON dans un DataFrame
    data = pd.read_json(json_file)

    # Supprimer les doublons (s'il y en a)
    data = data.drop_duplicates()

    # Gérer les valeurs manquantes (s'il y en a)
    data = data.dropna()

    # Sélectionner les colonnes pertinentes pour la vectorisation des descriptions
    correspondance_data_text = data[['name', 'clothing', 'last_location']]

    # Concaténer les valeurs textuelles en une seule colonne
    correspondance_data_text['text_data'] = correspondance_data_text.apply(lambda x: ' '.join(x), axis=1)

    # Utiliser TF-IDF pour vectoriser les descriptions
    tfidf_vectorizer = TfidfVectorizer()
    tfidf_matrix = tfidf_vectorizer.fit_transform(correspondance_data_text['text_data'])

    # Calculer les similarités cosinus entre les profils
    similarities = cosine_similarity(tfidf_matrix, tfidf_matrix)

    # Trouver les paires de profils similaires
    similar_profiles = []
    for i in range(len(similarities)):
        for j in range(i + 1, len(similarities)):
            if similarities[i][j] > seuil_similarity:
                profile1 = correspondance_data_text['name'].iloc[i]
                profile2 = correspondance_data_text['name'].iloc[j]
                similar_profiles.append((profile1, profile2))

    return similar_profiles

# Exemple d'utilisation de la fonction
similar_profiles = rechercher_profiles_similaires('IA-PYTHON/donnees.json', seuil_similarity=0.7)
print("Paires de profils similaires :")
for profile_pair in similar_profiles:
    print(f"{profile_pair[0]} est similaire à {profile_pair[1]}")

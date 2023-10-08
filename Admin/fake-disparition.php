<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alertdisparu";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Fonctions pour générer des données aléatoires
function generateRandomName() {
    $firstNames = [
        'Alice', 'Bob', 'Charlie', 'Dave', 
        'Ella', 'Fiona', 'George', 'Hannah',
        'Irene', 'Jack', 'Katie', 'Leo',
        'Mia', 'Nina', 'Oscar', 'Paula',
        'Quincy', 'Rita', 'Sam', 'Tina',
        'Ursula', 'Vera', 'Will', 'Xena',
        'Yara', 'Zane', 'Quinn', 'Riley', 'Jordan',
        'Zachary', 'Yasmine', 'Xavier', 'William',
        'Vanessa', 'Uriel', 'Theresa', 'Samuel',
        'Rachel', 'Quentin', 'Patricia', 'Olivia',
        'Nathan', 'Michelle', 'Leonardo', 'Katherine',
        'Justin', 'Hannah', 'Gabriel', 'Emma'
    ];
    
    $lastNames = [
        'Dupont', 'Smith', 'Johnson', 'Brown', 'Lee',
        'Garcia', 'Davis', 'Miller', 'Wilson', 'Martinez',
        'Harris', 'Clark', 'Anderson', 'Thomas', 'Hall',
        'Moore', 'Lopez', 'White', 'King', 'Scott'
    ];

    // Mélanger les listes de prénoms et de noms de famille
    shuffle($firstNames);
    shuffle($lastNames);

    // Prendre le premier nom de chaque liste
    $firstName = array_pop($firstNames);
    $lastName = array_pop($lastNames);

    return $firstName . ' ' . $lastName;
}

function generateRandomDate() {
    $timestamp = rand(strtotime("1970-01-01"), strtotime("2023-01-01"));
    return date("Y-m-d", $timestamp);
}

function generateRandomGender() {
    $genders = ['Homme', 'Femme', 'Transgenre'];
    return $genders[array_rand($genders)];
}


function generateRandomRace() {
    $races = ['Blanc', 'Noir', 'Asiatique', 'Métis', 'Indigène', 'Arabe', 'Autre', 'Latinx', 'Pacifique', 'Sud-Asiatique'];
    return $races[array_rand($races)];
}



function generateRandomHeight() {
    return rand(100, 200) . " cm";
}

function generateRandomWeight() {
    return rand(20, 170) . " kg";
}

function generateRandomHairColor() {
    $colors = ['Noir', 'Blond', 'Brun', 'Roux', 'Châtain', 'Auburn', 'Gris', 'Blanc'];
    return $colors[array_rand($colors)];
}


function generateRandomContact() {
    return 'Contact' . rand(1, 100);
}

function generateRandomCity() {
    $cities = [
        'Paris', 'Lyon', 'Marseille', 'Toulouse', 'Nantes', // France
        'New York', 'Los Angeles', 'Chicago', // USA
        'Tokyo', 'Osaka', // Japon
        'London', 'Manchester', // Royaume-Uni
        'Berlin', 'Munich', // Allemagne
        'Sydney', 'Melbourne', // Australie
        'Toronto', 'Vancouver', // Canada
        'Rio de Janeiro', 'São Paulo', // Brésil
        'Moscow', 'St. Petersburg', // Russie
        'Beijing', 'Shanghai', // Chine
        'Mumbai', 'Delhi', // Inde
        'Cairo', 'Alexandria', // Égypte
        'Madrid', 'Barcelona', // Espagne
        'Rome', 'Milan', // Italie
        'Amsterdam', 'Rotterdam', // Pays-Bas
        'Dubai', 'Abu Dhabi', // Émirats arabes unis
        'Seoul', 'Busan', // Corée du Sud
        'Mexico City', 'Guadalajara', // Mexique
        'Buenos Aires', 'Cordoba' // Argentine
    ];
    return $cities[array_rand($cities)];
}


function generateRandomPronouns() {
    $pronouns = ['il/lui', 'elle/elle', 'iel/iel', 'autre'];
    return $pronouns[array_rand($pronouns)];
}

function generateRandomEyeColor() {
    $eyeColors = ['bleu', 'marron', 'vert', 'gris', 'noisette', 'ambre', 'noir'];
    return $eyeColors[array_rand($eyeColors)];
}


function generateRandomClothing() {
    $clothing = ['jean et t-shirt', 'robe', 'costume', 'sportswear', 'pull et pantalon', 'jupe et chemisier', 'shorts et débardeur', 'pyjama', 'manteau et écharpe', 'uniforme', 'vêtements de travail', 'tenue de soirée', 'blouse et pantalon', 'chemise et cravate', 'salopette', 'maillot de bain', 'tenue de ski', 'vêtements de yoga', 'costume traditionnel', 'vêtements de randonnée', 'maillot de bain une pièce', 'vêtements de plage', 'vêtements de pluie', 'vêtements de cyclisme', 'vêtements de danse', 'vêtements de gymnastique', 'vêtements de jogging', 'vêtements de pêche', 'vêtements de plongée', 'vêtements de ski nautique'];
    return $clothing[array_rand($clothing)];
}


function generateRandomEmail() {
    return 'email' . rand(1, 100) . '@example.com';
}

function generateRandomHeadColor() {
    $colors = ['Brun', 'Blond', 'Roux', 'Noir', 'Gris', 'Blanc', 'Châtain', 'Auburn'];
    return $colors[array_rand($colors)];
}


function generateRandomDyeColor() {
    $colors = ['Bleu', 'Vert', 'Rose', 'Rouge', 'Violet', 'Aucun', 'Orange', 'Jaune', 'Marron', 'Noir'];
    return $colors[array_rand($colors)];
}


function generateRandomEye() {
    $eyeColors = ['Bleu', 'Marron', 'Vert', 'Gris', 'Noisette', 'Ambre', 'Noir'];
    return $eyeColors[array_rand($eyeColors)];
}


function generateRandomTeeth() {
    $teethTypes = ['Normal', 'Bracelet', 'Cassé', 'Manquant', 'Couronne', 'Blanchi', 'Vampire', 'Pointues', 'Crochues', 'Carie', 'Implant', 'Déchaussées', 'Décolorées', 'Tordues', 'Alignées', 'Saines', 'Régulières', 'Irrégulières', 'Prothétiques', 'Espace', 'Petites', 'Grandes', 'Inégales', 'Ébréchées', 'Jaunes', 'Transparentes', 'Translucides', 'Dent de sagesse'];
    return $teethTypes[array_rand($teethTypes)];
}


function generateRandomScars() {
    $scars = ['Aucun', 'Visage', 'Bras', 'Jambe', 'Dos'];
    return $scars[array_rand($scars)];
}

function generateRandomPiercings() {
    $piercings = ['Aucun', 'Oreille', 'Nez', 'Langue', 'Nombril', 'Sourcil', 'Lèvre', 'Téton', 'Septum', 'Tragus', 'Industriel', 'Cartilage', 'Labret', 'Rook', 'Daith', 'Helix', 'Conque', 'Smiley', 'Jestrum', 'Medusa', 'Snake Bites', 'Angel Bites', 'Dahlia', 'Cyber Bites', 'Monroe', 'Spider Bites', 'Ashley', 'Madonna', 'Vampire Bites', 'Snake Eyes'];
    return $piercings[array_rand($piercings)];
}


function generateRandomTattoos() {
    $tattoos = ['Aucun', 'Bras', 'Jambe', 'Dos', 'Poitrine', 'Épaule', 'Cou', 'Tête', 'Avant-bras', 'Cuisse', 'Mollet', 'Pied', 'Main', 'Doigt', 'Ventre', 'Nuque', 'Torse', 'Côtes', 'Hanche', 'Bas du dos', 'Coude', 'Poignet', 'Cheville', 'Oreille', 'Poignet intérieur', 'Doigt de pied', 'Epaule arrière', 'Cuisse intérieure', 'Mollet intérieur', 'Tête rasée'];
    return $tattoos[array_rand($tattoos)];
}


function generateRandomFootwear() {
    $footwears = ['Baskets', 'Chaussures en cuir', 'Sandales', 'Talons', 'Bottes', 'Mocassins', 'Tongs', 'Chaussures de sport', 'Ballerines', 'Bottes de randonnée', 'Chaussures de course', 'Escarpins', 'Derbies', 'Chaussures de skate', 'Chaussures de sécurité', 'Chaussures de travail', 'Chaussons', 'Chaussures de danse', 'Chaussures de plongée', 'Chaussures de cyclisme', 'Chaussures de ski', 'Chaussures de tennis', 'Chaussures de golf', 'Chaussures de basket-ball', 'Chaussures de football', 'Chaussures de baseball', 'Chaussures de cricket', 'Chaussures de volley-ball', 'Chaussures de badminton', 'Chaussures de squash'];
    return $footwears[array_rand($footwears)];
}


function generateRandomShoeSize() {
    return rand(26, 58);
}

function generateRandomCoat() {
    $coats = ['Manteau', 'Veste', 'Blouson', 'Parka', 'Aucun', 'Doudoune', 'Trench-coat', 'Imperméable', 'Cape', 'Manteau en laine', 'Manteau en cuir', 'Manteau en fausse fourrure', 'Manteau en duvet', 'Manteau en tweed', 'Manteau en cachemire', 'Manteau en velours', 'Manteau en daim', 'Manteau en shearling', 'Manteau en anorak', 'Manteau en puffer', 'Manteau en trench', 'Manteau en tricot', 'Manteau en jean', 'Manteau en soie', 'Manteau en brocart', 'Manteau en satin', 'Manteau en tulle', 'Manteau en sequins', 'Manteau en lin'];
    return $coats[array_rand($coats)];
}


function generateRandomHeadWear() {
    $headWears = ['Chapeau', 'Bonnet', 'Casquette', 'Aucun', 'Béret', 'Turban', 'Foulard', 'Bandana', 'Serre-tête', 'Couronne', 'Chapeau de cow-boy', 'Chapeau de paille', 'Chapeau melon', 'Casque de moto', 'Casque de vélo', 'Casque de chantier', 'Calot', 'Bandeau', 'Bob', 'Coiffe', 'Diadème', 'Chapeau de plage', 'Chapeau de soirée', 'Chapeau haut-de-forme', 'Chapeau de feutre', 'Chapeau de panama', 'Chapeau cloche', 'Chapeau de trappeur', 'Chapeau de sorcière', 'Chapeau de fête'];
    return $headWears[array_rand($headWears)];
}

function generateRandomJewelry() {
    $jewelries = ['Collier', 'Bracelet', 'Montre', 'Bague', 'Aucun', "Boucles d'oreilles", 'Pendentif', 'Broche', 'Charm', 'Pin\'s', 'Chaîne', 'Sautoir', 'Bijoux de cheveux', 'Bijoux de nez', 'Bijoux de nombril', 'Bijoux de langue', 'Bracelet de cheville', 'Bijoux de cheville', 'Jonc', 'Gourmette', 'Bijoux en argent', 'Bijoux en or', 'Bijoux en platine', 'Bijoux en diamant', 'Bijoux en perles', 'Bijoux en émeraude', 'Bijoux en saphir', 'Bijoux en rubis', 'Bijoux en opale', 'Bijoux en jade'];
    return $jewelries[array_rand($jewelries)];
}

function generateRandomEyewear() {
    $eyewears = ['Lunettes', 'Lentilles', 'Aucun', 'Lunettes de soleil', 'Lunettes de vue', 'Lunettes de lecture', 'Lunettes de sécurité', 'Lunettes de natation', 'Lunettes de plongée', 'Lunettes de protection', 'Lunettes de sport', 'Lunettes de réalité virtuelle', 'Lunettes de tir', 'Lunettes de ski', 'Lunettes de natation', 'Lunettes de cyclisme', 'Lunettes de motocross', 'Lunettes de ski nautique', 'Lunettes de snowboard', 'Lunettes de conduite', 'Lunettes anti-lumière bleue', 'Lunettes de protection UV', 'Lunettes de laboratoire', 'Lunettes de sécurité chimique', 'Lunettes de réalité augmentée', 'Lunettes de plongée en apnée', 'Lunettes de vision nocturne', 'Lunettes de lecture réglables', 'Lunettes de vision thermique', 'Lunettes de réalité mixte', 'Lunettes de protection laser'];
    return $eyewears[array_rand($eyewears)];
}


function generateRandomIllnesses() {
    $illnesses = ['Diabète', 'Hypertension', 'Asthme', 'Aucune', 'Cholestérol élevé', 'Arthrite', 'Maladie cardiaque', 'Cancer', 'Obésité', 'Dépression', 'Anxiété', 'Maladie pulmonaire obstructive chronique (MPOC)', 'Maladie d\'Alzheimer', 'Maladie de Parkinson', 'Sclérose en plaques', 'Épilepsie', 'Fibromyalgie', 'Spondylarthrite ankylosante', 'Maladie de Crohn', 'Colite ulcéreuse', 'Lupus', 'Polyarthrite rhumatoïde', 'Endométriose', 'Psoriasis', 'Maladie de Lyme', 'Sida (VIH)', 'Hépatite B', 'Hépatite C', 'Maladie de Kawasaki', 'Maladie de Wilson'];
    return $illnesses[array_rand($illnesses)];
}


function generateRandomDrugsAlcohol() {
    $choices = ['Oui', 'Non', 'Inconnu'];
    return $choices[array_rand($choices)];
}

function generateRandomHobbies() {
    $choices = ['Sport', 'Lecture', 'Peinture', 'Musique', 'Jardinage', 'Cuisine', 'Voyage', 'Photographie', 'Danse', 'Randonnée', 'Jeux vidéo', 'Cinéma', 'Théâtre', 'Écriture', 'Collection d\'objets', 'Escalade', 'Plongée sous-marine', 'Cyclisme', 'Pêche', 'Ski', 'Natation', 'Yoga', 'Méditation', 'Escalade', 'Observation des étoiles', 'Astronomie', 'Modélisme', 'Course à pied', 'Arts martiaux', 'Sculpture'];
    return $choices[array_rand($choices)];
}


function generateRandomGadgets() {
    $choices = ['Smartphone', 'Montre connectée', 'Aucun', 'Téléphone mobile', 'Ordinateur portable', 'Tablette', 'Autre'];
    return $choices[array_rand($choices)];
}


function generateRandomMedication() {
    $medications = ['Insuline', 'Antibiotiques', 'Antidépresseurs', 'Aucun', 'Anti-inflammatoires', 'Antalgiques', 'Antihypertenseurs', 'Anticoagulants', 'Antidiabétiques oraux', 'Antifongiques', 'Antiviraux', 'Antispasmodiques', 'Antitussifs', 'Antihistaminiques', 'Antiémétiques', 'Antiacides', 'Antipyrétiques', 'Analgésiques', 'Laxatifs', 'Sédatifs', 'Bronchodilatateurs', 'Immunosuppresseurs', 'Stimulants', 'Hormones thyroïdiennes', 'Corticostéroïdes', 'Anticonvulsivants', 'Antipsychotiques', 'Antihypertenseurs', 'Chimiothérapie', 'Hormonothérapie'];
    return $medications[array_rand($medications)];
}


function generateRandomStatus() {
    $status = ['Missing', 'Found'];
    return $status[array_rand($status)];
}
function generateRandomLastLocation() {
    $streetNames = ['Main', 'High', 'Oak', 'Pine', 'Maple', 'Cedar', 'Elm'];
    $streetTypes = ['St', 'Ave', 'Rd', 'Blvd', 'Ln', 'Dr'];
    $cityNames = ['Paris', 'New York', 'Tokyo', 'London', 'Berlin', 'Sydney'];
    $zipCodes = ['12345', '67890', '11223', '44556', '77889', '99880'];

    $street = $streetNames[array_rand($streetNames)] . " " . $streetTypes[array_rand($streetTypes)];
    $houseNumber = rand(1, 9999);
    $city = $cityNames[array_rand($cityNames)];
    $zip = $zipCodes[array_rand($zipCodes)];

    return $houseNumber . " " . $street . ", " . $city . ", " . $zip;
}
function generateRandomTimeMissing() {
    $times = ['1 day', '2 days', '3 days', '1 week', '2 weeks'];
    return $times[array_rand($times)];
}

function generateRandomRepeatMissing() {
    $choices = ['Oui', 'Non'];
    return $choices[array_rand($choices)];
}

function generateRandomAgencyEnforcement() {
    $agencies = ['Police', 'Gendarmerie', 'FBI', 'Interpol', 'Private Investigator'];
    return $agencies[array_rand($agencies)];
}

function generateRandomOfficer() {
    return 'Officer' . rand(1, 10);
}

function generateRandomAgencyPhone() {
    return 'AgencyPhone' . rand(1, 100);
}

function generateRandomEmergencyNumber() {
    return 'EmergencyNumber' . rand(1, 100);
}

function generateRandomReward() {
    return rand(100, 10000) . " EUR";
}
function generateRandomFamilyContact() {
    return 'Contact' . rand(1, 100);
}

function generateRandomRelationshipToMissing() {
    $relationships = ['Parent', 'Frère/Sœur', 'Conjoint', 'Ami', 'Autre'];
    return $relationships[array_rand($relationships)];
}

function generateRandomFamilyEmail() {
    return 'family_email' . rand(1, 100) . '@example.com';
}

function generateRandomFamilyFB() {
    return 'family_fb_profile' . rand(1, 100);
}

function generateRandomComments() {
    return 'Comments: Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
}

function generateRandomNameWhoFillUp() {
    return 'Name' . rand(1, 100);
}

function generateRandomNameWhoFillUpRelationship() {
    $relationships = ['Parent', 'Frère/Sœur', 'Conjoint', 'Ami', 'Autre'];
    return $relationships[array_rand($relationships)];
}

function generateRandomNameWhoFillUpContact() {
    return 'Contact' . rand(1, 100);
}
// Génère 10 profils fictifs
for ($i = 0; $i < 30; $i++) {
    $admin_Id = rand(1, 10);
    $user_Id = rand(1, 10);
    $city_from = $conn->real_escape_string(generateRandomCity());
    $name = $conn->real_escape_string(generateRandomName());
    $disappearance_date = $conn->real_escape_string(generateRandomDate());
    $gender = $conn->real_escape_string(generateRandomGender());
    $dob = $conn->real_escape_string(generateRandomDate());
    $pronouns = $conn->real_escape_string(generateRandomPronouns());
    $race = $conn->real_escape_string(generateRandomRace());
    $height = $conn->real_escape_string(generateRandomHeight());
    $weight = $conn->real_escape_string(generateRandomWeight());
    $hair_color = $conn->real_escape_string(generateRandomHairColor());
    $eye_color = $conn->real_escape_string(generateRandomEyeColor());
    $clothing = $conn->real_escape_string(generateRandomClothing());
    $contact = $conn->real_escape_string(generateRandomContact());
    $email = $conn->real_escape_string(generateRandomEmail());
    $last_location = $conn->real_escape_string(generateRandomLastLocation());
    $status = $conn->real_escape_string(generateRandomStatus());
    $footwear = $conn->real_escape_string(generateRandomFootwear());
    $shoe_size = $conn->real_escape_string(generateRandomShoeSize());
    $coat = $conn->real_escape_string(generateRandomCoat());
    $head_wear = $conn->real_escape_string(generateRandomHeadWear());
    $jewelry = $conn->real_escape_string(generateRandomJewelry());
    $eyewear = $conn->real_escape_string(generateRandomEyewear());
    $illnesses = $conn->real_escape_string(generateRandomIllnesses());
    $medication = $conn->real_escape_string(generateRandomMedication());
    $drugs_alcohol = $conn->real_escape_string(generateRandomDrugsAlcohol());
    $hobbies = $conn->real_escape_string(generateRandomHobbies());
    $gadgets = $conn->real_escape_string(generateRandomGadgets());
    $last_person_with = $conn->real_escape_string(generateRandomName());
    $last_person_with_address = $conn->real_escape_string(generateRandomLastLocation());
    $last_person_with_contact = $conn->real_escape_string(generateRandomContact());
    $work_school_name = $conn->real_escape_string(generateRandomName());
    $work_school_address = $conn->real_escape_string(generateRandomLastLocation());
    $work_school_contact = $conn->real_escape_string(generateRandomContact());
    $dye_color = $conn->real_escape_string(generateRandomDyeColor());
    $eye = $conn->real_escape_string(generateRandomEye());
    $teeth = $conn->real_escape_string(generateRandomTeeth());
    $scars = $conn->real_escape_string(generateRandomScars());
    $piercings = $conn->real_escape_string(generateRandomPiercings());
    $tattoos = $conn->real_escape_string(generateRandomTattoos());
    $time_missing = $conn->real_escape_string(generateRandomTimeMissing());
    $repeat_missing = $conn->real_escape_string(generateRandomRepeatMissing());
    $agency_enforcement = $conn->real_escape_string(generateRandomAgencyEnforcement());
    $officer = $conn->real_escape_string(generateRandomOfficer());
    $agency_phone = $conn->real_escape_string(generateRandomAgencyPhone());
    $emergency_number = $conn->real_escape_string(generateRandomEmergencyNumber());
    $reward = $conn->real_escape_string(generateRandomReward());
    $family_contact = $conn->real_escape_string(generateRandomFamilyContact());
    $relationship_to_missing = $conn->real_escape_string(generateRandomRelationshipToMissing());
    $family_email = $conn->real_escape_string(generateRandomFamilyEmail());
    $family_fb = $conn->real_escape_string(generateRandomFamilyFB());
    $comments = $conn->real_escape_string(generateRandomComments());
    $name_who_fill_up = $conn->real_escape_string(generateRandomNameWhoFillUp());
    $name_who_fill_up_relationship = $conn->real_escape_string(generateRandomNameWhoFillUpRelationship());
    $name_who_fill_up_contact = $conn->real_escape_string(generateRandomNameWhoFillUpContact());
  
    // $sql = "INSERT INTO posted (
    //     admin_Id, user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, 
    //     height, weight, hair_color, eye_color, clothing, contact, email, last_location, status, 
    //     footwear, shoe_size, coat, head_wear, jewelry, eyewear, illnesses, medication, head_color, 
    //     dye_color, eye, teeth, scars, piercings, tattoos, drugs_alcohol, hobbies, gadgets,
    //     last_person_with, last_person_with_address, last_person_with_contact,
    //     work_school_name, work_school_address, work_school_contact,
    //     time_missing, repeat_missing, agency_enforcement, officer, agency_phone, emergency_number, reward
    // ) 
    // VALUES (
    //     '$admin_Id', '$user_Id', '$city_from', '$name', '$disappearance_date', '$gender', '$dob', 
    //     '$pronouns', '$race', '$height', '$weight', '$hair_color', '$eye_color', '$clothing', 
    //     '$contact', '$email', '$last_location', '$status', '$footwear', '$shoe_size', '$coat', 
    //     '$head_wear', '$jewelry', '$eyewear', '$illnesses', '$medication', '$hair_color', 
    //     '$dye_color', '$eye', '$teeth', '$scars', '$piercings', '$tattoos', '$drugs_alcohol', 
    //     '$hobbies', '$gadgets', '$last_person_with', '$last_person_with_address', 
    //     '$last_person_with_contact', '$work_school_name', '$work_school_address', 
    //     '$work_school_contact', '$time_missing', '$repeat_missing', '$agency_enforcement', 
    //     '$officer', '$agency_phone', '$emergency_number', '$reward'
    // )";
    $sql = "INSERT INTO posted (
        admin_Id, user_Id, city_from, name, disappearance_date, gender, dob, pronouns, race, 
        height, weight, hair_color, eye_color, clothing, contact, email, last_location, status, 
        footwear, shoe_size, coat, head_wear, jewelry, eyewear, illnesses, medication, head_color, 
        dye_color, eye, teeth, scars, piercings, tattoos, drugs_alcohol, hobbies, gadgets,
        last_person_with, last_person_with_address, last_person_with_contact,
        work_school_name, work_school_address, work_school_contact,
        time_missing, repeat_missing, agency_enforcement, officer, agency_phone, emergency_number, reward,
        family_contact, relationship_to_missing, family_email, family_fb, comments,
        name_who_fill_up, name_who_fill_up_relationship, name_who_fill_up_contact
    ) 
    VALUES (
        '$admin_Id', '$user_Id', '$city_from', '$name', '$disappearance_date', '$gender', '$dob', 
        '$pronouns', '$race', '$height', '$weight', '$hair_color', '$eye_color', '$clothing', 
        '$contact', '$email', '$last_location', '$status', '$footwear', '$shoe_size', '$coat', 
        '$head_wear', '$jewelry', '$eyewear', '$illnesses', '$medication', '$hair_color', 
        '$dye_color', '$eye', '$teeth', '$scars', '$piercings', '$tattoos', '$drugs_alcohol', 
        '$hobbies', '$gadgets', '$last_person_with', '$last_person_with_address', 
        '$last_person_with_contact', '$work_school_name', '$work_school_address', 
        '$work_school_contact', '$time_missing', '$repeat_missing', '$agency_enforcement', 
        '$officer', '$agency_phone', '$emergency_number', '$reward',
        '$family_contact', '$relationship_to_missing', '$family_email', '$family_fb', '$comments',
        '$name_who_fill_up', '$name_who_fill_up_relationship', '$name_who_fill_up_contact'
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Profil inséré avec succès.<br>";
    } else {
        echo "Erreur lors de l'insertion du profil : " . $conn->error . "<br>";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "Profil inséré avec succès.<br>";
    } else {
        echo "Erreur lors de l'insertion du profil : " . $conn->error . "<br>";
    }
}

// Fermer la connexion à la base de données
$conn->close();

?>

<?php
include 'config.php';
include 'navbar.php';

// Fonction pour calculer le nombre de jours entre deux dates
function getDaysSinceDisappearance($disappearanceDate) {
    $disappearance = new DateTime($disappearanceDate);
    $now = new DateTime();
    $interval = $disappearance->diff($now);
    return $interval->format('%a'); // Formatage pour obtenir le nombre de jours
}
?>


<!-- Inclure jQuery avant Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
  /* Styles communs */
  .container-text {
    cursor: pointer;
  }

  /* Style du champ de recherche */
  .search-bar {
    width: 100%;
    max-width: 400px;
    /* Vous pouvez ajuster la largeur maximale selon vos préférences */
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    outline: none;
    font-size: 16px;
    transition: border-color 0.3s;
    color: #1389e7;
  }

  /* Style du champ de recherche lorsqu'il est en focus (clic) */
  .search-bar:focus {
    border-color: #007bff;
    /* Couleur de bordure lorsqu'en focus */
  }
</style>

<main id="main">
<section class="bg-light p-4">
  <div class="container">
    <h2 class="text-center">Filtrer les disparitions</h2>
    <p class="text-center">Utilisez les filtres ci-dessous pour afficher les disparitions en fonction du statut.</p>

    <!-- Formulaire de filtrage -->
    <form action="" method="get">
      <div class="status-filter">
        <label for="statusFilter">Filtrer par statut :</label>
        <input type="radio" id="missingStatus" name="status" value="Missing" <?php if(isset($_GET['status']) && $_GET['status'] == 'Missing') echo 'checked'; ?>>
        <label for="missingStatus">Disparu</label>
        <input type="radio" id="foundStatus" name="status" value="Found" <?php if(isset($_GET['status']) && $_GET['status'] == 'Found') echo 'checked'; ?>>
        <label for="foundStatus">Retrouvé</label>
        <input type="submit" value="Filtrer">
      </div>
    </form>
  </div>
</section>

 
  <section class="bg-blueDark">
    <div class="container-fluid">
      <div>
        <h2 class="white text-center">
          Avez-vous vu ces<span class="orange-white-rect"><span class=" blink"><span>
                personnes disparues ?
              </span></span></span>
        </h2>
      </div>
    </div>

    <div class="grid-disparitions">
      <div class="container">
        <div class="row items">
          <?php
          // Exemple de connexion à une base de données MySQL
          $conn = mysqli_connect("localhost", "root", "", "alertdisparu");

          // Vérifiez si la connexion a réussi
          if (!$conn) {
              die("Erreur de connexion : " . mysqli_connect_error());
          }

          // Mettez à jour la requête SQL en fonction de la sélection de l'utilisateur
          $statusFilter = isset($_GET['status']) ? $_GET['status'] : 'Missing';
          $fetch = mysqli_query($conn, "SELECT * FROM posted WHERE status='$statusFilter'");

          if (!$fetch) {
              echo "Erreur lors de la récupération des données : " . mysqli_error($conn);
          } else {
              while ($row = mysqli_fetch_assoc($fetch)) {
                  $images = explode(",", $row['posted_image']);
                  $disappearanceDate = $row['disappearance_date'];
                  $dob = new DateTime($row['dob']);
                  $now = new DateTime();
                  $ageAtDisappearance = $dob->diff(new DateTime($disappearanceDate))->y; // Calcul de l'âge lors de la disparition
                  $age = $dob->diff($now)->y; // Calcul de l'âge actuel
                  $daysSinceDisappearance = getDaysSinceDisappearance($disappearanceDate);
                  ?>
          <div class="col-lg-4 col-md-6 col-12 mb-5 pb-4">
            <div class="ps-3 h-100">
              <div class="container-text d-flex justify-content-start align-items-start flex-column h-100 open-popup">
                <div class="container-image" style="background-image:url(https://placehold.co/600x400)">
                </div>
                <div class="pb-5 px-3">
                  <span class="orange-white-rect blink">
                    <span>
                      <?= htmlspecialchars($row['status']) ?> le <?= (new DateTime($row['disappearance_date']))->format('d/m/Y') ?>
                    </span>
                  </span>
                  <br>
                  <h3><?= htmlspecialchars($row['name']) ?></h3>
                  <p class="bodytext"><?= htmlspecialchars($row['gender']) ?>, <?= htmlspecialchars($row['race']) ?>, 
                    <?= htmlspecialchars($row['height']) ?>, <?= htmlspecialchars($row['weight']) ?></p>
                  <p class="bodytext">Né(e) le : <?= (new DateTime($row['dob']))->format('d/m/Y') ?> (<?= $age ?> ans)</p>
                  <p class="bodytext">Disparu(e) le : <?= (new DateTime($row['disappearance_date']))->format('d/m/Y') ?> avait <?= $ageAtDisappearance ?> ans</p>
                  <p class="bodytext">Jours depuis la disparition : <?= $daysSinceDisappearance ?> jours</p>
                  <br>
                  <p class="bodytext">De <?= htmlspecialchars($row['city_from']) ?> – Disparu à
                    <?= htmlspecialchars($row['last_location']) ?></p>
                  <p></p>
                </div>
                <div class="d-flex container-button justify-content-center">
                  <a href="view_posted.php?posted_Id=<?= intval($row['post_Id']) ?>" target=""
                    class="as_button d-flex btn-red">
                    Voir le profil
                  </a>
                  <a href="#" rel="noopener noreferrer" target="_blank" class="as_button d-flex btn-orange">
                    Signaler une information
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
              }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section class="advanced-search">
    <div class="container">
        <h2 class="section-title">Recherche avancée</h2>
        <p class="section-description">Utilisez les filtres ci-dessous pour affiner votre recherche.</p>
        <form method="get" action="search.php">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Entrez un nom">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="age">Âge :</label>
                        <input type="number" name="age" id="age" class="form-control" placeholder="Entrez un âge">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Genre :</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Sélectionnez un genre</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Ville :</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Entrez une ville">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Statut :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Sélectionnez un statut</option>
                            <option value="disparu">Disparu</option>
                            <option value="retrouvé">Retrouvé</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
</section>
</main><!-- End #main -->

<?php include 'footer.php'; ?>

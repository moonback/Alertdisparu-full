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
<!-- ======= Hero Section ======= -->

<section class="home-top"
  style="background-image: url(images/slider.jpg); background-size: cover; background-position: center;">
  <div class="gradient-overlay"></div>
  <div class="container-fluid container">
    <div class="row">
      <div class="col-12">
        <div class="container container-text align-items-center d-flex">
          <div>
            <h1 class="white">
              La disparition, c’est pas <br>
              <span class="orange-white-rect"><span class="orange-white-rect blink"><span>
                    une fiction !
                  </span></span></span>
            </h1>
            <p class="big white">Plateforme d’urgence gratuit accessible 24h/24 et 7j/7 en cas de disparition d'adulte
              et enfant.
            </p>
            <div class="d-flex flex-wrap">
              <a class="as_button btn-orange d-flex" href="/signalements.php" title="Signaler une disparition">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.711" height="22.709" viewBox="0 0 22.711 22.709">
                  <g id="Groupe_348" data-name="Groupe 348" transform="translate(20859 18915)">
                    <path id="Tracé_404" data-name="Tracé 404"
                      d="M16.564,22.705h-.05a13.084,13.084,0,0,1-5.07-1.181.887.887,0,0,1,.7-1.629,11.5,11.5,0,0,0,4.376,1.036h.04a5.463,5.463,0,0,0,3.951-1.438l.006-.007a1.6,1.6,0,0,0-.08-2.222c-2.381-2.3-3.505-2.13-4.546-1.115l-1.656,1.644a.887.887,0,0,1-.986.181,17.918,17.918,0,0,1-4.839-3.566L8.3,14.292A17.92,17.92,0,0,1,4.731,9.453a.887.887,0,0,1,.181-.986L6.556,6.811C7.571,5.77,7.737,4.646,5.441,2.265a1.6,1.6,0,0,0-2.222-.08l-.007.006A5.479,5.479,0,0,0,1.774,6.183c.016,3.186,1.822,6.886,4.832,9.9l.008.008a19.831,19.831,0,0,0,1.951,1.7A.887.887,0,1,1,7.487,19.2a21.642,21.642,0,0,1-2.118-1.843l-.008-.008C2.022,14.007.018,9.837,0,6.192A7.2,7.2,0,0,1,1.974.921L2.009.888,2.034.865a3.375,3.375,0,0,1,4.684.169A8.249,8.249,0,0,1,8.887,4.3,3.655,3.655,0,0,1,7.822,8.053l-.005.005-1.19,1.2a17.967,17.967,0,0,0,2.924,3.78l.117.117a17.858,17.858,0,0,0,3.78,2.925l1.2-1.191.005-.005a3.655,3.655,0,0,1,3.753-1.065,8.249,8.249,0,0,1,3.266,2.17,3.375,3.375,0,0,1,.169,4.684l-.023.026-.033.035A7.18,7.18,0,0,1,16.564,22.705Zm.541-12.993a.887.887,0,0,0,.6-1.1l-.012-.041A5.1,5.1,0,0,0,14.08,5a.887.887,0,0,0-.473,1.71,3.1,3.1,0,0,1,1.522.87,3.17,3.17,0,0,1,.861,1.494L16,9.114a.886.886,0,0,0,1.1.6Zm4.664,1.113A9.824,9.824,0,0,0,11.929.937H11.88a.887.887,0,0,0,0,1.774h.044a8.05,8.05,0,0,1,8.067,8.107.887.887,0,0,0,.883.891h0A.887.887,0,0,0,21.769,10.826Z"
                      transform="translate(-20859 -18915.002)" fill="#254458"></path>
                    <g id="Groupe_347" data-name="Groupe 347" transform="translate(-21231.01 -19325.713)">
                      <path id="Tracé_47" data-name="Tracé 47"
                        d="M389.121,420.423a.887.887,0,0,0,.6-1.1l-.012-.041a5.1,5.1,0,0,0-3.613-3.571.887.887,0,0,0-.473,1.71,3.1,3.1,0,0,1,1.522.87,3.163,3.163,0,0,1,.861,1.494l.01.04a.886.886,0,0,0,1.1.6h0Z"
                        fill="#254458"></path>
                      <path id="Tracé_48" data-name="Tracé 48"
                        d="M393.785,421.536a9.824,9.824,0,0,0-9.76-9.888H383.9a.887.887,0,0,0,0,1.774h.044a8.05,8.05,0,0,1,8.067,8.033v.074a.887.887,0,0,0,.883.891h0a.886.886,0,0,0,.895-.879v0Z"
                        fill="#254458"></path>
                      <path id="tohide" data-name="Tracé 49"
                        d="M393.688,426.7a8.248,8.248,0,0,0-3.266-2.17,3.658,3.658,0,0,0-3.758,1.07l-1.2,1.191a17.853,17.853,0,0,1-3.78-2.925l-.117-.117a17.972,17.972,0,0,1-2.924-3.78l1.2-1.2a3.655,3.655,0,0,0,1.065-3.753,8.253,8.253,0,0,0-2.169-3.266,3.375,3.375,0,0,0-4.684-.169l-.025.023-.035.033a7.2,7.2,0,0,0-1.974,5.271c.018,3.645,2.022,7.815,5.369,11.165a18.778,18.778,0,0,0,8.666,5.03,11.546,11.546,0,0,0,2.479.318h.05a7.179,7.179,0,0,0,5.221-1.971l.033-.035.023-.026A3.375,3.375,0,0,0,393.688,426.7Z"
                        fill="#254458"></path>
                    </g>
                  </g>
                </svg>
                Signaler une disparition </a>
              <a class="as_button only-borders with-arrow-effect d-flex" href="/commentcamarche.php"
                title="Nous connaitre">
                <span class="text-button"> Comment ca marche</span>
                <span class="arrow-effect">
                  <span>

                  </span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="#slider-disparitions" class="action-bottom" title="Scroll to bottom">
    <svg xmlns="http://www.w3.org/2000/svg" width="20.738" height="23.768" viewBox="0 0 20.738 23.768">
      <path id="Tracé_92" data-name="Tracé 92"
        d="M183.556,294.713V277.87l-5.982,6.018L175,281.314l10.369-10.369,10.369,10.369-2.574,2.574-5.982-6.018v16.843Z"
        transform="translate(195.738 294.713) rotate(180)" fill="#fea355"></path>
    </svg>
  </a>
</section>

<main id="main">

  <style>
    .card img:hover {
      opacity: .9;
    }

    .card a {
      padding: 5px;
      border-radius: 5px;
    }

    .card a:hover {
      opacity: .5;
    }

    body {
      background-color: #254458;

    }

    .section-bg {
      background-color: #254458;
    }

    .three-posts,
    .search {
      padding-top: 7px;
      padding-bottom: 6px;
    }
  </style>






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

                    $fetch = mysqli_query($conn, "SELECT * FROM posted WHERE status='Missing'");

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
                <!--<div class="container-image"
                                        style="background-image:url(images-missing/<?= $images[0] ?>)">
                                        </div>-->
                <div class="pb-5 px-3">
                <span class="orange-white-rect blink"><span>
  <?= htmlspecialchars($row['status']) ?> le <?= (new DateTime($row['disappearance_date']))->format('d/m/Y') ?>
</span></span> </span></span><br>
<h3 class="mt-2"><?= htmlspecialchars($row['name']) ?></h3>
<p class="bodytext"><?= htmlspecialchars($row['gender']) ?>, <?= htmlspecialchars($row['race']) ?>
 né(e) le
  <?= (new DateTime($row['dob']))->format('d/m/Y') ?> avait <?= $ageAtDisappearance ?> ans au moment des faits, <?= $age ?> ans actuellement,
  <?= htmlspecialchars($row['height']) ?>, <?= htmlspecialchars($row['weight']) ?></p>
  <p class="bodytext">Jours depuis la disparition : <?= $daysSinceDisappearance ?> jours</p>

  <br>
<p class="bodytext">De <?= htmlspecialchars($row['city_from']) ?> – Disparu à
  <?= htmlspecialchars($row['last_location']) ?></p>
<p></p>
</div>
                <div class="d-flex container-button justify-content-center">
                  <a href="view_posted.php?posted_Id=<?= intval($row['post_Id']) ?>" target=""
                    class="as_button d-flex btn-red">
                    Voir le signalement </a>
                  <a href="#" rel="noopener noreferrer" target="_blank" class="as_button d-flex btn-orange">
                    Enquêter </a>
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

    </div>
  </section>




  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="row no-gutters">
        <div class="content col-xl-20" data-aos="fade-right">
          <div class="content">
            <h3 style="text-align: center;">À propos d'AlertDisparu</h3>
            <p style="text-align: center;">Notre mission est d'aider à retrouver les personnes disparues et de fournir
              un soutien, une orientation, du réconfort et de l'espoir aux familles pendant cette période difficile et
              au-delà. Nous sommes pleinement conscients des menaces imminentes auxquelles une personne disparue peut
              être confrontée, et nous comprenons parfaitement la souffrance que vivent ces familles lorsqu'un être cher
              disparaît. Le temps presse. Vivre dans le "vide de l'inconnu", sans nulle part où se tourner, est, à notre
              avis, la pire situation possible. Nous nous engageons à mettre à disposition tous les outils à notre
              disposition pour apporter de l'aide.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>





  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Nous contacter</h2>
        <p> <a/ style="color: #ffffff;">Si vous avez des questions ou souhaitez simplement nous contacter, vous pouvez
            nous contacter aux informations ci-dessous.

        </p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>AlertDisparu</h3>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email</h3>
                <p>contact@alertdisparu.fr</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Téléphone</h3>
                <p>+33123456789<br>+33123456789</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mt-4 mt-md-0">
          <form action="login_code.php" method="post" class="bg-white p-3 ">
            <div class="row">
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <?php if (isset($_SESSION['success_email'])) : ?>
            <div class="my-3 p-3 text-white alert" style="background-color: orange;">
              <div class="error-message"></div>
              <div class="sent-message "><?php echo $_SESSION['success_email']; ?></div>
            </div>
            <?php endif;
                                            unset($_SESSION['success_email']); ?>
            <div class="text-center mt-3"><button type="submit" class="btn btn-primary" name="sendemail">Send
                Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php include 'footer2.php'; ?>

<script>
  $(document).ready(function () {
    setTimeout(function () {
      $('.alert').hide();
    }, 6000);
  });
</script>
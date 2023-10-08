<?php 
    include 'config.php';
    include 'navbar.php'; 
    // include 'login.php';
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>We Help The Missing</h1>
      <h2>Giving Help and Hope to the Loved Ones of the Missing. Every missing person is someone's child.</h2>
      <a href="register.php?#register" class="btn-get-started scrollto">Sign-Up</a>
      <img src="assets/img/download.jpg" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150" width="400">
    </div>

  </section><!-- End Hero -->

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
    </style>
 <section id="missing" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Missing Persons</h2>
          <p>This Section Displays the Missing People</p>
        </div>
        <form method="POST">
          <div class="row d-flex justify-content-center">
          <label style = "text-Align: center; margin-Bottom: 20px">You Can Search by Entering the <strong style = "color:red">Name</strong>, <strong style = "color:red">Birthday</strong> or <strong style = "color:red">Adress</strong> of the Missing Person You Want to Search</label>
            <div class="col-md-4 d-flex">
              <input type="text" class="form-control search" placeholder="Name of the Missing Person" name="name" id="name">
            </div>
            <div class="col-md-4 d-flex">
              <input type="date" class="form-control search" name="dob" id="age">
            </div>
            <div class="col-md-4 d-flex">
              <input type="text" class="form-control search" placeholder="City or Town of the Missing Person" name="address" id="address">
              <button class="btn btn-primary" style="margin-left: 5px;" type="submit" name="search" id="search"> Search</button>
            </div>
          </div>
        </form>
        <script>
          const element = document.querySelectorAll(".search");
          // let name = document.getElementById('name');
          // let age = document.getElementById('age');
          // let address = document.getElementById('address');
          let search = document.getElementById('search');
          element.addEventListener('keyup', (e) => {
            e.preventDefault();
              if(e.keyCode === 13) {
                search.click();
              }
          });
        </script>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrappers">
            <div class="row d-flex justify-content-center">
        <?php
            
            if(isset($_POST['search'])) {
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];

            $find = mysqli_query($conn, "SELECT * FROM posted WHERE name LIKE '%".$name."%' && dob LIKE '%".$dob."%' && city_from LIKE '%".$address."%'");
            if(mysqli_num_rows($find) > 0) {

              while($row = mysqli_fetch_array($find)){

              $i = "";
              $res=$row['posted_image'];
              $res=explode(",",$res);
              $count=count($res);
        ?>
            <div class="col-lg-4">
              <div class="testimonial-item bg-light p-3"  style="overflow: hidden;">
                <p class="text-center">
                  <i class="bx bxs-quote-alt-left quote-icon-left text-danger"></i>
                  <h2 class="text-danger text-center"><strong>MISSING</strong></h2>
                </p>
                <div class="card">
                    <?php for($i=0;$i<1;$i++) { ?>
                      <img src="images-missing/<?= $res[$i]?>" alt="" width="100%" style="padding: 5px; height: 300px;">
                    <?php } ?>

                    <a href="view_posted.php?posted_Id=<?php echo $row['post_Id']; ?>" class="badge bg-light p-1 rounded-pill text-secondary " type="button" style="font-size: 14px; text-decoration: none;"><b>View more</b></a>
                </div>
                <h3 style="font-size: 15px"><?php echo $row['name']; ?></h3>
                <h4  style="font-size: 13px"><?php echo $row['city_from']; ?></h4>
              </div>
            </div>
          <?php } ?>

          <a href="all_missing_person.php?#missing"style="text-align: right; text-decoration: none;"><b>View All</b></a>

          <?php } else { ?>
       
          <h5 class="mt-3 text-center">No record found</h5>

          <?php } } else { 
              $fetch = mysqli_query($conn, "SELECT * FROM posted LIMIT 6");
              while ($row = mysqli_fetch_array($fetch)) {

              $i = "";
              $res=$row['posted_image'];
              $res=explode(",",$res);
              $count=count($res);
          ?>
            <div class="col-lg-4">
              <div class="testimonial-item bg-light p-3"  style="overflow: hidden;">
                <p class="text-center">
                  <i class="bx bxs-quote-alt-left quote-icon-left text-danger"></i>
                  <h2 class="text-danger text-center"><strong>MISSING</strong></h2>
                  <!-- <i class="bx bxs-quote-alt-right quote-icon-right text-danger"></i> -->
                </p>
                <div class="card">
                    <?php for($i=0;$i<1;$i++) { ?>
                      <img src="images-missing/<?= $res[$i]?>" alt="" width="100%" style="padding: 5px; height: 300px;">
                    <?php } ?>

                    <a href="view_posted.php?posted_Id=<?php echo $row['post_Id']; ?>" class="badge bg-light p-1 rounded-pill text-secondary " type="button" style="font-size: 14px; text-decoration: none;"><b>View more</b></a>
                </div>
                <h3 style="font-size: 15px"><?php echo $row['name']; ?></h3>
                <h4 style="font-size: 13px; margin-Top:10px">From</h4>
                <h4 style="font-size: 13px"><?php echo $row['city_from']; ?></h4>
              </div>
            </div>

          <?php } ?>

          <a href="all_missing_person.php?#missing"style="text-align: right; text-decoration: none;"><b>View All</b></a>

          <?php } ?>

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
              <h3 style="text-align: center;">About AlertDisparu</h3>
              <p style="text-align: center;">
                &nbsp;&nbsp;Our goal is to assist in finding those who have gone missing and to provide support, direction, solace, and hope to the families during this trying time and beyond.
                We are well aware of the impending threats that a missing person may face, and we completely comprehend the suffering these families experience when a loved one goes missing. The clock is ticking. Living in the "vacuum of the unknown" with nowhere to turn, in our opinion, is the worst possible situation.
                We pledge to offer every tool at our disposal to assist.
              </p>
            </div>
          </div>  
         </div>
        </div>
    </section>
          
   

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
          <p>This Section Display all the Testimonial uploaded by the users</p>
        </div>
          <div class="row d-flex justify-content-center">
           <?php
                function custom_echo($x, $length)
                {
                  if(strlen($x)<=$length)
                  {
                    echo $x;
                  }
                  else
                  {
                    $y=substr($x,0,$length). '...';
                    echo $y;
                  }
                }
                include 'config.php';
                $fetch = mysqli_query($conn, "SELECT * FROM testimony JOIN users ON testimony.user_Id=users.user_Id");
                while($r = mysqli_fetch_array($fetch)) {

                  $testimony_Id = $r['testimony_Id'];
            ?>
            <div class="col-lg-4">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?php echo custom_echo($r['testimony'], 200); ?>
                 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="images-testimony/<?php echo $r['testimony_image']; ?>" class="testimonial-img" alt="" style="width: 80px;height: 80px;border-radius: 50%;">
                <h3><?php echo ''.$r['firstname'].' '.$r['middlename'].' '.$r['lastname'].' '.$r['suffix'].''; ?></h3>
              </div>
            </div>
          <?php } ?>
          </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>If you have questions or just want to get in touch, you can contact us to the given information below.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Pulilan Bulacan</h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>ilafi103022@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+639333517602<br>+639331230582</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-md-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php include 'footer.php'; ?>

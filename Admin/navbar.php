<?php

    session_start();
    include '../config.php';
    
    if(isset($_SESSION['admin_Id'])) {
        $id = $_SESSION['admin_Id'];

    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration AlertDisparu</title>

  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/logo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css"> -->
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/ba6fe04144.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../css/summernote-bs4.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <!-- TOASTER -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
  

  <!-- DataTables -->
  <!-- Inclure la bibliothèque Chart.js -->

  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/buttons.bootstrap4.min.css">

  <script src="../js/bootstrap5-downloaded-ni-erwin/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/3.6.0/fuse.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" >
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAFGRxdknuMzXqBXt7Q9m2rhZEHz6AuWTs",
    // Add other bootstrap parameters as needed, using camel case.
    // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
  });
</script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">

  
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="about_me.php" class="nav-link">Mon profil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->


    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"> 

            <!-- Message Start -->

            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> 



            <!-- Message End -->


          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Touts les Messages</a>
        </div>
      </li> 


      <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nouveaux signalements
            <span class="float-right text-muted text-sm">2 jours</span>
          </a>
          
          
          <div class="dropdown-divider"></div>
          
          <a href="#" class="dropdown-item dropdown-footer">Toutes les Notifications</a>
        </div>
      </li> 

      <!-- FULL SCREEN -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- FULL SCREEN -->


      <!-- RIGHT SIDEBAR -->
       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> 
      <!-- RIGHT SIDEBAR -->

    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AlertDisparu</span>
    </a>

    <?php 
        $admin = mysqli_query($conn, "SELECT * FROM admin WHERE admin_Id='$id'");
        $row = mysqli_fetch_array($admin);
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images-admin/<?php echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
        </div>
        <div class="info">
          <a href="about_me.php" class="d-block"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="rechercheavancer.php" class="nav-link">
              <i class="nav-icon fas fa-search-plus"></i>
              <p>
                Recherche avancer
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="similariter.php" class="nav-link">
              <i class="nav-icon fas fa-search-plus"></i>
              <p>
                Recherche similaires
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="carte.php" class="nav-link active">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Carte interactive
              </p>
            </a>
          </li>
          
          <li class="nav-header">DISPARU ET RETROUVÉ</li>
          <li class="nav-item">
            <a href="posted.php" class="nav-link">
              <i class="fa-solid fa-person-circle-question"></i>
              <?php 
                  $missing = mysqli_query($conn, "SELECT post_Id FROM posted WHERE status='Missing'");
                  $row_missing = mysqli_num_rows($missing);
              ?>
              <p>
                &nbsp; Disparu
                <span class="right badge badge-warning"><?php echo $row_missing; ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="found_posted.php" class="nav-link">
              <i class="fa-solid fa-person-circle-check"></i>
              <?php 
                  $found = mysqli_query($conn, "SELECT post_Id FROM posted WHERE status='Found'");
                  $row_found = mysqli_num_rows($found);
              ?>
              <p>
                &nbsp;Retrouver
                <span class="right badge badge-danger"><?php echo $row_found; ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="carte.php" class="nav-link">
            <i class="fa fa-globe" aria-hidden="true"></i>
              <p>
                &nbsp;&nbsp; Carte interactive
              </p>
            </a>
          </li>


          <li class="nav-header">TÉMOIGNAGES</li>
          <li class="nav-item">
            <a href="testimonials.php" class="nav-link">
              <i class="fa-solid fa-memory"></i>
              <?php 
                  $testimony = mysqli_query($conn, "SELECT testimony_Id FROM testimony");
                  $row_testimony = mysqli_num_rows($testimony);
              ?>
              <p>
                &nbsp; Gerer les temoignages
                <span class="right badge badge-warning"><?php echo $row_testimony; ?></span>
              </p>
            </a>
          </li>
          


          
          <li class="nav-header">UTILISATEUR</li>
           <?php
            $admin = mysqli_query($conn, "SELECT admin_Id from admin");
            $row_admin = mysqli_num_rows($admin);
           ?>
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="fa-solid fa-user-secret"></i>
              <p>
                &nbsp;&nbsp; Administrateur
                <span class="badge badge-primary right"><?php echo $row_admin;  ?></span>
              </p>
            </a>
          </li>


          <?php
            $users = mysqli_query($conn, "SELECT user_Id from users");
            $row_users = mysqli_num_rows($users);
           ?>
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p>
                &nbsp; Utilisateurs enregistrés
                <span class="badge badge-success right"><?php echo $row_users;  ?></span>
              </p>
            </a>
          </li><li class="nav-item">
            <a href="fake-disparition.php" class="nav-link">
              <i class="fa-solid fa-user-plus "></i>
              <p>
                &nbsp;&nbsp; Generer fake disparition
              </p>
            </a>
          </li>
          


          <li class="nav-header">SÉCURITÉ</li>
          <li class="nav-item">
            <a href="changepassword.php" class="nav-link">
              <i class="fa-solid fa-key"></i>
              <p>
                &nbsp;&nbsp; Changer mot de passe
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bddversjson.php" class="nav-link">
              <i class="fa-solid fa-key"></i>
              <p>
                &nbsp;&nbsp; Generer Json
              </p>
            </a>
          </li>
          

          <li class="nav-header">PROFILE</li>
          <li class="nav-item">
            <a href="about_me.php" class="nav-link">
              <i class="fa-solid fa-user-tie"></i>
              <p>
                &nbsp;&nbsp; Mon profil
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="" data-toggle="modal" data-target="#logoutmodal" class="nav-link">
              <i class="fa-solid fa-power-off"></i>
              <p>
                &nbsp; Déconnexion
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-------------------------------LOGOUT MODAL------------------------------------>
      <div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
             <div class="modal-header alert-light">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Admin logout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../logout.php" method="POST">
                <input type="hidden" class="form-control" value="<?php echo $row['admin_Id']; ?>" name="admin_Id">
                <?php if($row['gender'] === 'Male'):?>
                    <h6>Monsieur <?php echo $row['lastname'];?>, Êtes-vous sûr de vouloir vous déconnecter?</h6>
                <?php else: ?>
                    <h6>Madame <?php echo $row['lastname'];?>, Êtes-vous sûr de vouloir vous déconnecter?</h6>
                <?php endif; ?>
            </div>
            <div class="modal-footer alert-light">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> annuler</button>
              <button type="submit" class="btn btn-primary" name="delete_user"><i class="fa-solid fa-circle-check"></i> Confirmer</button>
            </div>
              </form>
          </div>
        </div>
      </div>
  <!-------------------------------END LOGOUT MODAL-------------------------------->


<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>

<title>AlertDisparu | Tableau de bord</title>

<?php include 'navbar.php'; ?>
<!-- Inclure la bibliothèque Chart.js sans le source map -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $admin = mysqli_query($conn, "SELECT admin_Id from admin");
                  $row_admin = mysqli_num_rows($admin);
                 ?>
                <h3><?php echo $row_admin; ?></h3>

                <p>Administrateurs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="admin.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users");
                  $row_users = mysqli_num_rows($users);
                 ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Utilisateurs enregistrés</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                  $missing = mysqli_query($conn, "SELECT post_Id FROM posted WHERE status='Missing'");
                  $row_missing = mysqli_num_rows($missing);
                ?>
                <h3><?php echo $row_missing; ?></h3>

                <p>Personnes disparues</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="posted.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                  $found = mysqli_query($conn, "SELECT post_Id FROM posted WHERE status='Found'");
                  $row_found = mysqli_num_rows($found);
                ?>
                <h3><?php echo $row_found; ?></h3>

                <p>Personnes trouvées</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="found_posted.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
      <!-- Élément HTML pour le graphique -->

   
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 


 <?php include 'footer.php'; ?>
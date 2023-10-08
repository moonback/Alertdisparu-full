<title>AlertDisparu | Missing person</title>


<?php 

  include 'navbar.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Personnes disparues</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
            <li class="breadcrumb-item active">Personnes disparues</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex">
                <a href="posted_add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Ajouter un
                  signalement</a>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_admin"><i class="bi bi-plus-circle"></i> Add</button> -->

                <?php if(isset($_SESSION['success'])) { ?>
                <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert"
                  style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                  <?php echo $_SESSION['success']; ?></h3>
                <?php unset($_SESSION['success']); } ?>


                <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert"
                  style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                  <?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></h3>
                <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                <?php  if(isset($_SESSION['exists'])) { ?>
                <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert"
                  style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                  <?php echo $_SESSION['exists']; ?></h3>
                <?php unset($_SESSION['exists']); } ?>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Nom complet personne disparue</th>
                    <th>Date de naissance</th>
                    <th>Date de disparition</th>
                    <th>Dernier lieu connu</th>
                    <th>Sexe</th>
                    <th>Adresse personne disparue</th>
                    <th>Nom de l'utilisateur ayant rempli le formulaire</th>
                    <th>Relation avec la personne disparue</th>
                    <th>Coordonnées de la personne ayant rempli le formulaire</th>
                    <th>Récompense</th>
                    <th>Statut</th>
                    <th>Outils</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                  <tr>
                    <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM posted WHERE status='Missing' AND user_Id='$id'");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                    <td>
                      <img src="../images-missing/<?php echo $row['posted_image']; ?>" alt="" width="50">
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['disappearance_date']; ?></td>
                    <td><?php echo $row['last_location']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['city_from']; ?></td>
                    <td><?php echo $row['name_who_fill_up']; ?></td>
                    <td><?php echo $row['name_who_fill_up_relationship']; ?></td>
                    <td><?php echo $row['name_who_fill_up_contact']; ?></td>
                    <td><?php echo $row['reward']; ?></td>
                    <td>
                      <?php if($row['status'] == 'Missing'): ?>
                      <span type="button" class="badge badge-danger p-2 rounded-pill" data-toggle="modal"
                        data-target="#update<?php echo $row['post_Id']; ?>"><?php echo $row['status']; ?></span>
                      <?php else: ?>
                      <span class="badge badge-primary p-2 rounded-pill"><?php echo $row['status']; ?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="dropdown dropright">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-expanded="false"> Actions </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="posted_view.php?post_Id=<?php echo $row['post_Id']; ?>"
                            class="btn btn-primary dropdown-item">Voir</a>
                          <a href="posted_update.php?post_Id=<?php echo $row['post_Id']; ?>"
                            class="btn btn-primary dropdown-item">Modifier</a>
                          <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal"
                            data-target="#delete<?php echo $row['post_Id']; ?>">Supprimer</button>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <?php include 'posted_delete.php'; include 'update_missing.php'; } ?>

                </tbody>
              </table>
              <p class="text-dark"><b>NOTE :</b><span class="text-muted">Pour mettre à jour le statut de la personne
                  disparue, il vous suffit de cliquer sur le statut <span
                    class="text-danger"><b>DISPARU</b></span>.</span></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>



<?php include 'footer.php'; ?>

<script>
  //-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function () {
    setTimeout(function () {
      $('.alert').hide();
    }, 5000);
  });
  //-----------------------------END ALERT TIMEOUT---------------------//
</script>
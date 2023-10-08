<!DOCTYPE html>
<html lang="fr">
<head>
    <title>AlertDisparu | Sécurité du compte</title>
    <?php include 'navbar.php'; ?>
</head>

<body>
  <!-- Contenu principal -->
  <div class="content-wrapper">
    <!-- En-tête du contenu (en-tête de page) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Changer le mot de passe</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
              <li class="breadcrumb-item active">Changer le mot de passe</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Contenu principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center d-flex">
          <!-- Colonne de gauche -->
          <div class="col-lg-6">
            <!-- Validation jQuery -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informations</h3>
              </div>
                <?php if(isset($_SESSION['success'])) { ?> 
                    <p class="alert alert-success position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['success']; ?></p> 
                <?php unset($_SESSION['success']); } ?>

                <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                <?php  if(isset($_SESSION['exists'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['exists']; ?></p>
                <?php unset($_SESSION['exists']); } ?>
              <!-- /.card-header -->
              <!-- Début du formulaire -->
              <form action="process_update.php" method="POST" enctype="multipart/form-data">
                 <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                 <div class="card-body">
                    <div class="row d-flex justify-content-center">
                      <div class="col-lg-10">
                          <div class="form-group">
                              <label for=""><b>Ancien mot de passe</b></label>
                              <input type="password" class="form-control form-control-sm" placeholder="Ancien mot de passe" name="OldPassword" required minlength="8">
                          </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-10">
                          <div class="form-group">
                              <label for=""><b>Nouveau mot de passe</b></label>
                              <input type="password" class="form-control form-control-sm" placeholder="Mot de passe" name="password" required id="new_password" minlength="8">
                          </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-10">
                          <div class="form-group">
                              <label for=""><b>Confirmer le mot de passe</b></label>
                              <input type="password" class="form-control form-control-sm" placeholder="Confirmer le mot de passe" name="cpassword" required id="new_cpassword" onkeyup="new_validate_password()" minlength="8">
                              <small id="new_wrong_pass_alert"></small>
                          </div>
                      </div>
                    </div>
                    <div class="row  d-flex justify-content-center">
                      <div class="col-lg-10 d-flex justify-content-center">
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="password_user" id="new_create"><i class="fa-solid fa-floppy-disk"></i> Changer le mot de passe</button>
                        </div>
                      </div>
                    </div>  
               </div>
                <!-- /.card-body -->
                
              </form>
            </div>
            <!-- /.card -->
         </div>
          <!--/.col (gauche) -->
          <!-- Colonne de droite -->
          
          <!--/.col (droite) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>
    function new_validate_password() {

      var pass = document.getElementById('new_password').value;
      var confirm_pass = document.getElementById('new_cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('new_wrong_pass_alert').style.color = 'red';
        document.getElementById('new_wrong_pass_alert').innerHTML = 'X Les mots de passe ne correspondent pas !';
        document.getElementById('new_create').disabled = true;
        document.getElementById('new_create').style.opacity = (0.4);
      } else {
        document.getElementById('new_wrong_pass_alert').style.color = 'green';
        document.getElementById('new_wrong_pass_alert').innerHTML = '✓ Les mots de passe correspondent !';
        document.getElementById('new_create').disabled = false;
        document.getElementById('new_create').style.opacity = (1);
      }
    }

</script>

  <?php include 'footer.php'; ?>
 
</body>
</html>

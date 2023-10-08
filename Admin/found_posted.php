<title>AlertDisparu | Found person</title>


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
            <h1>Found people</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Found people</li>
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

                  <?php if(isset($_SESSION['success'])) { ?> 
                      <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['success']; ?></h3>
                  <?php unset($_SESSION['success']); } ?>


                  <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></h3>
                  <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                  <?php  if(isset($_SESSION['exists'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['exists']; ?></h3>
                  <?php unset($_SESSION['exists']); } ?>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                          <th>Nom complet de la personne retrouvée</th>
<th>Date de naissance</th>
<th>Genre</th>
<th>Adresse de la personne retrouvée</th>
<th>Nom de l'utilisateur recherchant cette personne</th>
<th>Relation avec la personne retrouvée</th>
<th>Coordonnées de la personne ayant rempli le formulaire d'admission</th>
<th>Outils</th>

                          </tr>
                        </thead>
                          <tbody id="users_data">
                          <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM posted WHERE status='Found'");
                            if(mysqli_num_rows($sql) > 0) {
                          ?>  
                            <tr>
                              <?php 
                                while ($row = mysqli_fetch_array($sql)) {
                              ?>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['city_from']; ?></td>
                                <td><?php echo $row['name_who_fill_up']; ?></td>
                                <td><?php echo $row['name_who_fill_up_relationship']; ?></td>
                                <td><?php echo $row['name_who_fill_up_contact']; ?></td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['post_Id']; ?>"><i class="fa-solid fa-trash-can"></i> Delete</button> </td>
                            </tr>
                            <?php include 'found_posted_delete.php'; } }  ?>
                          </tbody>
                        </table>
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
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,5000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
 </script>



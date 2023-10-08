<title>AlertDisparu | View missing person's information</title>
<?php include 'navbar.php'; ?>

<?php
   
   if(isset($_GET['post_Id'])) {
      $post_Id = $_GET['post_Id'];

      $fetch = mysqli_query($conn, "SELECT * FROM posted WHERE post_Id='$post_Id'");
      $row = mysqli_fetch_array($fetch);
      $a   = $row['teeth'];
      $b   = explode(",", $a);
      $c   = $row['gadgets'];
      $d   = explode(",", $c);

      $i = "";
      $res=$row['posted_image'];
      $res=explode(",",$res);
      $count=count($res);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Signalement</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li class="breadcrumb-item active">Signalement</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">


            <!-- left column -->
            <div class="col-md-12">
               <!-- jquery validation -->
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Informations sur les personnes disparues</h3>
                  </div>
                  <?php if(isset($_SESSION['success'])) { ?>
                  <p class="alert alert-success position-absolute" role="alert" style="right: 0px; height: 46px;">
                     <?php echo $_SESSION['success']; ?></p>
                  <?php unset($_SESSION['success']); } ?>

                  <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                  <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;">
                     <?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></p>
                  <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                  <?php  if(isset($_SESSION['exists'])) { ?>
                  <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;">
                     <?php echo $_SESSION['exists']; ?></p>
                  <?php unset($_SESSION['exists']); } ?>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                           <div class="form-group">
                              <?php for($i=0;$i<$count;++$i) { ?>
                              <img src="../images-missing/<?= $res[$i]?>" alt="" width="220" style="padding: 5px;">
                              <?php } ?>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <h4 class="text-center"><b><?php echo $row['name']; ?></b> images</h4>
                           <hr>
                        </div>

                        <div class="col-lg-8">
                           <div class="form-group">
                              <label>Pays et Ville de la disparition </label>
                              <input type="text" class="form-control" value="<?php echo $row['city_from']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>Date de disparition</label>
                              <input type="date" class="form-control" value="<?php echo $row['disappearance_date']; ?>"
                                 readonly>
                           </div>
                        </div>
                        <div class="col-lg-5">
                           <div class="form-group">
                              <label>Nom de la personne disparue</label>
                              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"
                                 readonly>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <?php                           
                              $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM posted");
                              $id = $row['post_Id'];
                              $all_gender = mysqli_query($conn, "SELECT * FROM posted  where post_Id = '$id' ");
                              $row = mysqli_fetch_array($all_gender);
                          ?>
                              <label>Genre</label>
                              <select class="custom-select" disabled>
                                 <?php foreach($gender as $rows):?>
                                 <option value="<?php echo $rows['gender']; ?>"
                                    <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?>>
                                    <!--/////   CLOSING OPTION TAG  -->
                                    <?php echo $rows['gender']; ?>
                                 </option>

                                 <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Date de naissance</label>
                              <input type="date" class="form-control" value="<?php echo $row['dob']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>Pronoms préférés</label>
                              <input type="text" class="form-control" value="<?php echo $row['pronouns']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-2">
                           <div class="form-group">
                              <label>Taille en cm</label>
                              <input type="text" class="form-control" value="<?php echo $row['height']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-2">
                           <div class="form-group">
                              <label>Poids en KG</label>
                              <input type="text" class="form-control" value="<?php echo $row['weight']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>Race / origine ethnique</label>
                              <input type="text" class="form-control" value="<?php echo $row['race']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-2">
                           <div class="form-group">
                              <label>Coloration NATURELLE des cheveux</label>
                              <input type="text" class="form-control" value="<?php echo $row['hair_color']; ?>"
                                 readonly>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Description des cheveux</label>
                              <input type="text" class="form-control" value="<?php echo $row['head_color']; ?>"
                                 readonly>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>La personne se teigne-t-elle les cheveux ?</label>
                              <input type="text" class="form-control" value="<?php echo $row['dye_color']; ?>" readonly>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Couleur des yeux</label>
                              <input type="text" class="form-control" value="<?php echo $row['eye']; ?>" readonly>
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <label for="">Dents (cochez toutes les réponses applicables)</label>
                           <div class="row">
                              <div class="col-lg-3">
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Good Shape"
                                       name="teeth[]" <?php if(in_array('Good Shape', $b)) { echo "checked"; } ?>
                                       disabled> "En bon état"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Dental Work"
                                       name="teeth[]" <?php if(in_array('Dental Work', $b)) { echo "checked"; } ?>
                                       disabled> "Travail dentaire"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Partial Missing with" name="teeth[]"
                                       <?php if(in_array('Partial Missing with', $b)) { echo "checked"; } ?> disabled>
                                    "Partiellement manquant avec pont"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Partial Missing" name="teeth[]"
                                       <?php if(in_array('Partial Missing', $b)) { echo "checked"; } ?> disabled>
                                    "Partiellement manquant"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Completely missing" name="teeth[]"
                                       <?php if(in_array('Completely missing', $b)) { echo "checked"; } ?> disabled>
                                    "Complètement manquant"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Straight"
                                       name="teeth[]" <?php if(in_array('Straight', $b)) { echo "checked"; } ?>
                                       disabled> "Droit"
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Crooked with bridge" name="teeth[]"
                                       <?php if(in_array('Crooked with bridge', $b)) { echo "checked"; } ?> disabled>
                                    "Tordu avec pont"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Dis-colored"
                                       name="teeth[]" <?php if(in_array('Dis-colored', $b)) { echo "checked"; } ?>
                                       disabled> "Décoloré"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Denture-Full"
                                       name="teeth[]" <?php if(in_array('Denture-Full', $b)) { echo "checked"; } ?>
                                       disabled> "Prothèse dentaire complète"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Denture-Top Only" name="teeth[]"
                                       <?php if(in_array('Denture-Top Only', $b)) { echo "checked"; } ?> disabled>
                                    "Prothèse dentaire - Seulement le haut"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox"
                                       value="Denture-Bottom Only" name="teeth[]"
                                       <?php if(in_array('Denture-Bottom Only', $b)) { echo "checked"; } ?> disabled>
                                    "Prothèse dentaire - Seulement le bas"
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Braces"
                                       name="teeth[]" <?php if(in_array('Braces', $b)) { echo "checked"; } ?> disabled>
                                    "Appareil dentaire"
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <label for="">L'électronique avec eux</label>

                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Cell Phone"
                                       name="gadget[]" <?php if(in_array('Cell Phone', $d)) { echo "checked"; } ?>
                                       disabled> Téléphone portable
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Computer"
                                       name="gadget[]" <?php if(in_array('Computer', $d)) { echo "checked"; } ?>
                                       disabled> Ordinateur
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Tablet"
                                       name="gadget[]" <?php if(in_array('Tablet', $d)) { echo "checked"; } ?> disabled>
                                    Tablette
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Ipod"
                                       name="gadget[]" <?php if(in_array('Dental WorkIpod', $d)) { echo "checked"; } ?>
                                       disabled> Ipod
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="X-box"
                                       name="gadget[]" <?php if(in_array('X-box', $d)) { echo "checked"; } ?> disabled>
                                    X-box
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" value="Other"
                                       name="gadget[]" <?php if(in_array('Other', $d)) { echo "checked"; } ?> disabled>
                                    Autre
                                 </div>
                              </div>





                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Cicatrices, marques ou déformations</label>
                                    <input type="text" class="form-control" value="<?php echo $row['scars']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Piercings et emplacements - Décrire</label>
                                    <input type="text" class="form-control" value="<?php echo $row['piercings']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Tatouages</label>
                                    <input type="text" class="form-control" value="<?php echo $row['tattoos']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-2">
                                 <div class="form-group">
                                    <label>Vêtements</label>
                                    <input type="text" class="form-control" value="<?php echo $row['clothing']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Chaussure</label>
                                    <input type="text" class="form-control" value="<?php echo $row['footwear']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Pointure</label>
                                    <input type="text" class="form-control" value="<?php echo $row['shoe_size']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Veste / Manteau</label>
                                    <input type="text" class="form-control" value="<?php echo $row['coat']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Chapeaux</label>
                                    <input type="text" class="form-control" value="<?php echo $row['head_wear']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Bijoux / Accessoires</label>
                                    <input type="text" class="form-control" value="<?php echo $row['jewelry']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-2">
                                 <div class="form-group">
                                    <label>Lunettes</label>
                                    <input type="text" class="form-control" value="<?php echo $row['eyewear']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Maladies ou troubles</label>
                                    <input type="text" class="form-control" value="<?php echo $row['illnesses']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Médicament</label>
                                    <input type="text" class="form-control" value="<?php echo $row['medication']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Antécédents d'alcoolisme et de toxicomanie</label>
                                    <input type="text" class="form-control" value="<?php echo $row['drugs_alcohol']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="form-group">
                                    <label>Loisirs</label>
                                    <input type="text" class="form-control" value="<?php echo $row['hobbies']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Téléphone portable d'une personne disparue</label>
                                    <input type="number" class="form-control" value="<?php echo $row['contact']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Email de la personne disparue</label>
                                    <input type="email" class="form-control" value="<?php echo $row['email']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Dernier emplacement connu</label>
                                    <input type="text" class="form-control" value="<?php echo $row['last_location']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Dernière personne avec</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['last_person_with']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="form-group">
                                    <label>Adresse de la dernière personne avec</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['last_person_with_address']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Phone of Last Person With</label>
                                    <input type="number" class="form-control"
                                       value="<?php echo $row['last_person_with_contact']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Work or School Name</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['work_school_name']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="form-group">
                                    <label>Work or School Address</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['work_school_address']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Work or School contact</label>
                                    <input type="number" class="form-control"
                                       value="<?php echo $row['work_school_contact']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Date Missing Person Report was Filed</label>
                                    <input type="date" class="form-control"
                                       value="<?php echo $row['date_report_filed']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Time the Person was noted missing</label>
                                    <input type="time" class="form-control" value="<?php echo $row['time_missing']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <?php                           
                              $repeat_missing  = mysqli_query($conn, "SELECT DISTINCT repeat_missing FROM posted");
                              $id = $row['post_Id'];
                              $all_repeat_missing = mysqli_query($conn, "SELECT * FROM posted  where post_Id = '$id' ");
                              $row = mysqli_fetch_array($all_repeat_missing);
                          ?>
                                    <label>Is this person a repeat missing?</label>
                                    <select class="custom-select" disabled>
                                       <?php foreach($repeat_missing as $rows):?>
                                       <option value="<?php echo $rows['repeat_missing']; ?>"
                                          <?php if($row['repeat_missing'] == $rows['repeat_missing']) echo 'selected="selected"'; ?>>
                                          <!--/////   CLOSING OPTION TAG  -->
                                          <?php echo $rows['repeat_missing']; ?>
                                       </option>

                                       <?php endforeach;?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="form-group">
                                    <label>Law Enforment Agency</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['agency_enforcement']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Assigned Officer</label>
                                    <input type="text" class="form-control" value="<?php echo $row['officer']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Law Enforcement Phone</label>
                                    <input type="number" class="form-control"
                                       value="<?php echo $row['agency_phone']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Case Number - IMPORTANT</label>
                                    <input type="number" class="form-control"
                                       value="<?php echo $row['emergency_number']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Reward</label>
                                    <input type="text" class="form-control" value="<?php echo $row['reward']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Family/Guardian/Authorized Contact</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['family_contact']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Family/Guardian/Authorized Email</label>
                                    <input type="email" class="form-control" value="<?php echo $row['family_email']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Family/Guardian/Authorized Facebook Page</label>
                                    <input type="text" class="form-control" value="<?php echo $row['family_fb']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Relationship to the missing person</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['relationship_to_missing']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label>Comments</label>
                                    <input type="text" class="form-control" value="<?php echo $row['comments']; ?>"
                                       readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Name of Person Completing this Intake Form</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['name_who_fill_up']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Relationship to the Missing Person</label>
                                    <input type="text" class="form-control"
                                       value="<?php echo $row['name_who_fill_up_relationship']; ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Contact Information</label>
                                    <input type="number" class="form-control"
                                       value="<?php echo $row['name_who_fill_up_contact']; ?>" readonly>
                                 </div>
                              </div>

                           </div>

                           <?php } ?>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <a href="posted_update.php?post_Id=<?php echo $row['post_Id']; ?>"
                                 class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</a>
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!--/.col (left) -->
                     <!-- right column -->
                     <div class="col-md-6">

                     </div>
                     <!--/.col (right) -->
                  </div>
                  <!-- /.row -->
               </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>


<?php include 'footer.php'; ?>


</body>

</html>
<title>AlertDisparu | Update missing person's information</title>
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

?>    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update post missing person</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update post missing person</li>
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
                <h3 class="card-title">Missing Persons Intake Form</h3>
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
              <!-- form start -->
              <form action="process_update.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <!-- USER ID -->
                    <input type="hidden" class="form-control" value="<?php echo $row['post_Id']; ?>" name="post_Id">

                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>City and State Missing From</label>
                        <input type="text" class="form-control" placeholder="Last known city and state they were in" name="city_from" value="<?php echo $row['city_from']; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Date of Disappearance</label>
                        <input type="date" class="form-control" name="Disappearance" value="<?php echo $row['disappearance_date']; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Name of Missing Person</label>
                          <input type="text" class="form-control" placeholder="Full name" name="name" value="<?php echo $row['name']; ?>" required>
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
                          <label>Gender</label>
                          <select class="custom-select" name="gender" required>
                              <?php foreach($gender as $rows):?>
                                    <option value="<?php echo $rows['gender']; ?>"  
                                        <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?> 
                                         > <!--/////   CLOSING OPTION TAG  -->
                                        <?php echo $rows['gender']; ?>                                           
                                    </option>

                             <?php endforeach;?>
                           </select>
                        </div> 
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" required>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Preferred Pronouns</label>
                          <input type="text" class="form-control" placeholder="Prefer He/Him, She/Her, They/Them, etc." name="Pronouns" value="<?php echo $row['pronouns']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Height</label>
                          <input type="text" class="form-control" placeholder="Height" name="Height" value="<?php echo $row['height']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Weight</label>
                          <input type="text" class="form-control" placeholder="Weight" name="Weight" value="<?php echo $row['weight']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Race / Ethnicity</label>
                          <input type="text" class="form-control" placeholder="Race / Ethnicity" name="Race" value="<?php echo $row['race']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>NATURAL Hair Color</label>
                          <input type="text" class="form-control" placeholder="Hair color" name="Hair" value="<?php echo $row['hair_color']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Head Hair Description</label>
                          <input type="text" class="form-control" placeholder="Long hair, Short hair, buzzed, bald, etc." name="Headhair" value="<?php echo $row['head_color']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Does the Person Dye their Hair?</label>
                          <input type="text" class="form-control" placeholder="What color(s) might the person dye thier hair?" name="dye" value="<?php echo $row['dye_color']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Eye Color</label>
                          <input type="text" class="form-control" placeholder="Eye color" name="eye" value="<?php echo $row['eye']; ?>">
                       </div>
                    </div>
                  
                    <div class="col-lg-6 mb-3">
                       <label for="">Teeth (Check all that apply)</label>
                      <div class="row">
                           <div class="col-lg-6">
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Good Shape" name="teeth[]"
                                  <?php if(in_array('Good Shape', $b)) { echo "checked"; } ?> > Good Shape
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dental Work" name="teeth[]"
                                  <?php if(in_array('Dental Work', $b)) { echo "checked"; } ?> > Dental Work
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing with" name="teeth[]" 
                                  <?php if(in_array('Partial Missing with', $b)) { echo "checked"; } ?> > Partial Missing with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing" name="teeth[]" 
                                  <?php if(in_array('Partial Missing', $b)) { echo "checked"; } ?> > Partial Missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Completely missing" name="teeth[]" 
                                  <?php if(in_array('Completely missing', $b)) { echo "checked"; } ?> > Completely missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Straight" name="teeth[]" 
                                  <?php if(in_array('Straight', $b)) { echo "checked"; } ?> > Straight
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Crooked with bridge" name="teeth[]" 
                                  <?php if(in_array('Crooked with bridge', $b)) { echo "checked"; } ?> > Crooked with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dis-colored" name="teeth[]" 
                                  <?php if(in_array('Dis-colored', $b)) { echo "checked"; } ?> > Dis-colored
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Full" name="teeth[]" 
                                  <?php if(in_array('Denture-Full', $b)) { echo "checked"; } ?> > Denture-Full
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Top Only" name="teeth[]" 
                                  <?php if(in_array('Denture-Top Only', $b)) { echo "checked"; } ?> > Denture-Top Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Bottom Only" name="teeth[]" 
                                  <?php if(in_array('Denture-Bottom Only', $b)) { echo "checked"; } ?> > Denture-Bottom Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Braces" name="teeth[]" 
                                  <?php if(in_array('Braces', $b)) { echo "checked"; } ?> > Braces
                               </div>
                            </div>
                      </div>
                    </div>
                  
                      <div class="col-lg-6">
                         <label for="">Electronics with them</label>
                      
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Cell Phone" name="gadget[]"
                            <?php if(in_array('Cell Phone', $d)) { echo "checked"; } ?> > Cell Phone
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Computer" name="gadget[]"
                            <?php if(in_array('Computer', $d)) { echo "checked"; } ?> > Computer
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Tablet" name="gadget[]"
                            <?php if(in_array('Tablet', $d)) { echo "checked"; } ?> > Tablet
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Ipod" name="gadget[]"
                            <?php if(in_array('Dental WorkIpod', $d)) { echo "checked"; } ?> > Ipod
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="X-box" name="gadget[]"
                            <?php if(in_array('X-box', $d)) { echo "checked"; } ?> > X-box
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Other" name="gadget[]"
                            <?php if(in_array('Other', $d)) { echo "checked"; } ?> > Other
                         </div>
                      </div>
                  




                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Scars, Marks, or Deformities</label>
                          <input type="text" class="form-control" placeholder="Scars, Marks, or Deformities - Describe" name="scars" value="<?php echo $row['scars']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Piercings and Locations - Describe</label>
                          <input type="text" class="form-control" placeholder="Piercings" name="Piercings" value="<?php echo $row['piercings']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Tattoos</label>
                          <input type="text" class="form-control" placeholder="Describe Tattoos and Locations" name="Tattoos" value="<?php echo $row['tattoos']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Clothing</label>
                          <input type="text" class="form-control" placeholder="Describe what they were known to be wearing" name="Clothing" value="<?php echo $row['clothing']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Footwear</label>
                          <input type="text" class="form-control" placeholder="Describe the shoes they were wearing" name="Footwear" value="<?php echo $row['footwear']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Shoe size</label>
                          <input type="text" class="form-control" placeholder="Missing person's Shoe size" name="Shoe" value="<?php echo $row['shoe_size']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Coat / Jacket</label>
                          <input type="text" class="form-control" placeholder="Describe the color of Coat / Jacket" name="Coat" value="<?php echo $row['coat']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Head Wear</label>
                          <input type="text" class="form-control" placeholder="Describe a hat or other Head Wear" name="Head" value="<?php echo $row['head_wear']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Jewelry / Accessories</label>
                          <input type="text" class="form-control" placeholder="Describe Jewelry / Accessories they might be wearing" name="Jewelry" value="<?php echo $row['jewelry']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Eyewear</label>
                          <input type="text" class="form-control" placeholder="Glasses, Contacts, Sunglasses" name="Eyewear" value="<?php echo $row['eyewear']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Illnesses or Disorders</label>
                          <input type="text" class="form-control" placeholder="Illnesses or Disorders" name="Illnesses" value="<?php echo $row['illnesses']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Medication</label>
                          <input type="text" class="form-control" placeholder="Medication and what they are taken for" name="Medication" value="<?php echo $row['medication']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>History of Alcohol, drug abuse</label>
                          <input type="text" class="form-control" placeholder="Drugs, Alcohol" name="History" value="<?php echo $row['drugs_alcohol']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Hobbies</label>
                          <input type="text" class="form-control" placeholder="What hobbies are they interested in?" name="Hobbies" value="<?php echo $row['hobbies']; ?>">
                       </div>
                    </div>
                   <!--  <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Cell Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Cell" value="<?php //echo $row['contact']; ?>">
                       </div>
                    </div> -->
                    <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Missing Person's Cell Phone</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Cell" placeholder = "9123456789"  maxlength="10" value="<?php echo $row['contact']; ?>">
                     </div>
                     </div>
                   <!--  <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Email</label>
                          <input type="email" class="form-control" placeholder="email@email.com" name="PersonEmail" value="<?php //echo $row['email']; ?>">
                       </div>
                    </div> -->
                     <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Email</label>
                          <input type="email" class="form-control" placeholder="email@gmail.com" name="PersonEmail" id="email" onkeydown="validation()" onkeyup="validation()" value="<?php echo $row['email']; ?>">
                          <span id="text"></span>
                       </div>
                    </div>


                    <script>
                        function validation() {
                         var email = document.getElementById("email").value;
                         var pattern =/.+@(gmail)\.com$/;
                         // var pattern =/.+@(gmail|yahoo)\.com$/;
                         var form = document.getElementById("form");

                         if(email.match(pattern)) {
                             document.getElementById('text').style.color = 'green';
                             document.getElementById('text').innerHTML = 'Valid email';
                             document.getElementById('add').disabled = false;
                             document.getElementById('add').style.opacity = (1);
                         } 
                         else {
                             document.getElementById('text').style.color = 'red';
                             document.getElementById('text').innerHTML = 'Invalid email';
                             document.getElementById('add').disabled = true;
                             document.getElementById('add').style.opacity = (0.4);
                             
                         }
                       }
                    </script> 
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Last Known Location</label>
                          <input type="text" class="form-control" placeholder="Address" name="Lastlocation" value="<?php echo $row['last_location']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Last Person With</label>
                          <input type="text" class="form-control" placeholder="Full name" name="personwith" value="<?php echo $row['last_person_with']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Address of Last Person With</label>
                          <input type="text" class="form-control" placeholder="email@email.com" name="Personaddress" value="<?php echo $row['last_person_with_address']; ?>">
                       </div>
                    </div>
                    <!-- <div class="col-lg-3">
                       <div class="form-group">
                          <label>Phone of Last Person With</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Phonelastperson" value="<?php// echo $row['last_person_with_contact']; ?>">
                       </div>
                    </div> -->
                     <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Phone of Last Person With</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Phonelastperson" placeholder = "9123456789"  maxlength="10" value="<?php echo $row['last_person_with_contact']; ?>">
                     </div>
                     </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School Name</label>
                          <input type="text" class="form-control" placeholder="Work or School name" name="workschool" value="<?php echo $row['work_school_name']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Work or School Address</label>
                          <input type="text" class="form-control" placeholder="Work or School address" name="Schooladdress" value="<?php echo $row['work_school_address']; ?>">
                       </div>
                    </div>
                   <!--  <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School contact</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Schoolcontact" value="<?php// echo $row['work_school_contact']; ?>">
                       </div>
                    </div> -->
                     <div class="col-lg-4 col-auto form-group mb-3">
                     <label for="contact">Work or School contact</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Schoolcontact" placeholder = "9123456789"  maxlength="10" value="<?php echo $row['work_school_contact']; ?>">
                     </div>
                     </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Date Missing Person Report was Filed</label>
                          <input type="date" class="form-control" name="datefiled" value="<?php echo $row['date_report_filed']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Time the Person was noted missing</label>
                          <input type="time" class="form-control" name="Time" value="<?php echo $row['time_missing']; ?>">
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
                          <select class="custom-select" name="repeatmissing" required>
                              <?php foreach($repeat_missing as $rows):?>
                                    <option value="<?php echo $rows['repeat_missing']; ?>"  
                                        <?php if($row['repeat_missing'] == $rows['repeat_missing']) echo 'selected="selected"'; ?> 
                                         > <!--/////   CLOSING OPTION TAG  -->
                                        <?php echo $rows['repeat_missing']; ?>                                           
                                    </option>

                             <?php endforeach;?>
                           </select>
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Law Enforment Agency</label>
                          <input type="text" class="form-control" placeholder="Law enforment agency" name="lawagency" value="<?php echo $row['agency_enforcement']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Assigned Officer</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Assigned" value="<?php echo $row['officer']; ?>">
                       </div>
                    </div>
                   <!--  <div class="col-lg-3">
                       <div class="form-group">
                          <label>Law Enforcement Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Enforcement" value="<?php //echo $row['agency_phone']; ?>" >
                       </div>
                    </div> -->
                    <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Law Enforcement Phone</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Enforcement" placeholder = "9123456789"  maxlength="10" value="<?php echo $row['agency_phone']; ?>">
                     </div>
                     </div>
                   <!--  <div class="col-lg-3">
                       <div class="form-group">
                          <label>Case Number - IMPORTANT</label>
                          <input type="number" class="form-control" placeholder="9123456789"  name="Case" value="<?php //echo $row['emergency_number']; ?>">
                       </div>
                    </div> -->
                     <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Case Number - IMPORTANT</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Case" placeholder = "9123456789"  maxlength="10" value="<?php echo $row['emergency_number']; ?>">
                     </div>
                     </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Reward</label>
                          <input type="text" class="form-control" placeholder="How much reward?" name="reward" value="<?php echo $row['reward']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Contact</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Family_Guardian" value="<?php echo $row['family_contact']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Email</label>
                          <input type="email" class="form-control" placeholder="Family/Guardian/Authorized Person's Email" name="Authorized_Email" value="<?php echo $row['family_email']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Facebook Page</label>
                          <input type="text" class="form-control" placeholder="Family/Guardian/Authorized Person's Facebook Acc." name="Authorized_fb" value="<?php echo $row['family_fb']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Relationship to the missing person</label>
                          <input type="text" class="form-control" placeholder="Family/Guardian/Authorized Person's Relationship" name="Relationship" value="<?php echo $row['relationship_to_missing']; ?>" >
                       </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="form-group">
                          <label>Comments</label>
                          <input type="text" class="form-control" placeholder="Add comments here"  name="Comments" value="<?php echo $row['comments']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Name of Person Completing this Intake Form</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Completing" value="<?php echo $row['name_who_fill_up']; ?>">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Relationship to the Missing Person</label>
                          <input type="text" class="form-control" placeholder="Relationship to the Missing Person" name="Relationship_to_Missing" value="<?php echo $row['name_who_fill_up_relationship']; ?>">
                       </div>
                    </div>
                   <!--  <div class="col-lg-4">
                       <div class="form-group">
                          <label>Contact Information</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Contact_completingform" value="<?php //echo $row['name_who_fill_up_contact']; ?>">
                       </div>
                    </div> -->
                    <div class="col-lg-4 col-auto form-group mb-3">
                     <label for="contact">Contact Information</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Contact_completingform" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['name_who_fill_up_contact']; ?>">
                     </div>
                     </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control" name="image[]" multiple>
                       </div>
                    </div>

                    <!-- <div class="col-lg-6">
                       <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control" name="fileToUpload" onchange="getImagePreview(event)">
                       </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group" id="preview">
                        </div>
                    </div> -->
                </div>

             <?php } ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update_missing"><i class="fa-solid fa-floppy-disk"></i>  Submit</button>
                </div>
              </form>
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

<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    var text=document.createElement('p');
    text.innerHTML='Image preview';
    text.style['position']="relative";
    text.style['margin-left']="206px";
    text.style['margin-top']="10px";
    text.style['font-weight']="bold";
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
    imagediv.appendChild(text);
  }

</script>
  
  <?php include 'footer.php'; ?>

 
</body>
</html>

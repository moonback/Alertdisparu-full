<?php 
    include 'config.php';
    include 'navbar.php'; 
    // include 'login.php';

    if(isset($_GET['posted_Id'])) 
      $missing_Id = $_GET['posted_Id'];
      $info = mysqli_query($conn, "SELECT * FROM posted WHERE post_Id='$missing_Id'");
      $row  = mysqli_fetch_array($info);
      $a    = $row['teeth'];
      $b    = explode(",", $a);
      $c    = $row['gadgets'];
      $d    = explode(",", $c);

       $i = "";
       $res=$row['posted_image'];
       $res=explode(",",$res);
       $count=count($res);
    
?>

<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->
  <div id="hero" style="height: 40px;"></div>
<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->

<style>
  label {
    color: #2e5771;
    display: inline-block;
    font-size: 16px;
    width: 100%;
    margin-bottom: 16px;
}
  input {
    background-color: #254458;
  }
</style> 

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Informations sur <br><b><strong><?php echo $row['name']; ?></strong></b> disparu le <?php echo $row['disappearance_date']; ?> à <?php echo $row['last_location']; ?></h2>
       

        </div>
       

        <div class="row">
          <!-- LOAD IMAGE PREVIEW -->
          
               <div class="col-lg-12">
            <form action="register_code.php" method="post" enctype="multipart/form-data" class="bg-body p-5 rounded" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;">
               <div class="row d-flex justify-content-center">
                  <div class="col-lg-11" style="width: 910px;">
                     <?php if(isset($_SESSION['success_email'])): ?>
                       <div class="my-3 p-3 text-white alert bg-primary">
                         <div class="error-message"></div>
                         <div class="sent-message "><?php echo $_SESSION['success_email']; ?></div>
                       </div>
                     <?php endif; unset($_SESSION['success_email']); ?>
                  </div>
               </div>
              <div class="row">

                  


                    <div class="col-lg-12 d-flex justify-content-center mb-5">
                       <div class="form-group">
                          <?php for($i=0;$i<$count;$i++) { ?>
                            <a href="view_posted_full.php?posted_Id=<?php echo $missing_Id; ?>"><img src="images-missing/<?= $res[$i]?>" alt="" width="220" style="padding: 5px; height: 200px;"></a>
                          <?php } ?>
                       </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <h4 class="text-center">Photo de <b><?php echo $row['name']; ?></b></h4>
                        <hr>
                        <br>
                    </div>

                    <div class="col-lg-8 mb-4">
                      <div class="form-group">
                        <label><b>Address of the Missing Person</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['city_from']; ?>" readonly style="background-color: white;">
                      </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                      <div class="form-group">
                        <label>Date of Disappearance</label>
                        <input type="date" class="form-control" value="<?php echo $row['disappearance_date']; ?>" readonly style="background-color: white;">
                      </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Complete Name of the Missing Person</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                   <div class="col-lg-4 mb-4">
                       <div class="form-group">
                         <?php                           
                              $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM posted");
                              $id = $row['post_Id'];
                              $all_gender = mysqli_query($conn, "SELECT * FROM posted  where post_Id = '$id' ");
                              $row_all_gender = mysqli_fetch_array($all_gender);
                          ?>
                          <label>Sex</label>
                          <select class="form-control" disabled style="background-color: white;">
                              <?php foreach($gender as $rows):?>
                                    <option value="<?php echo $rows['gender']; ?>"  
                                        <?php if($row_all_gender['gender'] == $rows['gender']) echo 'selected="selected"'; ?> 
                                         > <!--/////   CLOSING OPTION TAG  -->
                                        <?php echo $rows['gender']; ?>                                           
                                    </option>

                             <?php endforeach;?>
                           </select>
                        </div> 
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Date of Birth of the Missing Person</label>
                          <input type="date" class="form-control" value="<?php echo $row['dob']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>This Missing Person "Also Known As"</label>
                          <input type="text" class="form-control" value="<?php echo $row['pronouns']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                       <div class="form-group">
                          <label>Height</label>
                          <input type="text" class="form-control" value="<?php echo $row['height']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                       <div class="form-group">
                          <label>Weight</label>
                          <input type="text" class="form-control" value="<?php echo $row['weight']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Race / Ethnicity</label>
                          <input type="text" class="form-control" value="<?php echo $row['race']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Nearest Landmark before lost</label>
                          <input type="text" class="form-control" value="<?php echo $row['hair_color']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Natural Hair Color</label>
                          <input type="text" class="form-control" value="<?php echo $row['head_color']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Does the Person Dye their Hair?</label>
                          <input type="text" class="form-control" value="<?php echo $row['dye_color']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                       <div class="form-group">
                          <label>Eye Color</label>
                          <input type="text" class="form-control" value="<?php echo $row['eye']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                  
                    <div class="col-lg-6 mb-3">
                       <label for="">Teeth (Check all that apply)</label>
                      <div class="row">
                           <div class="col-lg-6">
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Good Shape" name="teeth[]"
                                  <?php if(in_array('Good Shape', $b)) { echo "checked"; } ?> disabled> Good Shape
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dental Work" name="teeth[]"
                                  <?php if(in_array('Dental Work', $b)) { echo "checked"; } ?> disabled> Dental Work
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing with" name="teeth[]" 
                                  <?php if(in_array('Partial Missing with', $b)) { echo "checked"; } ?> disabled> Partial Missing with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing" name="teeth[]" 
                                  <?php if(in_array('Partial Missing', $b)) { echo "checked"; } ?> disabled> Partial Missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Completely missing" name="teeth[]" 
                                  <?php if(in_array('Completely missing', $b)) { echo "checked"; } ?> disabled> Completely missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Straight" name="teeth[]" 
                                  <?php if(in_array('Straight', $b)) { echo "checked"; } ?> disabled> Straight
                               </div>
                           </div>
                           <div class="col-lg-6 mb-4">
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Crooked with bridge" name="teeth[]" 
                                  <?php if(in_array('Crooked with bridge', $b)) { echo "checked"; } ?> disabled> Crooked with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dis-colored" name="teeth[]" 
                                  <?php if(in_array('Dis-colored', $b)) { echo "checked"; } ?> disabled> Dis-colored
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Full" name="teeth[]" 
                                  <?php if(in_array('Denture-Full', $b)) { echo "checked"; } ?> disabled> Denture-Full
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Top Only" name="teeth[]" 
                                  <?php if(in_array('Denture-Top Only', $b)) { echo "checked"; } ?> disabled> Denture-Top Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Bottom Only" name="teeth[]" 
                                  <?php if(in_array('Denture-Bottom Only', $b)) { echo "checked"; } ?> disabled> Denture-Bottom Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Braces" name="teeth[]" 
                                  <?php if(in_array('Braces', $b)) { echo "checked"; } ?> disabled> Braces
                               </div>
                            </div>
                      </div>
                    </div>
                  
                      <div class="col-lg-6 mb-4">
                         <label for="">Electronics with them</label>
                      
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Cell Phone" name="gadget[]"
                            <?php if(in_array('Cell Phone', $d)) { echo "checked"; } ?> disabled> Mobile Phone
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Computer" name="gadget[]"
                            <?php if(in_array('Computer', $d)) { echo "checked"; } ?> disabled> Laptop / Computer
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Tablet" name="gadget[]"
                            <?php if(in_array('Tablet', $d)) { echo "checked"; } ?> disabled> Tablet
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Ipod" name="gadget[]"
                            <?php if(in_array('Dental WorkIpod', $d)) { echo "checked"; } ?> disabled> Smart Watch
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Other" name="gadget[]"
                            <?php if(in_array('Other', $d)) { echo "checked"; } ?> disabled> Other
                         </div>
                      </div>
                  




                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Scars, Marks, or Deformities</label>
                          <input type="text" class="form-control" value="<?php echo $row['scars']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Piercings and Locations - Describe</label>
                          <input type="text" class="form-control" value="<?php echo $row['piercings']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Tattoos</label>
                          <input type="text" class="form-control" value="<?php echo $row['tattoos']; ?>" readonly style="background-color: white;"> 
                       </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                       <div class="form-group">
                          <label>Clothing</label>
                          <input type="text" class="form-control" value="<?php echo $row['clothing']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Footwear</label>
                          <input type="text" class="form-control" value="<?php echo $row['footwear']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Shoe size</label>
                          <input type="text" class="form-control" value="<?php echo $row['shoe_size']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Coat / Jacket</label>
                          <input type="text" class="form-control" value="<?php echo $row['coat']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Head Wear</label>
                          <input type="text" class="form-control" value="<?php echo $row['head_wear']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Jewelry / Accessories</label>
                          <input type="text" class="form-control" value="<?php echo $row['jewelry']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                       <div class="form-group">
                          <label>Eyewear</label>
                          <input type="text" class="form-control" value="<?php echo $row['eyewear']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Illnesses or Disorders</label>
                          <input type="text" class="form-control" value="<?php echo $row['illnesses']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Medication</label>
                          <input type="text" class="form-control" value="<?php echo $row['medication']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>History of Alcohol, drug abuse</label>
                          <input type="text" class="form-control" value="<?php echo $row['drugs_alcohol']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Hobbies</label>
                          <input type="text" class="form-control" value="<?php echo $row['hobbies']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Missing Person's Contact Info</label>
                          <input type="number" class="form-control" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;"> 
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Missing Person's Social Media User Name</label>
                          <input type="email" class="form-control" value="<?php echo $row['email']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                       <div class="form-group">
                          <label>Last Known Location</label>
                          <input type="text" class="form-control" value="<?php echo $row['last_location']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Last Person With</label>
                          <input type="text" class="form-control" value="<?php echo $row['last_person_with']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Address of Last Person With</label>
                          <input type="text" class="form-control" value="<?php echo $row['last_person_with_address']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Contact of Last Person With</label>
                          <input type="number" class="form-control" value="<?php echo $row['last_person_with_contact']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Work or School Name of Last Person With</label>
                          <input type="text" class="form-control" value="<?php echo $row['work_school_name']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Work or School Address of Last Person With</label>
                          <input type="text" class="form-control" value="<?php echo $row['work_school_address']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Work or School contact of Last Person With</label>
                          <input type="number" class="form-control" value="<?php echo $row['work_school_contact']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Date Missing Person Report was Filed</label>
                          <input type="date" class="form-control" value="<?php echo $row['date_report_filed']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Time the Person was noted missing</label>
                          <input type="time" class="form-control" value="<?php echo $row['time_missing']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                           <?php                           
                              $repeat_missing  = mysqli_query($conn, "SELECT DISTINCT repeat_missing FROM posted");
                              $id = $row['post_Id'];
                              $all_repeat_missing = mysqli_query($conn, "SELECT * FROM posted  where post_Id = '$id' ");
                              $row_all_repeat_missing = mysqli_fetch_array($all_repeat_missing);
                          ?>
                          <label>Is this person a repeat missing?</label>
                          <select class="form-control" disabled style="background-color: white;">
                              <?php foreach($repeat_missing as $rows):?>
                                    <option value="<?php echo $rows['repeat_missing']; ?>"  
                                        <?php if($row_all_repeat_missing['repeat_missing'] == $rows['repeat_missing']) echo 'selected="selected"'; ?> 
                                         > <!--/////   CLOSING OPTION TAG  -->
                                        <?php echo $rows['repeat_missing']; ?>                                           
                                    </option>

                             <?php endforeach;?>
                           </select>
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Law Enforcement Agency Handling the case</label>
                          <input type="text" class="form-control" value="<?php echo $row['agency_enforcement']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Name of the Assigned Officer</label>
                          <input type="text" class="form-control" value="<?php echo $row['officer']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Law Enforcement Contact info</label>
                          <input type="number" class="form-control" value="<?php echo $row['agency_phone']; ?>"  readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Case Number - IMPORTANT</label>
                          <input type="number" class="form-control" value="<?php echo $row['emergency_number']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Reward</label>
                          <input type="text" class="form-control" value="<?php echo $row['reward']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Contact</label>
                          <input type="text" class="form-control" value="<?php echo $row['family_contact']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Email of the Person Completing this Intake Form</label>
                          <input type="email" class="form-control" value="<?php echo $row['family_email']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Family/Authorized Facebook Page</label>
                          <input type="text" class="form-control" value="<?php echo $row['family_fb']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Landline or any other Contact Information</label>
                          <input type="text" class="form-control" value="<?php echo $row['relationship_to_missing']; ?>" readonly  style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-12 mb-4">
                       <div class="form-group">
                          <label>Call (Panawagan)</label>
                          <input type="text" class="form-control" value="<?php echo $row['comments']; ?>" readonly style="background-color: white;"> 
                       </div>
                    </div>
                    <div class="col-lg-5 mb-4">
                       <div class="form-group">
                          <label>Name of Person Completing this Intake Form</label>
                          <input type="text" class="form-control" value="<?php echo $row['name_who_fill_up']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                       <div class="form-group">
                          <label>Relationship to the Missing Person</label>
                          <input type="text" class="form-control" value="<?php echo $row['name_who_fill_up_relationship']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                       <div class="form-group">
                          <label>Contact Information</label>
                          <input type="number" class="form-control" value="<?php echo $row['name_who_fill_up_contact']; ?>" readonly style="background-color: white;">
                       </div>
                    </div>
                   
                </div>


              </div>
                
            </form>
          </div>


          <section id="comment" class="contact section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Comments</h2>
                <p>See comments about this missing person below.</p>
              </div>

              <div class="row d-flex justify-content-center">

                <div class="col-lg-5 m-2">
                  <form action="login_code.php" method="post" class="bg-white p-3 ">
                  <input type="hidden" value="<?php echo $missing_Id; ?>" class="form-control" name="posted_Id">
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="comment" rows="8" placeholder="Enter comment here..." required></textarea>
                    </div>
                    
                    <div class="text-center mt-3"><button type="submit" class="btn btn-primary" name="addComment">Add comment</button></div>
                  </form>
                </div>


                <div class="col-lg-6 m-2">
                  <div class="row">
                     <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM comments ORDER BY comment_Id LIMIT 5");
                        if(mysqli_num_rows($fetch) > 0) {
                           
                     ?>
                     <div class="col-md-12" >
                      <div class="info-box p-3"  style="max-height: 308px; min-height: 308px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px; overflow: auto;">
                        <?php while ($comment = mysqli_fetch_array($fetch)) { ?>
                        <p style="text-align:left;"><?php echo $comment['comment']; ?></p>
                        <p class="text-sm text-muted" style=" opacity: .6; text-align:left; font-size: 12px"><?php echo date("F d, Y", strtotime($comment['date_added'])); ?></p>
                        <hr>
                        <?php } ?>
                      </div>
                    </div>
                     <?php } else {  ?>
                    <div class="col-md-12" >
                      <div class="info-box"  style=" max-height: 308px; min-height: 308px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                        <i class="bx bx-map"></i>
                        <h3>Comment will appear here</h3>
                      </div>
                    </div>

                 <?php } ?>
                   
                  </div>

                </div>



              </div>

            </div>
          </section>




        </div>

      </div>
    </section><!-- End Contact Section -->





    <?php include 'footer.php'; ?>


<script>
   $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,4000);
  }
  );
</script>
 
<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    var text=document.createElement('p');
    text.innerHTML='Image preview';
    text.style['position']="relative";
    text.style['margin-left']="192px";
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

<script>
    function validate_password() {

      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
      }
    }

</script>
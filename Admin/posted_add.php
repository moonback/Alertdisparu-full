<title>AlertDisparu | Post missing person</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post missing person</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post missing person</li>
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
              <form action="process_save.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <!-- USER ID -->
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="admin_Id">

                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>Address of the Missing Person (Required)</label>
                        <input type="text" class="form-control" placeholder="Enter Address" name="city_from" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Date of Disappearance (Required)</label>
                        <input type="date" class="form-control" name="Disappearance" required>
                      </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Complete Name of the Missing Person (Required)</label>
                          <input type="text" class="form-control" placeholder="Full name" name="name"  required>
                       </div>
                    </div>
                   <div class="col-lg-3">
                       <div class="form-group">
                         <label>Sex (Required)</label>
                          <select class="form-control" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Date of Birth of the Missing Person (Required)</label>
                          <input type="date" class="form-control" name="dob" required>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>This Missing Person "Also Known As" (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Nickname" name="Pronouns" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Height (Optional)</label>
                          <input type="text" class="form-control" placeholder="Height" name="Height" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Weight (Optional)</label>
                          <input type="text" class="form-control" placeholder="Weight" name="Weight" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Race/Ethnicity (Optional)</label>
                          <input type="text" class="form-control" placeholder="Race / Ethnicity" name="Race" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Nearest Landmark before Lost (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Landmark" name="Hair" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Natural Hair Color (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Hair Color" name="Headhair" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Does the Person Dye their Hair? (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Hair Dye Color" name="dye" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Eye Color (Optional)</label>
                          <input type="text" class="form-control" placeholder="Eye color" name="eye" >
                       </div>
                    </div>
                  
                    <div class="col-lg-6 mb-3">
                       <label for="">For the Teeth Please Check all that apply (Optional)</label>
                      <div class="row">
                           <div class="col-lg-6">
                                <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Good Shape" name="teeth[]" > Good Shape
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dental Work" name="teeth[]" > Dental Work
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing with" name="teeth[]" > Partial Missing with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Partial Missing" name="teeth[]" > Partial Missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Completely missing" name="teeth[]" > Completely missing
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Straight" name="teeth[]" > Straight
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Crooked with bridge" name="teeth[]" > Crooked with bridge
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Dis-colored" name="teeth[]" > Dis-colored
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Full" name="teeth[]" > Denture-Full
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Top Only" name="teeth[]" > Denture-Top Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Denture-Bottom Only" name="teeth[]" > Denture-Bottom Only
                               </div>
                               <div class="form-check">
                                  <input class="form-check-input position-static" type="checkbox" value="Braces" name="teeth[]" > Braces
                               </div>
                            </div>
                      </div>
                    </div>
                  
                      <div class="col-lg-6">
                         <label for="">Electronics with them (Optional)</label>
                      
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Cell Phone" name="gadget[]"> Mobile Phone
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Computer" name="gadget[]"> Laptop / Computer
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Tablet" name="gadget[]"> Tablet
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Ipod" name="gadget[]"> Smart Watch 
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Other" name="gadget[]"> Other
                         </div>
                      </div>
                  




                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Scars, Marks, or Deformities (Optional)</label>
                          <input type="text" class="form-control" placeholder="Scars, Marks, or Deformities" name="scars" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Piercings and Locations (Optional)</label>
                          <input type="text" class="form-control" placeholder="Piercings and Locations" name="Piercings" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Tattoos (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe Tattoos and Locations" name="Tattoos" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Clothing (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe what they were known to be wearing" name="Clothing" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Footwear (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe the shoes they were wearing" name="Footwear" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Shoe size (Optional)</label>
                          <input type="text" class="form-control" placeholder="Missing person's Shoe size" name="Shoe" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Coat/Jacket (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe the color of Coat / Jacket" name="Coat" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Head Wear (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe a hat or other Head Wear" name="Head" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Jewelry/Accessories (Optional)</label>
                          <input type="text" class="form-control" placeholder="Describe Jewelry / Accessories they might be wearing" name="Jewelry" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Eyewear (Optional)</label>
                          <input type="text" class="form-control" placeholder="Glasses, Contacts etc.." name="Eyewear" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Illnesses or Disorders (Optional)</label>
                          <input type="text" class="form-control" placeholder="Illnesses or Disorders" name="Illnesses" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Medication (Optional)</label>
                          <input type="text" class="form-control" placeholder="Medication and what they are taken for" name="Medication" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>History of Alcohol, drug abuse (Optional)</label>
                          <input type="text" class="form-control" placeholder="Drugs, Alcohol" name="History" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Hobbies (Optional)</label>
                          <input type="text" class="form-control" placeholder="What hobbies are they interested in?" name="Hobbies" >
                       </div>
                    </div>
                    <!-- <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Cell Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Cell" >
                       </div>
                    </div> -->
                    <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Missing Person's Contact Info. (Optional)</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Cell" placeholder = "9123456789"  maxlength="10">
                     </div>
                     </div>
                   <!--  <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Email</label>
                          <input type="email" class="form-control" placeholder="email@email.com" name="PersonEmail" >
                       </div>
                    </div> -->
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Social Media User Name</label>
                          <input type="text" class="form-control" placeholder="Enter Social Media Username" name="PersonEmail" id="email" onkeydown="validation()" onkeyup="validation()">
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
                          <label>Last Known Location (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Last Location" name="Lastlocation" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Last Person With (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Name" name="personwith" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Address of Last Person With (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Address" name="Personaddress" >
                       </div>
                    </div>
                    <!-- <div class="col-lg-3">
                       <div class="form-group">
                          <label>Phone of Last Person With</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Phonelastperson" >
                       </div>
                    </div> -->
                    <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Contact of Last Person With (Optional)</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Phonelastperson" placeholder = "9123456789"  maxlength="10">
                     </div>
                     </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School Name of Last Person With (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Work or School name" name="workschool" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Work or School Address of Last Person With (Optional)</label>
                          <input type="text" class="form-control" placeholder="Enter Work or School address" name="Schooladdress" >
                       </div>
                    </div>
                    <!-- <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School contact</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Schoolcontact" >
                       </div>
                    </div> -->
                    <div class="col-lg-4 col-auto form-group mb-3">
                     <label for="contact">Work or School contact of Last Person With (Optional)</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Schoolcontact" placeholder = "9123456789"  maxlength="10">
                     </div>
                     </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Date Missing Person Report was Filed (Optional)</label>
                          <input type="date" class="form-control" name="datefiled" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Time the Person was noted missing (Optional)</label>
                          <input type="time" class="form-control" name="Time" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Is this person a repeat missing? (Optional)</label>
                          <select class="form-control" name="repeatmissing" required>
                            <option selected disabled>Choose an option</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group"> 
                          <label>Law Enforment Agency Handling the case (Optional)</label>
                          <input type="text" class="form-control" placeholder="Law enforment agency" name="lawagency" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Name of the Assigned Officer (Optional)</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Assigned" >
                       </div>
                    </div>
                    <!-- <div class="col-lg-3">
                       <div class="form-group">
                          <label>Law Enforcement Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Enforcement" >
                       </div>
                    </div> -->
                    <div class="col-lg-3 col-auto form-group mb-3">
                     <label for="contact">Law Enforcement Contact info (Optional)</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Enforcement" placeholder = "9123456789"  maxlength="10">
                     </div>
                     </div>
                    <!-- <div class="col-lg-3">
                       <div class="form-group">
                          <label>Case Number - IMPORTANT</label>
                          <input type="number" class="form-control" placeholder="9123456789"  name="Case" >
                       </div>
                    </div> -->
                     <div class="col-lg-3 col-auto form-group mb-3">
                     
                     <div class="form-group">
                       <label for="contact">Case Number (Optional)</label>
                       <input type="text" class="form-control" placeholder="Case number" name="Case" >
                     </div>
                     <!-- <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Case" placeholder = "9123456789"  maxlength="10">
                     </div> -->
                     </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Reward (Optional)</label>
                          <input type="text" class="form-control" placeholder="How much reward?" name="reward" >
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Contact (Optional)</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Family_Guardian" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Email of the Person Completing this Intake Form (Optional)</label>
                          <input type="email" class="form-control" placeholder="Family/Guardian/Authorized Person's Email" name="Authorized_Email">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Facebook Page (Optional)</label>
                          <input type="text" class="form-control" placeholder="Family/Guardian/Authorized Person's Facebook Acc." name="Authorized_fb">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Landline or any other Contact Information (Optional)</label>
                          <input type="text" class="form-control" placeholder="" name="Relationship" >
                       </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="form-group">
                          <label>Call (Panawagan) (Optional)</label>
                          <input type="text" class="form-control" placeholder="Add comments here"  name="Comments" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Name of Person Completing this Intake Form (Required)</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Completing" required>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Relationship to the Missing Person (Required)</label>
                          <input type="text" class="form-control" placeholder="Relationship to the Missing Person" name="Relationship_to_Missing" required>
                       </div>
                    </div>
                   <!--  <div class="col-lg-4">
                       <div class="form-group">
                          <label>Contact Information</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Contact_completingform" >
                       </div>
                    </div> -->
                    <div class="col-lg-4 col-auto form-group col-md-4 mb-3">
                     <label for="contact">Contact number (Required)</label>
                     <div class="input-group">
                       <div class="input-group-text">+63</div>
                       <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="Contact_completingform" placeholder = "9123456789" required maxlength="10">
                     </div>
                     </div>
                   
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Image (Required)</label>
                          <h6 style = "color: red">You can add Multiple Image</h6>
                          <input type="file" class="form-control" name="image[]" multiple>
                       </div>
                    </div>

                   <!--  <div class="col-lg-6">
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
                <!-- /.card-body -->
                    
                <h6 style = "color: red">Please Take Note:</h6>
                <div class="d-flex">
                <div class="form-group">
                   <input type = "checkbox" required> &nbsp;Once You Uploaded a Missing Person you are Responsible for Setting them to Found Status on the Missing Person's Dashboard by clicking <span class="text-danger">Missing Status</span>
                </div>
                     </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="save" id="add"><i class="fa-solid fa-floppy-disk"></i>  Submit</button>
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

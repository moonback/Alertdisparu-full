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
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="user_Id">

                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>City and State Missing From</label>
                        <input type="text" class="form-control" placeholder="Last known city and state they were in" name="city_from" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Date of Disappearance</label>
                        <input type="date" class="form-control" name="Disappearance" required>
                      </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Name of Missing Person</label>
                          <input type="text" class="form-control" placeholder="Full name" name="name"  required>
                       </div>
                    </div>
                   <div class="col-lg-4">
                       <div class="form-group">
                         <label>Sex</label>
                          <select class="form-control" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control" name="dob" required>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Preferred Pronouns</label>
                          <input type="text" class="form-control" placeholder="Prefer He/Him, She/Her, They/Them, etc." name="Pronouns" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Height</label>
                          <input type="text" class="form-control" placeholder="Height" name="Height" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Weight</label>
                          <input type="text" class="form-control" placeholder="Weight" name="Weight" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Race / Ethnicity</label>
                          <input type="text" class="form-control" placeholder="Race / Ethnicity" name="Race" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>NATURAL Hair Color</label>
                          <input type="text" class="form-control" placeholder="Hair color" name="Hair" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Head Hair Description</label>
                          <input type="text" class="form-control" placeholder="Long hair, Short hair, buzzed, bald, etc." name="Headhair" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Does the Person Dye their Hair?</label>
                          <input type="text" class="form-control" placeholder="What color(s) might the person dye thier hair?" name="dye" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Eye Color</label>
                          <input type="text" class="form-control" placeholder="Eye color" name="eye" >
                       </div>
                    </div>
                  
                    <div class="col-lg-6 mb-3">
                       <label for="">Teeth (Check all that apply)</label>
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
                         <label for="">Electronics with them</label>
                      
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Cell Phone" name="gadget[]"> Cell Phone
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Computer" name="gadget[]"> Computer
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Tablet" name="gadget[]"> Tablet
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Ipod" name="gadget[]"> Ipod
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="X-box" name="gadget[]"> X-box
                         </div>
                         <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" value="Other" name="gadget[]"> Other
                         </div>
                      </div>
                  




                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Scars, Marks, or Deformities</label>
                          <input type="text" class="form-control" placeholder="Scars, Marks, or Deformities - Describe" name="scars" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Piercings and Locations - Describe</label>
                          <input type="text" class="form-control" placeholder="Piercings" name="Piercings" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Tattoos</label>
                          <input type="text" class="form-control" placeholder="Describe Tattoos and Locations" name="Tattoos" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Clothing</label>
                          <input type="text" class="form-control" placeholder="Describe what they were known to be wearing" name="Clothing" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Footwear</label>
                          <input type="text" class="form-control" placeholder="Describe the shoes they were wearing" name="Footwear" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Shoe size</label>
                          <input type="text" class="form-control" placeholder="Missing person's Shoe size" name="Shoe" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Coat / Jacket</label>
                          <input type="text" class="form-control" placeholder="Describe the color of Coat / Jacket" name="Coat" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Head Wear</label>
                          <input type="text" class="form-control" placeholder="Describe a hat or other Head Wear" name="Head" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Jewelry / Accessories</label>
                          <input type="text" class="form-control" placeholder="Describe Jewelry / Accessories they might be wearing" name="Jewelry" >
                       </div>
                    </div>
                    <div class="col-lg-2">
                       <div class="form-group">
                          <label>Eyewear</label>
                          <input type="text" class="form-control" placeholder="Glasses, Contacts, Sunglasses" name="Eyewear" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Illnesses or Disorders</label>
                          <input type="text" class="form-control" placeholder="Illnesses or Disorders" name="Illnesses" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Medication</label>
                          <input type="text" class="form-control" placeholder="Medication and what they are taken for" name="Medication" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>History of Alcohol, drug abuse</label>
                          <input type="text" class="form-control" placeholder="Drugs, Alcohol" name="History" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Hobbies</label>
                          <input type="text" class="form-control" placeholder="What hobbies are they interested in?" name="Hobbies" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Cell Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Cell" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Missing Person's Email</label>
                          <input type="email" class="form-control" placeholder="email@email.com" name="PersonEmail" >
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Last Known Location</label>
                          <input type="text" class="form-control" placeholder="Address" name="Lastlocation" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Last Person With</label>
                          <input type="text" class="form-control" placeholder="Full name" name="personwith" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Address of Last Person With</label>
                          <input type="text" class="form-control" placeholder="email@email.com" name="Personaddress" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Phone of Last Person With</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Phonelastperson" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School Name</label>
                          <input type="text" class="form-control" placeholder="Work or School name" name="workschool" >
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Work or School Address</label>
                          <input type="text" class="form-control" placeholder="Work or School address" name="Schooladdress" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Work or School contact</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Schoolcontact" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Date Missing Person Report was Filed</label>
                          <input type="date" class="form-control" name="datefiled" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Time the Person was noted missing</label>
                          <input type="time" class="form-control" name="Time" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Is this person a repeat missing?</label>
                          <select class="form-control" name="repeatmissing" required>
                            <option selected disabled>Choose an option</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="form-group">
                          <label>Law Enforment Agency</label>
                          <input type="text" class="form-control" placeholder="Law enforment agency" name="lawagency" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Assigned Officer</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Assigned" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Law Enforcement Phone</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Enforcement" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Case Number - IMPORTANT</label>
                          <input type="number" class="form-control" placeholder="9123456789"  name="Case" >
                       </div>
                    </div>
                    <div class="col-lg-3">
                       <div class="form-group">
                          <label>Reward</label>
                          <input type="text" class="form-control" placeholder="How much reward?" name="reward" >
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Contact</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Family_Guardian" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Email</label>
                          <input type="email" class="form-control" placeholder="Family/Guardian/Authorized Person's Email" name="Authorized_Email" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Family/Guardian/Authorized Facebook Page</label>
                          <input type="text" class="form-control" placeholder="Family/Guardian/Authorized Person's Facebook Acc." name="Authorized_fb" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Relationship to the missing person</label>
                          <input type="text" class="form-control" placeholder="Family/Guardian/Authorized Person's Relationship" name="Relationship" >
                       </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="form-group">
                          <label>Comments</label>
                          <input type="text" class="form-control" placeholder="Add comments here"  name="Comments" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Name of Person Completing this Intake Form</label>
                          <input type="text" class="form-control" placeholder="Full name" name="Completing" required>
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Relationship to the Missing Person</label>
                          <input type="text" class="form-control" placeholder="Relationship to the Missing Person" name="Relationship_to_Missing" >
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                          <label>Contact Information</label>
                          <input type="number" class="form-control" placeholder="9123456789" name="Contact_completingform" >
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control" name="fileToUpload" onchange="getImagePreview(event)">
                       </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group" id="preview">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="save"><i class="fa-solid fa-floppy-disk"></i>  Submit</button>
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

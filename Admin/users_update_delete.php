

<!-- ****************************************************UPDATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="update<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Update user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          
          <!-- LOAD IMAGE PREVIEW -->
          <div class="col-lg-12 mb-2">
              <div class="form-group" id="user_preview">
              </div>
          </div>
          <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
          <div class="col-lg-3">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
              </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" class="form-control" name="middlename" required onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
            </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
              </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <label>Suffix name</label>
              <input type="text" class="form-control" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['suffix']; ?>">
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <?php                           
                  $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM users");
                  $id = $row['user_Id'];
                  $all_gender = mysqli_query($conn, "SELECT * FROM users  where user_Id = '$id' ");
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
         
            <div class="col-lg-4">
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="updatetxtbirthdate" onkeyup="update_getAgeVal(0)" onblur="update_getAgeVal(0);" onchange="update_getAgeVal(0);" value="<?php echo $row['dob']; ?>">
              </div>
          </div>
          <div class="col-lg-2">
              <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control"  placeholder="Age" readonly id="updatetxtage" value="<?php echo $row['age']; ?>">
                <input type="hidden" class="form-control" name="age" placeholder="Age" required id="updateagestatus">
              </div>
          </div>
          <div class="col-auto form-group col-lg-3">
            <label for="contact">Contact number</label>
            <div class="input-group">
              <div class="input-group-text">+63</div>
              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "Contact Number (Required)" required maxlength="10" value="<?php echo $row['contact']; ?>">
            </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder = "Email (Required)" required onkeydown="update_validation()" onkeyup="update_validation()" value="<?php echo $row['email']; ?>">
          <span id="text"></span>
        </div>
          </div>
          <div class="col-lg-8">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" required value="<?php echo $row['address']; ?>">
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                <label>Profile Photo</label>
                <input type="file" class="form-control-file" name="fileToUpload" onchange="newgetImagePreview(event)">
              </div>
          </div>

        
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-success" name="update_user" id="update"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>


  function update_agevalidation() {
    var age = document.getElementById("age").value;

    if(age < 12) {
        document.getElementById('age_text').style.color = 'red';
        document.getElementById('age_text').innerHTML = 'Must be 12yrs old and above.';
        document.getElementById('update').disabled = true;
        document.getElementById('update').style.opacity = (0.4);
    } else {

        document.getElementById('age_text').style.color = 'green';
        document.getElementById('age_text').innerHTML = '';
        document.getElementById('update').disabled = false;
        document.getElementById('update').style.opacity = (1);

    }
  }

  function update_validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('update').disabled = false;
        document.getElementById('update').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Invalid email';
        document.getElementById('update').disabled = true;
        document.getElementById('update').style.opacity = (0.4);
        
    }
  }


   function newgetImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('user_preview');
    var newimg=document.createElement('img');
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
  }

</script>
<!-- ****************************************************END UPDATE*********************************************************************** -->




<script>
  function formatDate(date){
var d = new Date(date),
month = '' + (d.getMonth() + 1),
day = '' + d.getDate(),
year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

return [year, month, day].join('-');

}

function getAge(dateString){
var birthdate = new Date().getTime();
if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
// variable is undefined or null value
birthdate = new Date().getTime();
}
birthdate = new Date(dateString).getTime();
var now = new Date().getTime();
// now find the difference between now and the birthdate
var n = (now - birthdate)/1000;
if (n < 604800){ // less than a week
var day_n = Math.floor(n/86400);
if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
// variable is undefined or null
return '';
}else{
return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
}
} else if (n < 2629743){ // less than a month
var week_n = Math.floor(n/604800);
if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
return '';
}else{
return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
}
} else if (n < 31562417){ // less than 24 months
var month_n = Math.floor(n/2629743);
if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
return '';
}else{
return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
}
}else{
var year_n = Math.floor(n/31556926);
if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
return year_n = '';
}else{
return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
}
}
}

function update_getAgeVal(pid){
var birthdate = formatDate(document.getElementById("updatetxtbirthdate").value);
var count = document.getElementById("updatetxtbirthdate").value.length;
if (count=='10'){
var age = getAge(birthdate);
var str = age;
var res = str.substring(0, 1);
if (res =='-' || res =='0'){
document.getElementById("updatetxtbirthdate").value = "";
document.getElementById("updatetxtage").value = "";
document.getElementById("updateagestatus").value = "";
$('#updatetxtbirthdate').focus();
return false;
}else{
document.getElementById("updatetxtage").value = age;
document.getElementById("updateagestatus").value = age;
}
}else{
document.getElementById("updatetxtage").value = "";
document.getElementById("updateagestatus").value = "";
return false;
}
}
</script>




<!-- ****************************************************VIEW*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="view<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> User information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-lg-12 mb-4 d-flex justify-content-center">
              <img src="../images-users/<?php echo $row['image']; ?>" alt="" width="200">
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control form-control-sm" value="<?php echo $row['firstname']; ?>" readonly>
              </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" class="form-control form-control-sm" value="<?php echo $row['middlename']; ?>" readonly>
            </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control form-control-sm" value="<?php echo $row['lastname']; ?>" readonly>
              </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <label>Suffix name</label>
              <input type="text" class="form-control form-control-sm" value="<?php echo $row['suffix']; ?>" readonly>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <label>Gender</label>
              <input type="text" class="form-control form-control-sm" value="<?php echo $row['gender']?>" readonly>
            </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control form-control-sm" value="<?php echo $row['dob']?>" readonly>
              </div>
          </div>
          <div class="col-lg-2">
              <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control form-control-sm" value="<?php echo $row['age']; ?>" readonly>
              </div>
          </div>
          <div class="col-lg-3">
               <div class="form-group">
                  <label>Contact</label>
                  <input type="number" class="form-control form-control-sm" value="<?php echo $row['contact']; ?>" readonly>
               </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control form-control-sm" value="<?php echo $row['email']; ?>" readonly>
        </div>
          </div>
          <div class="col-lg-8">
              <div class="form-group">
                <label>Address</label>
                <input type="email" class="form-control form-control-sm" value="<?php echo $row['address']; ?>" readonly>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $row['user_Id']; ?>" data-dismiss="modal"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<!-- ****************************************************END VIEW*********************************************************************** -->







<!-- ****************************************************DELETE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
          <h6>Delete user record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-danger" name="delete_user"><i class="fa-solid fa-circle-check"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END DELETE*********************************************************************** -->






<!-- ****************************************************PASSWORD*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="password<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Change password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
           <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
            <div class="form-group mb-3">
              <label for=""><b>Old password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Old password" name="OldPassword" required minlength="8">
            </div>
            <div class="form-group mb-3">
              <label for=""><b>New password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" required id="new_password" minlength="8">
            </div>
            <div class="form-group mb-3">
              <label for=""><b>Confirm password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="cpassword" required id="new_cpassword" onkeyup="new_validate_password()" minlength="8">
              <small id="new_wrong_pass_alert"></small>
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="password_user" id="new_create"><i class="fa-solid fa-circle-check"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- *************************************************END PASSWORD*********************************************************************** -->


<script>
    function new_validate_password() {

      var pass = document.getElementById('new_password').value;
      var confirm_pass = document.getElementById('new_cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('new_wrong_pass_alert').style.color = 'red';
        document.getElementById('new_wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('new_create').disabled = true;
        document.getElementById('new_create').style.opacity = (0.4);
      } else {
        document.getElementById('new_wrong_pass_alert').style.color = 'green';
        document.getElementById('new_wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('new_create').disabled = false;
        document.getElementById('new_create').style.opacity = (1);
      }
    }

</script>
<!-- ****************************************************END CREATE*********************************************************************** -->


<!-- VIEW ID -->
<div class="modal fade" id="viewID<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> User ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
          <img src="../images-id/<?php echo $row['image_Id']; ?>" alt="" width="250">
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#updateID<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-circle-check"></i> Edit</button>
      </div>
    </div>
  </div>
</div>


<!-- UPDATE ID -->
<div class="modal fade" id="updateID<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Update User ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
              <div class="form-group">
                <label>Upload User ID</label>
                <input type="file" class="form-control-file" name="fileToUpload" onchange="newgetImagePreview(event)" required>
              </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="submit" name="updateID" class="btn btn-success"><i class="fa-solid fa-circle-check"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
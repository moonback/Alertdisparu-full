<title>AlertDisparu | Profile update</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update info</li>
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
                <h3 class="card-title">Information</h3>
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
                     <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                     <div class="card-body">
                        <div class="row">
                            <!-- LOAD IMAGE PREVIEW -->
                            <div class="col-lg-12 mb-2">
                                <div class="form-group" id="user_preview">
                                </div>
                            </div>
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
                                  <select class="custom-select " name="gender" required>
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
                                  <input type="email" class="form-control" id="email" name="email" placeholder = "Email (Required)" required onkeydown="validation()" onkeyup="validation()"  value="<?php echo $row['email']; ?>">
                                  <span id="text"></span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" name="address" required value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                  <label>Image</label>
                                  <input type="file" class="form-control-file" name="fileToUpload" onchange="newgetImagePreview(event)">
                                </div>
                            </div>
                        </div>
                   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update_user" id="update_user"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>
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

  function agevalidation() {
    var age = document.getElementById("age").value;

    if(age < 12) {
        document.getElementById('age_text').style.color = 'red';
        document.getElementById('age_text').innerHTML = 'Must be 12yrs old and above.';
        document.getElementById('update_user').disabled = true;
        document.getElementById('update_user').style.opacity = (0.4);
    } else {

        document.getElementById('age_text').style.color = 'green';
        document.getElementById('age_text').innerHTML = '';
        document.getElementById('update_user').disabled = false;
        document.getElementById('update_user').style.opacity = (1);

    }
  }

  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('update_user').disabled = false;
        document.getElementById('update_user').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Invalid email';
        document.getElementById('update_user').disabled = true;
        document.getElementById('update_user').style.opacity = (0.4);
        
    }
  }

</script>



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

  <?php include 'footer.php'; ?>
 
</body>
</html>
